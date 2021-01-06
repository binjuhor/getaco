<?php

namespace App\Http\Controllers;

use App\Classes\NL_CheckOutV3;
use App\User;
Use App\Package;
use App\Partner;
use App\Company;
use App\Coupon;
use App\Package_order;
use App\PackageFeature;
use App\PackageVariable;
use App\Permission;
use App\Payment;
use App\Http\Controllers\CouponController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function item()
  {
     $id_company = Auth::User()->id_company;
     $pay = Payment::where('id_company',$id_company)->get();
     $packages = Package::paginate(15);
     $sort_pay = count($pay);
      return view('cart.cart_item',compact('pay','packages','sort_pay'));
  }
public function payment(Request $request)
{
  define('URL_API','https://www.nganluong.vn/checkout.api.nganluong.post.php');
  define('RECEIVER','info@beau.vn');
  define('MERCHANT_ID', '55243');
  define('MERCHANT_PASS', 'c7baeba089a19cee58909606c15f1f2d');
  $nlcheckout= new NL_CheckOutV3(MERCHANT_ID,MERCHANT_PASS,RECEIVER,URL_API);
  $version = 3.1;
  $package = $request['package_name'];
  $order_code = time().date('d'.'m'.'y');
  $order = Package_order::where('id_company',Auth::User()->id_company)->get();
  foreach ($order as $key => $value) {
   $total_amount = $value->total_pay;
 }

 $payment_method =$request['option_payment'];
 $bank_code = $request->bankcode;

 // dd($payment_method."    ".$bank_code);

 $payment_type = '';
 // $order_description='';
 $tax_amount=0;
 $discount_amount =0;
 $fee_shipping=0;
 $return_url = $request->return_url ;
 $cancel_url = $request->cancel_url ;
    //thong tin ngươi thanh toan
 $buyer_fullname =$request['buyer_fullname'];
 $buyer_email =$request['buyer_email'];
 $buyer_mobile =$request['buyer_mobile'];


 $id_company = Auth::User()->id_company;
 $conpay = Company::findOrFail($id_company);
 $buyer_address = $conpay->company_name;


 $package = $request['package_name'];

 // check giá
  $id_variable = $request->id_variable;
  $variable = PackageVariable::findOrFail($id_variable);
  $check = new CouponController();
  $data = $check->checkCoupon($request);
  if($data != "err"){
    $data = json_decode($data);
    $total_amount = $data->price_new;
    $coupon_id = $data->coupon_id;
  }else{
    $total_amount = $variable->variable_price;
    $coupon_id = 0;
  }

  $package_id = $request->package_id;
  $order_description= $variable->name." ".$package_id." ".$coupon_id;
  // $data_package = explode(" ",$order_description);
  // dd($data_package);
  // dd($coupon_id);
  if($total_amount < 10000){
    return $this->package_free($variable->name,$buyer_fullname,$buyer_email,$buyer_mobile,$package_id,$total_amount,$coupon_id);
  }

$url_item = $request->url_item;
 $array_items[0]= array('item_name1' => $package,
   'item_quantity1' => 1,
   'item_amount1' => $total_amount,
   'item_url1' => $url_item);
 
 $array_items=array();
 

 
 if($payment_method !='' && $buyer_email !="" && $buyer_mobile !="" && $buyer_fullname !="" && filter_var( $buyer_email, FILTER_VALIDATE_EMAIL )  ){
  if($payment_method =="VISA"){

    $nl_result= $nlcheckout->VisaCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
      $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
      $buyer_address,$array_items,$bank_code);

  }elseif($payment_method =="NL"){
    $nl_result= $nlcheckout->NLCheckout($order_code,$total_amount,$payment_type,$order_description,$tax_amount,
      $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
      $buyer_address,$array_items);

  }elseif($payment_method =="ATM_ONLINE" && $bank_code !='' ){
    $nl_result= $nlcheckout->BankCheckout($order_code,$total_amount,$bank_code,$payment_type,$order_description,$tax_amount,
      $fee_shipping,$discount_amount,$return_url,$cancel_url,$buyer_fullname,$buyer_email,$buyer_mobile, 
      $buyer_address,$array_items) ;
  }
  elseif($payment_method =="NH_OFFLINE"){
    $nl_result= $nlcheckout->officeBankCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
  }
  elseif($payment_method =="ATM_OFFLINE"){
    $nl_result= $nlcheckout->BankOfflineCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);

  }
  elseif($payment_method =="IB_ONLINE"){
    $nl_result= $nlcheckout->IBCheckout($order_code, $total_amount, $bank_code, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items);
  }
  elseif ($payment_method == "CREDIT_CARD_PREPAID") {

    $nl_result = $nlcheckout->PrepaidVisaCheckout($order_code, $total_amount, $payment_type, $order_description, $tax_amount, $fee_shipping, $discount_amount, $return_url, $cancel_url, $buyer_fullname, $buyer_email, $buyer_mobile, $buyer_address, $array_items, $bank_code);
  }
        // var_dump($nl_result->checkout_url); die;
  if ($nl_result->error_code =='00'){
    $yourURL= $nl_result->checkout_url;
    echo ("<script>location.href='$yourURL'</script>");
  }else{
    echo $nl_result->error_message;
    $error_code = $nl_result->error_message;
  }

}else{
  echo "<h3> Bạn chưa nhập đủ thông tin khách hàng </h3>";
}
}

