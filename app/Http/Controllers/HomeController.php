<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Company;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use App\User;
use App\Tag;
use App\Customer;
use App\RelCustomerTag;
use App\FormLog;
use App\Form;
use Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;



class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        $tag         =  Tag::where('id_company',Auth::User()->id_company)->orwhere('id_company',0)->get();
        $sum_cus     =  Customer::where('id_company',Auth::User()->id_company)->where('delete',0)->get();
        $forms       =  Form::where('id_company', Auth::User()->id_company)->where('form_status',1)->get();
        $sum         =  count($sum_cus);
        $newcustomer =  $this->newCustomer();
        $index       =  $customerID = $c_tag = array();
        foreach ( $sum_cus as $key => $customer ) {
            $customerID[] = $customer->id_customer;
        }

        foreach ( $tag as $t ) {
            $c_tag[] = $t->tag_name;
            $countCustomer = (RelCustomerTag::whereIn('id_customer',$customerID)
            ->where('id_tag',$t->id_tag)
            ->get()
            ->count());
            if($countCustomer == 0)
                $index[] = 0;
            else
                $index[] =  $countCustomer/$sum*100;
        }

        $company  = Auth::User()->id_company;
        $role     = Auth::User()->id_role;
        $users    = User::where('id_company', $company)->where('id_role','>',1)->where('id_role','!=',10)->orderBy('id','desc')->get();

        $formUrls = $this->formReport();
        $redis    = Redis::connection();
        $formLog  = new FormLog();
        return view('home.app', compact(
            'sum', 'index', 'c_tag', 'formUrls', 'forms', 'newcustomer','redis','formLog','users'
        ));
    }

    /**
     * Get log from form id or From url.
     *
     * @param string $getlog
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function formReport( string $getlog = 'from_url' )
    {
        $companyForm = Form::where( 'id_company', Auth::User()->id_company )->paginate(15);
        $formId = [];
        foreach ($companyForm as $key => $value) {
            $formId[] = $value->id_form;
        }
        $countLog = FormLog::groupBy($getlog)
        ->select($getlog, \DB::raw('count('.$getlog.') as total'))
        ->orderBy('total', 'DESC')
        ->whereIn('id_form', $formId)
        ->get();
        return $countLog;
    }

    /**
     * Get all new customer.
     *
     * @param integer $dayToCheck
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function newCustomer( int $dayToCheck = 7)
    {
        $date        = new Carbon\Carbon;
        $date        = $date->subDay( $dayToCheck );
        $newCustomer = Customer::whereColumn('created_at', 'updated_at')
        ->where('id_company', Auth::User()->id_company)
        ->where('delete',0)
        ->where('created_at', '>=', $date->toDateTimeString() )
        ->get()
        ->count();
        return $newCustomer;
    }

    public function admin()
    {
        return view('home.admin');
    }

    public function info(){
        $company = Company::all();
        $string_name = Auth::user()->name;
        $data = explode(" ", $string_name);
        $name_profile = "";
        foreach ($data as $value) {
            $b = str_split($value);
            $name_profile .= ''.$b[0].'';
        }
        return view('user.info',compact('company','name_profile'));
    }
    public function edit()
    {
        $company = Company::all();
        $edit = 1;
        return view('user.info',compact('company','edit'));

    }
    public function update(Request $request)
    {
        $user = Auth::user();
        $check = User::where('phone',$request->phone)->where('id','!=',$user->id)->get()->count();
        if($check > 0){
            $tb = "Số điện thoại này đã được sử dụng !";
            return redirect()->to('app/user/edit')->with('tb',$tb);
        }
        
        $data = User::find($user->id);
        $data->update([
            'name' => $request['name'],
            'phone' => $request['phone'],
        ]);
        return redirect()->to('app/setting/info');
    }

    public function change(){
        return view('user.changePassword');
    }

    public function changePassword(Request $request){
        if (!(Hash::check($request->get('current-password'), Auth::user()->password))) {

            return redirect()->back()->with("error","Your current password does not matches with the password you provided. Please try again.");
        }
        if(strcmp($request->get('current-password'), $request->get('new-password')) == 0){

            return redirect()->back()->with("error","New Password cannot be same as your current password. Please choose a different password.");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'new-password' => 'required|string|min:6|confirmed',
        ]);

        $user = Auth::user();
        $user1 = User::find($user-> id );
        $passNew = $request['new-password'];
        $pass1 = bcrypt($passNew);
        $user1->update([
            'password' => $pass1,
        ]);
        return redirect()->back()->with("success","Password changed successfully !");
    }
    public function avatar(Request $request)
    {
        $image_name = '';
        if ($request->hasFile('avatar')) {
            $image = $request->file('avatar');
            $user = Auth::User();
            if (!empty($user->avatar)) {
                $link = explode("/",$user->avatar);
                $name_old = 'images/avatar/'.end($link);
                File::delete($name_old);
            }       
            $name = mt_rand(0, 0xffff) . time() . '.' . $image->guessClientExtension();
               $image->move("images/avatar", $name);
                $image_name = url()->to('images/avatar/'.$name);
                $user->update(['avatar'=>$image_name]);
                return redirect()->back();
        }
        else{
            return redirect()->back();
        }
        
    }
}
