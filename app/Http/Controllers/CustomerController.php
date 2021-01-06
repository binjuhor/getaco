<?php

namespace App\Http\Controllers;

use App\ColorTag;
use App\Comment;
use App\Segment;
use App\RelCustomerSegment;
use App\CustomerAttribute;
use App\Customer;
use App\DynamicField;
use App\RelCustomerTag;
use App\Tag;
use App\Form;
use App\FormLog;
use App\Http\Controllers\SearchController;
use Elasticsearch\ClientBuilder;
use Illiminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\SendMailController;

class CustomerController extends Controller
{

    protected $redirectUrl = 'app/customer';

    protected $redirecAddtUrl = 'app/customer/add';

    /**
     * Index document name.
     *
     * @var string
     */
    protected $indexDocument    = 'getaco';

    /**
     * Document type.
     *
     * @var string
     */
    protected $documentType     = 'customer';


    public function __construct()
    {

    }

    /**
     * View all customer and attribute.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function index()
    {
        $user = Auth::user();
        $segments = Segment::where('id_company', '=', $user->id_company)->orwhere('id_company', '=', 0)->get();
        $segCus = RelCustomerSegment::all();
        $tags = Tag::where('id_company','=',$user->id_company)->where('delete',0)->orwhere('id_company','=',0)->get();
        $tagCus = RelCustomerTag::all();
        $color_tags = ColorTag::all();
        // $tagCus = RelCustomerTag::where('id_customer','=',$request['id'])->get();

        $customers = Customer::where('customer_status', '=', 1)
            ->where('id_company', '=', Auth::user()->id_company)
            ->where('type','lead')
            ->where('delete',0)
            ->orderBy('id_customer', 'desc')->paginate(10);

        $attributes = CustomerAttribute::where('status', 1)
                    ->where('id_company', '=', $user->id_company)
                    ->where('delete',0)->where('for',1)->get();
        $attr = CustomerAttribute::where('id_company', '=', $user->id_company)->where('delete',0)->where('for',1)->get();
        $type = "lead";
        if (0 != sizeof($customers)) {
            return view('customer.list', compact(
                'data', 'attributes', 'segments','segCus','customers','tags','tagCus','color_tags','type','attr'
            ));
        }
        return redirect($this->redirecAddtUrl);
    }

     /**
     * List customer from lead list
     *
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function customer()
    {
        $user = Auth::user();
        $segments = Segment::where('id_company', '=', $user->id_company)->orwhere('id_company', '=', 0)->get();
        $segCus = RelCustomerSegment::all();
        $tags = Tag::where('id_company','=',$user->id_company)->where('delete',0)->orwhere('id_company','=',0)->get();
        $tagCus = RelCustomerTag::all();
        $color_tags = ColorTag::all();
        $count_cus = count(Customer::where('id_company','=',$user->id_company)->get());
        $customers = Customer::where('customer_status', '=', 1)
            ->where('id_company', '=', Auth::user()->id_company)
            ->where('type','customer')
            ->where('delete', 0)
            ->orderBy('id_customer', 'desc')->paginate(10);
        $attributes = CustomerAttribute::where('status', 1)->where('id_company', '=', $user->id_company)->where('for',1)->where('delete',0)->get();
        $attr = CustomerAttribute::where('id_company', '=', $user->id_company)->where('delete',0)->where('for',1)->get();
        $type = "customer";
        if (0 != sizeof($customers)) {
            return view('customer.list', compact(
                'data', 'attributes', 'segments','segCus','customers','tags','tagCus','color_tags','count_cus','type','attr'
            ));
        }
        return redirect($this->redirecAddtUrl);
    }
    /**
     * Add a customer.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function add( Request $request )
    {
        if ($request->id_company) {
            $customer = new Customer();
            $info_add = $this->save($customer, $request);
            if($info_add == "erro")
                return redirect($this->redirecAddtUrl)->with(['tb' => $info_add]);
            // return redirect($this->redirectUrl);
            return redirect()->action('CustomerController@detail', ['id' => $customer->id_customer]);
        }
        $user = Auth::user();
        $color_tags = ColorTag::all();
        $segments = Segment::where('id_company','=',$user->id_company)->orwhere('id_company','=',0)->get();
        $tags = Tag::where('delete','=',0)->where('id_company','=',$user->id_company)->orwhere('id_company','=',0)->get();
        $tagCus = RelCustomerTag::where('id_customer','=',$request['id'])->get();
        $segCus = RelCustomerSegment::where('id_customer','=',$request['id'])->get();
        $attributes = $dynamics = CustomerAttribute::where('id_company', Auth::user()->id_company)->where('for',1)->where('delete',0)->get()->sortBy('sort_order');
        $comments = Comment::where('id_customer','=',$request['id'])->get() ;
        return view('customer.add',compact('attributes','segments','tags','tagCus','segCus','color_tags','comments'));
    }

    public function saveTag( $id_customer , $tag = [] )
    {
        if (isset($tag) && count($tag) ){
            foreach ($tag as $key => $value) {
                $tag_customer = new RelCustomerTag();
                $tag_customer->fill([
                    'id_customer' => $id_customer,
                    'id_tag' => $value,
                ])->save();
            }
        }
        return false;
    }

    public function saveSegment($id_customer , $segment)
    {
        if (isset($segment) && count($segment)){
            foreach ($segment as $key => $value) {
                $segment_customer = new RelCustomerSegment();
                $segment_customer->fill([
                    'id_customer' => $id_customer,
                    'id_segment' => $value,
                ])->save();
            }
        }
        return false;
    }

    /**
     * Add attribute to dynamic data.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function addDynamicData( $customer, $dynamics )
    {
        $attribute = array();
        DynamicField::where('id_customer', $customer->id_customer)->delete();
        if(isset($dynamics) && count($dynamics)){
            $i=0;
            foreach ($dynamics as $id_element => $value_field) {
                if ($id_element !='' && $value_field !='') {
                    $attribute[$i]['id_customer'] = $customer->id_customer;
                    $attribute[$i]['id_element'] = $id_element;
                    $attribute[$i]['value_field'] = is_array( $value_field )?json_encode( $value_field ):$value_field;
                    $attribute[$i]['created_at'] = $customer->created_at;
                    $attribute[$i]['updated_at'] = $customer->updated_at;
                    $i++;
                }
            }
            return DynamicField::insert($attribute);
        }
        return false;
    }

    /**
     * Get customer data to edit.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function FindSegment($id_company)
    {
        $segment = Segment::where('id_company',$id_company)->get();
    }
    public function detail( Request $request )
    {
        $user = Auth::user();

        $color_tags = ColorTag::all();
        $tags       = Tag::where('delete',0)->where('id_company','=',$user->id_company)->orwhere('id_company','=',0)->get();
        $tags_edit  = Tag::where('id_company','=',$user->id_company)->where('delete',0)->orwhere('id_company','=',0)->get();

        $segments   = Segment::where('id_company','=',$user->id_company)->orwhere('id_company','=',0)->get();


        $segCus     = RelCustomerSegment::where('id_customer','=',$request['id'])->get();
        $tagCus     = RelCustomerTag::where('id_customer','=',$request['id'])->get();
        $id = 0;
        if (isset($request->id)) {
            if (isset($request['key'])) {
                $detail_edit = 1;
            }
            else{
                $detail_edit = 0;
            }
            $customer = Customer::find($request->id);

            $checkCompany = $this->checkCompany($customer->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }

            // auto check segment
            $check = new SearchController;
            $seg_custom = $seg_auto = [];
            $count_ctm = Customer::where('customer_status', '=', 1)->where('id_company',$user->id_company)->where('type',$customer->type)->where('delete',0)->pluck('id_customer')->toArray();

            foreach ($segments as $key => $segment) {
                $option = (array) json_decode($segment->option);
                $status         = isset($option['tag'])?$option['tag']:null ;
                $attr_radio     = isset($option['radio'])?$option['radio']:null ;
                $attr_checkbox  = isset($option['checkbox'])?$option['checkbox']:null ;
                $attr_text      = isset($option['text'])?$option['text']:null ;
                $data_fillter = $check->getfillter($user,'customer',null,null,null,$status,$attr_radio,$attr_checkbox,$attr_text);
                if($segment->type == 'custom_segment'){
                    
                    $count_seg = RelCustomerSegment::where('id_segment',$segment->id_segment)->pluck('id_customer')->toArray();
                    
                    $count_custom = array_intersect($count_ctm,$count_seg);
                    if (in_array($customer->id_customer, $count_custom)) {
                        $seg_custom[] = $segment->segment_name;
                    }
                }
                if(in_array($customer->id_customer,$data_fillter)){
                    $seg_auto[] = $segment->segment_name;
                }
            }
            $seg = array_merge($seg_custom,$seg_auto);
            $seg = array_count_values($seg);
            $seg = array_keys($seg);
            //end auto check segment
            
            // lấy chữ cái đầu của tên
            $string_name = $customer->customer_name;
            $data = explode(" ", $string_name);
            $array = [];
            $i = 0;
            foreach ($data as $value) {
                $array[$i] = substr($value,0,1);
                $i += 1;
            }
            $name = strtoupper($array[0].array_pop($array));

            //end lấy chữ cái đầu của tên
            $attributes    = CustomerAttribute::where('id_company', Auth::user()->id_company)->where('delete',0)->where('for',1)->get()->sortBy('sort_order');
            $dataAttribute = DynamicField::where('id_customer',     $customer->id_customer)->get();
            $comments      = Comment::where('id_customer','=',$request['id'])->orderBy('sticky','dec')->orderBy('id', 'dec')->get();
            foreach ($comments as $cm){
                $string_name2 = $cm->user->name;
                $data2 = explode(" ", $string_name2);
                $name_user = "";
                foreach ($data2 as $value) {
                    $b = str_split($value);
                    $name_user .= ''.$b[0].'';
                }
                $cm['name_user'] = $name_user;
            }
            return view('customer.detail',compact(
            	'customer','attributes', 'dataAttribute',
                'tags','tagCus','segCus','segments',
                'color_tags','comments','name','name_user','seg',
                'detail_edit','tags_edit'));
        }

        return redirect($this->redirectUrl);
    }

    public function GetSegment($id)
    {
        # code...
    }

    public function edit(Request $request){

        $id_customer = $request['id_customer'];
        $user = Auth::user();
        $color_tags = ColorTag::all();
        $tags = Tag::where('id_company','=',$user->id_company)->where('delete',0)->orwhere('id_company','=',0)->get();
        $segments = Segment::where('id_company','=',$user->id_company)->orwhere('id_company','=',0)->get();
        $segCus = RelCustomerSegment::where('id_customer','=',$request['id'])->get();
        $tagCus = RelCustomerTag::where('id_customer','=',$request['id'])->get();


        if (isset($request->id)) {
            $customer = Customer::find($request->id);
                // check company
            $checkCompany = $this->checkCompany($customer->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //
            // lấy chữ cái đầu của tên
            $string_name = $customer->customer_name;
            $data = explode(" ", $string_name);
            $name = "";
            foreach ($data as $value) {
                $b = str_split($value);
                $name .= ''.$b[0].'';
            }
            //end lấy chữ cái đầu của tên
            $attributes = CustomerAttribute::where('id_company', Auth::user()->id_company)->where('for',1)->get()->sortBy('sort_order');
            $dataAttribute = DynamicField::where('id_customer', $customer->id_customer)->get();
            $comments = Comment::where('id_customer','=',$request['id'])->orderBy('id', 'desc')->get();

            foreach ($comments as $cm){
                $string_name2 = $cm->user->name;
                $data2 = explode(" ", $string_name2);
                $name_user = "";
                foreach ($data2 as $value) {
                    $b = str_split($value);
                    $name_user .= ''.$b[0].'';
                }
                $cm['name_user'] = $name_user;
            }
            return view('customer.edit',compact('customer','attributes', 'dataAttribute','tags','tagCus','segCus','segments','color_tags','comments','name'));
        }

        return redirect("app/customer/edit?id=$id_customer");
    }

    /**
     * Save customer data.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function checkIsset(Request $request)
    {
        if($request->key != null){
            $key = $request->key;
            $check = Customer::where('id_company',Auth::user()->id_company)->where('delete',0)
            ->where(function($query) use ($key)
            {
                $query->where('customer_email',$key)->orWhere('customer_phone',$key);

            })->pluck('id_customer')->toArray();
            $check = json_encode($check);
        }else
            $check = 0;
        return $check;
    }

    public function check($request)
    {
        $customer_email = $request->customer_email;
        $customer_phone = $request->customer_phone;
        $id_company = $request->id_company;
        $check = Customer::where('customer_email',$request->customer_email)->where('customer_phone',$request->customer_phone)->where('id_company',$request->id_company)->where('delete',0)->get();

        $email = Customer::where('customer_email',$request->customer_email)->where('id_company',$request->id_company)->where('delete',0)->get();
        $phone = Customer::where('customer_phone',$request->customer_phone)->where('id_company',$request->id_company)->where('delete',0)->get();

        if(count($check) > 0){
            $data = ['err' => 'err'];
        }
        elseif(count($email) > 0 ){

            foreach ($email as $val) {
                $id_customer = $val->id_customer;
            }
            
            $data = ['err' => 'err_email', 'id_customer' => $id_customer];
        }
        elseif(count($phone) > 0 ){

            foreach ($phone as $val) {
                $id_customer = $val->id_customer;
            }
            
            $data = ['err' => 'err_phone', 'id_customer' => $id_customer];
        }else{
            $data = ['err' => 'ok'];
        }
        return $data;
    }

    
/**
     * Save Customer Data from Embed form.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    // $request->err_code,$request->old_customer,$customer->id_customer
    public function saveEmbedData( Request $request )
    {
        $customer = new Customer();
        $data = $this->check($request);
        $request['err_code'] =  $data['err'];
        $old_id =  !empty($data['id_customer'])?$data['id_customer']:'';
        $newCustomer = $this->save($customer, $request, $old_id);
        $this->updateFormLog( $request );
        $this->updateCustomerLog( $request, $newCustomer ); 
        response("", 200)->header('Content-Type', 'text/plain');
        $mail = new SendMailController();
        $mail->MailSubmit($request->id_company);      
        return;
    }

    public function combine($err,$id_old,$id_new)
    {
        if($err == "err_phone" || $err == "err_email"){
        $old_customer = Customer::findOrFail($id_old);
        $new_customer = Customer::findOrFail($id_new);
        
            if($new_customer->customer_name == "")
                $new_customer->customer_name = $old_customer->customer_name;

            if ($old_customer->type == 'customer')
                $new_customer['type'] = 'customer';

            if ($new_customer->customer_phone == "")
                $new_customer->customer_phone = $old_customer->customer_phone;

            if ($new_customer->customer_email == "")
                $new_customer->customer_email = $old_customer->customer_email;

            $new_customer->save();

            $merge_comment = Comment::where('id_customer', '=', $id_old)->update(array('id_customer' => $id_new));
            
            $rel_tag = Customer::find($id_old)->rel_tag;

            foreach ($rel_tag as $rows) {
                $combie_tag = RelCustomerTag::findOrFail($rows->id_customer_tag);
                $check_tag = RelCustomerTag::where('id_customer',$id_new)->where('id_tag',$combie_tag->id_tag)->get()->count();
                if($check_tag == 0){
                    $combie_tag->id_customer = $id_new;
                    $combie_tag->save();
                }else{
                    $combie_tag->delete();
                }

            }
            $rel_segment = Customer::find($id_old)->rel_seg;
            foreach ($rel_segment as $rows) {
                $combie_segment = RelCustomerSegment::findOrFail($rows->id_customer_segment);
                $check_seg = RelCustomerSegment::where('id_customer',$id_new)->where('id_segment',$combie_segment->id_segment)->get()->count();
                if($check_seg == 0){
                    $combie_segment->id_customer = $id_new;
                    $combie_segment->save();
                }else{
                    $combie_segment->delete();
                }

                
            }


            $find_dynamic = Customer::findOrFail($id_old)->dynamic_customer;
            
            foreach ($find_dynamic as $rows) {
                $combie_dynamic = DynamicField::findOrFail($rows->id_dynamic);
                $check_dynamic = DynamicField::where('id_customer',$id_new)->where('id_element',$combie_dynamic->id_element)->get()->count();
                if($check_dynamic == 0){
                    $combie_dynamic->id_customer = $id_new;
                    $combie_dynamic->save();
                }else{
                    $combie_dynamic->delete();
                }
                
            }
            
            $old_customer->delete();
        }
        return false;
    }
    

    public function save( $customer, $request)
    {
        $customer['id_form']        = $request->id_form?$request->id_form:0;
        $customer['from_url']       = $request->from_url?$request->from_url:'';
        $customer['customer_name']  = $request->customer_name?$request->customer_name:'';
        $customer['customer_email'] = $request->customer_email?$request->customer_email:'';
        $customer['customer_phone'] = $request->customer_phone?$request->customer_phone:'';
        if (isset($request->data)) {
            $customer['dynamic_field'] = $this->dataCustomer( $request );
        }
        
        if (!isset($customer->dynamic_field)) {
            $customer['dynamic_field'] = '';
        }
        
        $customer['id_company'] = $request->id_company?$request->id_company:0;
        $customer['sort_order'] = 0;
        $customer['delete'] = 0;
        $customer['customer_status'] = 1;
        
        $customer->save();

        $id_customer = $customer->id_customer;
        $this->saveTag($id_customer, $request->tag);
        $this->saveSegment($id_customer, $request->segment);
        $this->addDynamicData( $customer, $request->customer_attr );
       
        // $this->updateIndex( $customer ); //Update Elasticsearch.
        return $customer;
    }
   
    /**
     * Update customer data.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function update(Request $request)
    {

        if (isset($request->id_customer)) {
            $id_tag = $request->tag;
            $id_customer = $request['id_customer'];
            $tag_comment = $request['tag_comment'];
            $allRequest =  $request->all();
            $customer = Customer::find($request->id_customer);
                // check company
            $checkCompany = $this->checkCompany($customer->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //
            $tag_old = RelCustomerTag::where('id_customer',$id_customer)->pluck('id_tag')->toArray();
            
            $this->save($customer, $request);
            $this->saveComment($id_tag,$tag_old,$id_customer);    
            $this->saveTagCustomer($id_tag,$id_customer);
        }
        $id_customer = $request['id_customer'];
        // update Segment
        $id = $allRequest['id_customer'];
        $seg = RelCustomerSegment::where('id_customer','=',$id)->get();
        foreach ($seg as $key) {
            $key->delete();
        }
        if (isset($allRequest['segment'])) {
            $seg2 = $allRequest['segment'];
            foreach($seg2 as $key){
                $newSeg = new RelCustomerSegment();
                $newSeg->fill([
                   'id_customer' => $id,
                   'id_segment' =>$key
                ])->save();
            }
        }
        return redirect("app/customer/detail?id=$id_customer");
    }
    
    /**
     * Delete all customer information.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function delete( Request $request )
    {
        $customer = Customer::find( $request->id );
            // check company
            $checkCompany = $this->checkCompany($customer->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //
        $customer['delete'] = 1;
        $customer->save();
        // $this->deleteIndex( $request->id );
        return back()->withInput();
    }

    /**
     * Delete index from Elasticsearch.
     *
     * @param int $id
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function deleteIndex( int $id )
    {
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => $this->indexDocument,
            'type' => $this->documentType,
            'id' => $id
        ];
        return  $client->delete($params);
    }

    /**
     * Update index Elasticsearch.
     *
     * @param Customer $customer
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function updateIndex( Customer $customer )
    {
         if( $customer ){
            $client = ClientBuilder::create()->build();
            $params = [
                'index' => $this->indexDocument,
                'type'  => $this->documentType,
                'id'    => $customer->id_customer,
                'body'  => [
                    "customer_name"   => $customer->customer_name,
                    "id_form"         => $customer->id_form,
                    "customer_email"  => $customer->customer_email,
                    "customer_phone"  => $customer->customer_phone,
                    "from_url"        => $customer->from_url,
                    "id_company"      => $customer->id_company,
                    "customer_status" => $customer->customer_status,
                    "type"            => $customer->type,
                    "attribute"       => $customer->attribute,
                    "created_at"      => $customer->created_at,
                    "updated_at"      => $customer->updated_at
                ]
            ];
            return $client->index($params);
        }
        return false;
    }



    /**
     * Update form information.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function updateFormLog( Request $request )
    {
        $logs              = [];
        $form              = Form::find( $request->id_form );
        $oldLog            = json_decode($form->logs);
        $showed            = 0;
        $submited          = 0;
        if ($oldLog !='') {
            $showed        = $oldLog->form_show ?intval($oldLog->form_show): 0;
            $submited      = $oldLog->submited ?intval($oldLog->submited)  : 0;
        }
        $logs['form_show'] = $showed + intval( $request->form_show );
        $logs['submited']  = $submited + 1;
        $form['logs']      = json_encode($logs);
	    return $form -> save();
    }
    
  /**
   * Update form log in log table.
   *
   * @param Request $request
   * @param Customer $customer
   * @return void
   * @author Binjuhor - binjuhor@gmail.com
   * @version 1.0.0
   */
    public function updateCustomerLog( Request $request, Customer $customer )
    {
        $newLog = new FormLog();
        $newLog['id_form'] = $request->id_form;
        $newLog['id_customer'] = $customer->id_customer;
        $newLog['from_url'] = $request->from_url?$request->from_url:'';
        $newLog['logs'] ='';
        return $newLog->save();
    }

