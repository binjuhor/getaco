<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Company;
use App\Permission;
use App\CustomerAttribute;
use App\AttributeOption;
use App\TemplateForm;
Use DB;
use App\VerifyUser;
use App\Mail\VerifyMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/register_success';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);
    }

    public function checkMail(Request $request)
    {   
        $email = $request->email;
        $check = User::where('email',$email)->get()->count();
        return $check;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    public function addPermission($company)
    {
       DB::table('permission')->insert(array(
            //Group customer id_group = 1
        ['function' => 'all_lead','title'=> 'View all lead' ,'role2' => 1,'role3' => 1,'role4' => 1, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'ctm_list','title'=>  'View customer list','role2' => 1,'role3' => 1,'role4' => 1, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'ctm_detail','title'=>  'View detail customer','role2' => 1,'role3' => 1,'role4' => 1, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'ctm_act','title'=> 'Add, edit customer' ,'role2' => 1,'role3' => 1,'role4' => 1, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'ctm_del','title'=> 'Delete customer' ,'role2' => 1,'role3' => 1,'role4' => 0, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'seg_list','title'=> 'View Segment List' ,'role2' => 1,'role3' => 1,'role4' => 1, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'seg_act','title'=> 'Add, edit segment' ,'role2' => 1,'role3' => 1,'role4' => 1, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'seg_del','title'=> 'Delete segment' ,'role2' => 1,'role3' => 1,'role4' => 0, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'atb_list','title'=> 'View attribute list' ,'role2' => 1,'role3' => 1,'role4' => 1, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'atb_act','title'=> 'Add, edit Attribute' ,'role2' => 1,'role3' => 1,'role4' => 1, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'atb_del','title'=> 'Delete Attribute' ,'role2' => 1,'role3' => 1,'role4' => 0, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'stt_list','title'=> 'View status list' ,'role2' => 1,'role3' => 1,'role4' => 1, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'stt_act','title'=> 'Add, edit Status' ,'role2' => 1,'role3' => 1,'role4' => 1, 'id_company' =>$company, 'id_group' => '1'],

        ['function' => 'stt_del','title'=> 'Delete Status' ,'role2' => 1,'role3' => 1,'role4' => 0, 'id_company' =>$company, 'id_group' => '1'],

            //Group form id_group = 2
        ['function' => 'form_list','title'=> 'View list form' ,'role2' => 1,'role3' => 1,'role4' => 0, 'id_company' =>$company, 'id_group' => '2'],

        ['function' => 'form_act','title'=> 'Edit form' ,'role2' => 1,'role3' => 1,'role4' => 0, 'id_company' =>$company, 'id_group' => '2'],

        ['function' => 'form_new','title'=> 'Create new form' ,'role2' => 1,'role3' => 1,'role4' => 0, 'id_company' =>$company, 'id_group' => '2'],

        ['function' => 'form_del','title'=> 'Delete form' ,'role2' => 1,'role3' => 1,'role4' => 0, 'id_company' =>$company, 'id_group' => '2'],

        ['function' => 'form_temp','title'=> 'View and create form template' ,'role2' => 1,'role3' => 1,'role4' => 0, 'id_company' =>$company, 'id_group' => '2'],

            //Group report id_group = 3
        ['function' => 'convert','title'=> 'View customer data statistics' ,'role2' => 1,'role3' => 0,'role4' => 0, 'id_company' =>$company, 'id_group' => '3'],

        ['function' => 'analytics','title'=> 'View statistics form data' ,'role2' => 1,'role3' => 0,'role4' => 0, 'id_company' =>$company, 'id_group' => '3'],

            //Group User id_group = 4
        ['function' => 'user_list','title'=> 'View list user' ,'role2' => 1,'role3' => 0,'role4' => 0, 'id_company' =>$company, 'id_group' => '4'],

        ['function' => 'user_htr','title'=> 'User history' ,'role2' => 1,'role3' => 0,'role4' => 0, 'id_company' =>$company, 'id_group' => '4'],

            //Group Setting id_group = 5
        ['function' => 'cpn_info','title'=> 'View company info' ,'role2' => 1,'role3' => 0,'role4' => 0, 'id_company' =>$company, 'id_group' => '5'],
    )
   );

         // Add status default
       DB::table('tags')->insert(array(
        [
            'id_company' => $company,
            'tag_name' => 'Called',
            'id_color' => '#0033CC',
        ],
        [
            'id_company' => $company,
            'tag_name' => 'Sent mail',
            'id_color' => '#FF0000',
        ],
        [
            'id_company' => $company,
            'tag_name' => 'Checked',
            'id_color' => '#69D100',
        ]
    )
   );
   }
   protected function create(array $data)
   {
    if (!isset($data['business_type'])) {
        $data['business_type'] = "";
    }
    $company = Company::create([
        'company_name' => $data['company_name'],
        'business_type' => $data['business_type'],
        'website' => $data['website'],
        'company_address' => $data['address'],
        'sort_order' => 0,
        'company_status' => 1,
        'num_field' => 0,
    ]);

    $this->addPermission($company->id_company);

    $user =  User::create([
        'name' => $data['name'],
        'email' => $data['email'],
        'user_status' => 0,
        'id_group' => 0,
        'id_company' => $company['id_company'],
        'id_role' => 10,
        'password' => bcrypt($data['password']),
    ]);

    //active user
        $very = User::findOrFail($user->id);
        $very->verified = 1;
        $very->save();
    // end active user

    VerifyUser::insert([
        'user_id' => $user->id,
        'token' => hash_hmac('sha256', str_random(40), config('app.key')),
        'created_at' =>now()
    ]);
    $this->createAttribute($company->id_company,$company->business_type);
    $this->createTemplate($company->id_company,$company->business_type);
    Mail::to($user->email)->send(new VerifyMail($user));
    return $user;

}
public function createAttribute($id_company,$id_business)
{
    $attr = CustomerAttribute::where('orbit','=',$id_business)->get();
    foreach ($attr as $key => $at) {
        $new_attr = new CustomerAttribute();
        $new_attr->fill([
            'id_company' => $id_company,
            'label' => $at['label'],
            'name' => $at['name'],
            'status' => $at['status'],
            'type' => $at['type'],
            'sort_order' => $at['sort_order'],
            'orbit' => 0,
        ])->save();
        foreach ($at->options as $option) {
            $new_option = new AttributeOption();
            $new_option->fill([
                'id_attribute' => $new_attr['id_attribute'],
                'option_name' => $option['option_name'],
                'option_value' => $option['option_value'],
                'sort_order' => $option['sort_order'],
            ])->save();
        }
    }
}
public function createTemplate($id_company,$id_business)
{
    $template = TemplateForm::where('id_business','=',$id_business)->get();
    foreach ($template as $form) {
        $new = new TemplateForm();
        $new->fill([
           'name_template' => $form->name_template,
           'image' => $form['image'],
           'source' => $form['source'],
           'id_user' => $id_company,
           'status_public' => 0,
           'status_template' => 1,
           'theme' => $form['theme'],
           'id_business' => 0,
       ])->save();
    }
}
public function verifyUser($token)
    {
        $verifyUser = VerifyUser::where('token', $token)->first();
        if(isset($verifyUser) ){
            $user = $verifyUser->user;
            if(!$user->verified) {
                $verifyUser->user->verified = 1;
                $verifyUser->user->save();
                $status = "Kích hoạt thành công. Bạn có thể đăng nhập.";
            }else{
                $status = "Email đã được kích hoạt thành công. Bạn có thể đăng nhập.";
            }
            VerifyUser::where('token', $token)->delete();
        }else{
            return redirect('/login')->with('warning', "Link kích hoạt đã hết hạn hoặc tài khoản đã được xác thực.");
        }
 
        return redirect('/login')->with('status', $status);
    }

protected function registered(Request $request, $user)
{
    $this->guard()->logout();
    return redirect($this->redirectTo)->with('status', 'Chúng tôi đã gửi thư đến gmail mà bạn đăng ký.Bạn vui lòng kiểm tra và kích hoạt tài khoản.');
}
}