public function success()
{
  define('URL_API','https://www.nganluong.vn/checkout.api.nganluong.post.php');
  define('RECEIVER','info@beau.vn');
  define('MERCHANT_ID', '55243');
  define('MERCHANT_PASS', 'c7baeba089a19cee58909606c15f1f2d');
  $nlcheckout= new NL_CheckOutV3(MERCHANT_ID,MERCHANT_PASS,RECEIVER,URL_API);
  $nl_result = $nlcheckout->GetTransactionDetail($_GET['token']);
  if($nl_result){
    $nl_errorcode           = (string)$nl_result->error_code;
    $nl_transaction_status  = (string)$nl_result->transaction_status;
    if($nl_errorcode == '00') {
      if($nl_transaction_status == '00') {
        $id_company = Auth::User()->id_company;

          $data_package = explode(" ",$nl_result->order_description);
          $id_package = $data_package[1];
        // tinh ngay het han
        $day_lim = $data_package[0];
        $today = date('Y-m-d');
        $today = date('Y-m-d');
        $limit = strtotime(date("Y-m-d", strtotime($today)) . " +$day_lim month");
        $limit = strftime("%Y-%m-%d", $limit);
        //add payment
        $pay = new Payment();
        $pay->name = $nl_result->buyer_fullname;
        $pay->mail = $nl_result->buyer_email;
        $pay->phone = $nl_result->buyer_mobile;
        $pay->id_company = $id_company;
        $pay->id_package = $id_package;
        $pay->lim = $limit;
        $pay->total = $nl_result->total_amount;
        $pay->save();

        if($id_coupon != 0){
          $reduced_coupon = Coupon::findOrFail($data_package[2]);
          $reduced_coupon->limited = $reduced_coupon->limited - 1 ;
          $reduced_coupon->save();
        }

        return redirect()->action('CartController@item');
      }
    }else{
      echo $nlcheckout->GetErrorMessage($nl_errorcode);
    }
  }
}
public function package_free($lim,$name,$email,$phone,$id_package,$total,$id_coupon)
{
  $id_company = Auth::User()->id_company;
  // tinh ngay het han
    $day_lim = $lim;
    $today = date('Y-m-d');
    $today = date('Y-m-d');
    $limit = strtotime(date("Y-m-d", strtotime($today)) . " +$day_lim month");
    $limit = strftime("%Y-%m-%d", $limit);
  //add payment
  $pay = new Payment();
  $pay->name = $name;
  $pay->mail = $email;
  $pay->phone = $phone;
  $pay->id_company = $id_company;
  $pay->id_package = $id_package;
  $pay->lim = $limit;
  $pay->total = $total;
  $pay->save();
  if($id_coupon != 0){
    $reduced_coupon = Coupon::findOrFail($id_coupon);
    $reduced_coupon->limited = $reduced_coupon->limited - 1 ;
    $reduced_coupon->save();
  }
  return redirect()->action('CartController@item');
}
public function cancel($id)
{
  $cencel = Package_order::findOrFail($id);
  $cencel->delete();
  $sort = Company::findOrFail(Auth::User()->id_company);
  $sort->update(['sort_order'=> 0]);
  return redirect()->action('CartController@item');
}
}