    /**
     * Convert Lead to customer.
     *
     * @param Request $request
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function lead( Request $request )
    {
        $lead = Customer::find( $request->id );
        $lead['type'] = 'customer';
        $lead->save();
        //add log become customer
        $log = new Comment();
        $log->idUser = Auth::User()->id;
        $log->id_customer = $request->id;
        $log->comment_content = "become customer";
        $log->type = 3;
        $log->save();

        return redirect()->to($this->redirectUrl);
    }

    public function trashList()
    {
        $customers = Customer::where('customer_status',0)->where('delete',0)->get();
        return view('customer.trash',compact('customers'));
    }

    public function untrash(Request $request)
    {
        $id = $request['id'];
        $customer = Customer::find($id);
        $customer->update([
            'customer_status' => 1,
        ]);
        return redirect()->back();
    }
    
    public function dataCustomer(Request $request )
    {
        $json  = "";
        $data2 = $request->data;
        foreach ($data2 as $key => $value) {
            $a = explode("_",$key);
            if (is_array($value)) {
                $json2 = json_encode($value);
            }
            else {
                $json2 = $value; 
            }
            $json .='{"id_field" : "'.$a[1].'_'.$a[2].'","label" : "'.$a[3].'","value" : "'.$json2.'"},';
        };
        return $json;
    }

    public function comment(Request $request){
        $id_customer = $request['id_customer'];
            // check company
        $customer = Customer::find($id_customer);
            $checkCompany = $this->checkCompany($customer->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //
        $comments = new Comment();
        $comments->id_customer = $id_customer;
        $comments->idUser = Auth::user()->id;
        $comments->comment_content = $request->comment_content;
        $comments->status_tag = 'true';
        $comments->type = $request->tag_comment;
        $comments->save();
        if ($request->tag_comment != 0) {
            $this->setStatus($request->tag_comment,$id_customer);
        }

        return redirect()->back();
    }
    public function setStatus($id_status,$id_customer)
    {
       $tag = RelCustomerTag::where('id_tag',$id_status)->where('id_customer',$id_customer)->get();
       if (count($tag) == 0) {
           $new = new RelCustomerTag();
           $new->fill([
                'id_customer' => $id_customer,
                'id_tag' => $id_status,
           ])->save();
       }
       return;
    }

    public function delete_comment( Request $request )
    {
        $comments = Comment::find($request['id']);
          // check company
        $customer = Customer::find($comments->id_customer);
            $checkCompany = $this->checkCompany($customer->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //
        if($comments['idUser'] == Auth::user()->id){
            Comment::find($request['id'])->delete();
        }
        return redirect()->back();
    }

    public function edit_comment(Request $request){
        $id_comment = $request['id_comment'];
        $comments = Comment::find($id_comment);
          // check company
        $customer = Customer::find($comments->id_customer);
            $checkCompany = $this->checkCompany($customer->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //
        if($comments['idUser'] == Auth::user()->id) {
            $comments->update([
                'comment_content' => $request->txt_comment
            ]);
        }
        return redirect()->back();
    }
    public function tag_comment(Request $request)
    {
        $tag = $request['tag_comment'];
        $id = $request['tag_id'];
        $id_user = Auth::User()->id;
//        add comment
        $tag_comment = new Comment();
        $tag_comment->fill([
            'id_customer'=> $request['id_customer'],
            'idUser' => $id_user,
            'comment_content' => $tag,
            'type' => 1,
        ])->save();
//        add tag customer

        $customer = RelCustomerTag::where('id_customer','=',$request['id_customer'])->where('id_tag','=',$id)->get();
        if (count($customer) == 0){
            $tag_customer = new RelCustomerTag();
            $tag_customer->fill([
                'id_customer' => $request['id_customer'],
                'id_tag' => $id,
            ])->save();
        }
        return redirect()->back();
    }
    public function saveComment($id_tag,$tag_old,$id_customer){

        $user = Auth::User();
        $id_tag = $id_tag == null?[]:$id_tag;
        $new = array_diff($id_tag,$tag_old);
        $old = array_diff($tag_old,$id_tag);
        if (!empty($new)) {
            foreach ($new as $value) {
                $tag = Tag::findOrFail($value);
                $comment = new Comment();
                $comment->fill([
                    'idUser' => $user->id,
                    'id_customer'=> $id_customer,
                    'comment_conent' => '',
                    'type'=>$value,
                    'status_tag'=>'true',
                ])->save();
            }
        }
        if (!empty($old)) {
            foreach ($old as $value) {
                $tag = Tag::findOrFail($value);
                $comment = new Comment();
                $comment->fill([
                    'idUser' => $user->id,
                    'id_customer'=> $id_customer,
                    'comment_conent' => '',
                    'type'=>$value,
                    'status_tag'=>'false',
                ])->save();
            }
        }
    }
    public function saveTagCustomer($id_tag,$id_customer){
        RelCustomerTag::where('id_customer','=',$id_customer)->delete();
        if (!empty($id_tag)) {
            foreach ($id_tag as $key => $value){
                    $tagC = new RelCustomerTag();
                    $tagC->fill([
                        'id_customer' => $id_customer,
                        'id_tag' => $value,
                    ])->save();
            }
        }
    }
    public function stickyComment(Request $request)
    {
        $id = $request->id;
        $id_customer = $request->id_customer;
        $comments = Comment::where('id_customer','=',$id_customer)->get();
        foreach ($comments as $comment) {
            $comment->update([
                'sticky' => 0,
            ]);
        }
        Comment::find($id)->update([
            'sticky' => $request->value,
        ]);
        return;
    }
   
}