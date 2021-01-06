<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Coupon;

use App\Package;
use App\PackageFeature;
use App\PackageVariable;

class CouponController extends Controller
{

      public function checkCoupon(Request $request){
        $id_variable = $request->id_variable;
        $code = $request->coupon;
        $variable = PackageVariable::findOrFail($id_variable);
        $price = $variable->variable_price;
        $check = Coupon::where('code_coupon',$code)->get();
        $num = count($check);
         if($num > 0){
              foreach ($check as $value) {
                 if($value['type_coupon'] == 1)
                  {
                     $today = strtotime(date('Y-m-d'));
                     $expiry_date = strtotime($value['expiry_date']);
                     if( $value['limited'] >0  && $today <= $expiry_date  && $value['coupon_status'] == 1 ){
                         $pc = $price*($value['value_coupon']/100);
                            if($pc < $price)
                                $price_new = $price - $pc;
                            else
                                $price_new = 0;
                            $coupon_id = $value->id_coupon;
                          $data = ['price_new' => $price_new , 'coupon' => $pc ,'coupon_id' => $coupon_id];
                        return json_encode($data);
                     }
                  }
                  else
                  {
                     $today = strtotime(date('Y-m-d'));
                     $expiry_date = strtotime($value['expiry_date']);
                     if( $value['limited'] >0  && $today <= $expiry_date && $value['coupon_status'] == 1 ){
                         $pc = $value['value_coupon'];
                            if($pc < $price)
                                $price_new = $price - $pc;
                            else
                                $price_new = 0;
                            $coupon_id = $value->id_coupon;
                        $data = ['price_new' => $price_new , 'coupon' => $pc ,'coupon_id' => $coupon_id];
                        return json_encode($data);
                     }
                  }
              }
            }

          return "err";
      }


    public function add(Request $request)
    {
      if (isset($request)) {
        $coupon = Coupon::find($request['id']);
        return view('coupon.form_coupon',compact('coupon'));
      }
      else{
        return view('coupon.form_coupon');
      }
    }
    public function create(Request $request)
    {
      $data = $request->all();
      $code = $request['code_coupon'];
      $coupon = new Coupon();
      $coupon->fill([
        'title_coupon' => $data['title_coupon'],
        'type_coupon' => $data['type_coupon'],
        'value_coupon' => $data['value_coupon'],
        'code_coupon' => $code,
        'expiry_date' => $data['expiry_date'],
        'note' => $data['note'],
        'limited' => $data['limited'],
        'coupon_status' => 1
      ])->save();
      return redirect()->to('admin/coupon');

    }
    public function index()
    {
      $coupons = Coupon::where('coupon_status','=',1)->get();
      return view('coupon.list_coupon',compact('coupons'));
    }
    public function edit(Request $request)
    {
      $data = $request->all();
      $coupon = Coupon::find($request['id']);
      $coupon->update([
        'title_coupon' => $data['title_coupon'],
        'type_coupon' => $data['type_coupon'],
        'value_coupon' => $data['value_coupon'],
        'code_coupon' => $data['code_coupon'],
        'expiry_date' => $data['expiry_date'],
        'note' => $data['note'],
        'limited' => $data['limited'],
      ]);
      return redirect()->to('admin/coupon/');

    }
    public function delete(Request $request)
    {
      $coupon = Coupon::find($request['id']);
      $coupon->delete();
      return redirect()->back();
    }
    public function trash(Request $request)
    {
      $coupon = Coupon::find($request['id']);
      $coupon->update([
        'coupon_status' => 0,
      ]);
      return redirect()->back();
    }
    public function untrash(Request $request)
    {
      $coupon = Coupon::find($request['id']);
      $coupon->update([
        'coupon_status' => 1,
      ]);
      return redirect()->back();
    }
    public function trashList()
    {
      $coupons = Coupon::where('coupon_status','=',0)->get();
      return view('coupon.trash_coupon',compact('coupons'));
    }
}
