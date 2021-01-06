<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Picinside\Taxrelations;
use Elasticsearch\ClientBuilder;
use App\CustomerAttribute;
use App\Customer;
use App\ColorTag;
use App\Comment;
use App\Segment;
use App\RelCustomerSegment;
use App\DynamicField;
use App\RelCustomerTag;
use App\Tag;
use App\Form;
use App\FormLog;
use DB;
use App\Http\Controllers\SegmentController;
use Illuminate\Database\Eloquent\Collection;

class SearchController extends Controller
{
    protected $indexDocument    = 'getaco';

    protected $documentType     = 'customer';

    protected $page = 0;

    protected $limit = 15;

    protected $redirect = '/app/customer';

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function search_basic(Request $request)
    { 
        $keyWord = $request->key;
        $user = Auth::user();
        $customers = Customer::where('id_company', $user->id_company)
        ->where('delete',0)
        ->where(function($query) use ($keyWord)
        {
            $query->where('customer_name','like','%'.$keyWord.'%')
                    ->orWhere('customer_email','like','%'.$keyWord.'%')
                    ->orWhere('customer_phone','like','%'.$keyWord.'%');

        })
        ->get();

        $segments = Segment::where('id_company', '=', $user->id_company)->orwhere('id_company', '=', 0)->get();
        $segCus = RelCustomerSegment::all();
        $tags = Tag::where('id_company','=',$user->id_company)->orwhere('id_company','=',0)->get();
        $tagCus = RelCustomerTag::all();
        $color_tags = ColorTag::all();
        return view('search.search_result', compact(
            'data','segments','segCus','customers','id_segment','tags','tagCus','color_tags','type'
        ));
    }
    public function FillterShortcut()
    {
        $user = Auth::user();
        $segment = Segment::findOrFail($_GET['id']);
        // check company
        if($user->id_company != $segment->id_company){
            return redirect('/app');
        }
        $option = (array) json_decode($segment->option);
        $status         = isset($option['tag'])?$option['tag']:null ;
        $attr_radio     = isset($option['radio'])?$option['radio']:null ;
        $attr_checkbox  = isset($option['checkbox'])?$option['checkbox']:null ;
        $attr_text      = isset($option['text'])?$option['text']:null ;

        $data_fillter = $this->getfillter($user,'customer',null,null,null,$status,$attr_radio,$attr_checkbox,$attr_text);
        if($segment->type == 'custom_segment'){
            $count_ctm = Customer::where('customer_status', '=', 1)->where('id_company',$user->id_company)->where('type','customer')->where('delete',0)->pluck('id_customer')->toArray();

            $count_seg = RelCustomerSegment::where('id_segment',$segment->id_segment)->pluck('id_customer')->toArray();
            
            $count_custom = array_intersect($count_ctm,$count_seg);

            $data_fillter = array_merge($data_fillter,$count_custom);
            $data_fillter = array_keys(array_count_values($data_fillter));
        }
        return $this->ResultFillter($user,$data_fillter,'customer',$option,$segment,null,null,null);
    }
    public function save_fillter(Request $request)
    {
        $save_segment = new SegmentController();
        $save_segment->add($request);
        return back()->withInput(['success'=>'success']);
    }

    public function getfillter($user,$type,$name,$from_date,$to_date,$status,$attr_radio,$attr_checkbox,$attr_text)
    {
        $data_all = $data_name = $data_tag = $data_attr_radio = $data_checkbox = $data_attr_text = Customer::where('id_company', $user->id_company)->where('delete',0)->where('type',$type)->pluck('id_customer')->toArray();

        if(isset($name))
            $data_name = Customer::where('id_company', $user->id_company)->where('delete',0)->where('type',$type)
                        ->where('customer_name','like','%'.$name.'%')
                        ->pluck('id_customer')->toArray();

        if(isset($from_date))
            $data_date = Customer::where('id_company',$user->id_company)->where('delete',0)->where('type',$type)
                        ->where('updated_at','>=',$from_date.' 00:00:01' )->where('updated_at','<=',$to_date.' 23:59:00')
                        ->pluck('id_customer')->toArray();

        elseif (isset($from_date))
            $data_date = Customer::where('id_company',$user->id_company)->where('delete',0)->where('type',$type)
                        ->where('updated_at','>=',$from_date.' 00:00:01' )
                        ->pluck('id_customer')->toArray();

        elseif(isset($to_date))
            $data_date = Customer::where('id_company',$user->id_company)->where('delete',0)->where('type',$type)
                        ->where('updated_at','<=',$to_date.' 23:59:00')
                        ->pluck('id_customer')->toArray();
        else
            $data_date = $data_all;

        if(isset($status)){
            $tag_list = RelCustomerTag::wherein('id_tag',$status)->pluck('id_customer')->toArray();
            $tag_list = array_count_values($tag_list);
            $data_tag = [];
            foreach ($tag_list as $key => $value) {
                if($value == count($status)){
                    $data_tag[] = $key;
                }
            }
        }
        //find attribute
        if(isset($attr_radio)){
            foreach ($attr_radio as $key => $value) {
                $key_attr[] = $key;
                foreach ($value as $val) {
                    $value_attr[] = $val;
                }
            }
            $attr_list = DynamicField::wherein('id_element',$key_attr)->wherein('value_field',$value_attr)->pluck('id_customer')->toArray();
            $attr_list = array_count_values($attr_list);
            $data_attr_radio = array_keys($attr_list);
        }
        //check attr checkbox
        if(isset($attr_checkbox)){
            foreach ($attr_checkbox as $key => $value) {
                $key_attr[] = $key;
                if(count($value)>1)
                    $value_attr[] = json_encode($value);
                else
                    $value_attr[] = $value;
            }
            $data_checkbox = DynamicField::wherein('id_element',$key_attr)->where('value_field',$value_attr)->pluck('id_customer')->toArray();
        }
        // end find attr checkbox
        //attr text
        if(isset($attr_text)){
            $data_attr_text = DynamicField::wherein('id_element',$attr_text)->pluck('id_customer')->toArray();
        }
        // end text
        $data_attr = array_intersect($data_attr_radio,$data_attr_text,$data_checkbox);
        // end find attribute
        $data_fillter = array_intersect($data_name,$data_date,$data_tag,$data_attr);
        return $data_fillter;
        
    }
    public function fillter(Request $request)
    {

        ini_set('max_execution_time', 0);
        $user = Auth::user();
        //request data
        $type = $request->customer_type;
        $name = $request->name_fillter;
        $from_date = $request->fillter_from;
        $to_date = $request->fillter_to;
        $status = $request->tag;
        $attr_radio = $request->attr_fillter_radio;
        $attr_checkbox = $request->attr_fillter_checkbox;
        $attr_text = $request->attr_fillter_text;
        // end request data
        //html
            $data = $request->all();
            $html_return = '';
        if(isset($request->html_attr_search)){

            $html_return = $data['html_attr_search'];   
            //
            $remove = ['_token','customer_type','html_attr_search','name_fillter','fillter_from','fillter_to','save_fillter_name','tag'];
            foreach ($remove as  $value) {
                unset($data[$value]);
            }
        }
        //
        //end html
        $data_fillter = $this->getfillter($user,$type,$name,$from_date,$to_date,$status,$attr_radio,$attr_checkbox,$attr_text);
        return $this->ResultFillter($user,$data_fillter,$type,'',null,$data,$html_return,$status);
        
    }
    public function ResultFillter($user,$data_fillter,$type,$fillter,$segment,$data,$html_return,$status)
    {
        $customers = Customer::wherein('id_customer',$data_fillter)->where('id_company', $user->id_company)
        ->where('delete',0)->where('type',$type)->paginate(10);
        $id_segment = 0;
        $segments = Segment::where('id_company', '=', $user->id_company)->orwhere('id_company', '=', 0)->get();
        $segCus = RelCustomerSegment::all();
        $tags = Tag::where('id_company','=',$user->id_company)->where('delete',0)->orwhere('id_company','=',0)->get();
        $tagCus = RelCustomerTag::all();
        $color_tags = ColorTag::all();
        $count_cus = count(Customer::where('id_company','=',$user->id_company)->get());
        $attributes = CustomerAttribute::where('status', 1)->where('id_company', '=', $user->id_company)->get();
        $attr = CustomerAttribute::where('id_company', '=', $user->id_company)->where('delete',0)->get();

        return view('customer.list', compact(
            'data', 'attributes', 'segments','segCus','customers','id_segment',
            'tags','tagCus','color_tags','count_cus','type','attr' , 'name' ,
            'from_date' ,'to_date' ,'status','seg','data','html_return','fillter','segment'
        ));
    }

    public function index( Request $request )
    {
        
        if(!$request->id){
            return redirect($this->redirect);
        }
        $customer = Customer::find($request->id);
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
        return "Customer with". $request->id ." does not exits.";
    }

    /**
     * Bulk data to elasticsearch
     *
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function bulk()
    {
        $user    = Auth::user();
        $allCustomer = Customer::where('customer_status', 1)
        ->where('delete',0)->where('id_company',$user->id_company)
        ->get();

        $client = ClientBuilder::create()->build();
        foreach ($allCustomer as $key => $customer) {
            $params['body'][] = [
                'index' => [
                    '_index' => $this->indexDocument,
                    '_type'  => $this->documentType,
                    '_id'     => $customer->id_customer,
                ]
            ];
            $params['body'][] = [
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
                "updated_at"      => $customer->updated_at,
            ];
            if ($key % 1000 == 0) {
                $responses = $client->bulk($params);
                $params = ['body' => []];
                unset($responses);
            }
        }
        if (!empty($params['body'])) {
            $responses = $client->bulk($params);
        }
        return $responses;
    }

    /**
     * Delete a index from Elasticsearch database.
     *
     * @param Request $request
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function delete( Request $request )
    {
        if(!$request->id){
            return redirect($this->redirect);
        }
        $client = ClientBuilder::create()->build();
        $params = [
            'index' => $this->indexDocument,
            'type'  => $this->documentType,
            'id'    => $request->id,
        ];
        $response = $client->delete($params);
    }

    /**
     * Search all data.
     *
     * @return array
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function search( Request $request )
    { 
        $a = $request->all();
        $client  = ClientBuilder::create()->build();
        $page    = $request->page?$request->page:$this->page;
        $lim     = $request->lim?$request->lim:$this->limit;
        $from    = $page * $lim;
        $name = $request->name_fillter;
        $fillter_from = $request->fillter_from;
        $fillter_to = $request->fillter_to;
        $fillter_status = $request->fillter_status;

        $params  = [
            'index'  => $this->indexDocument,
            'type'   => $this->documentType,
            "from"   => $from,
            "size"   => $lim,
            'body'   => [
                'query' => [
                    'bool' => [
                        // 'filter' => [
                        //     'term' => [ 'id_company' => $user->id_company ]
                        // ],
                        'should' => [
                            'match' => [ 'customer_name' => 'dsss' ]
                        ]
                    ]
                ]
            ]
        ];
        $results   = $client->search($params);
        $customers = $results['hits']['hits'];
        $customer  = new Customer();
        return view('search.index', compact('customers', 'customer','from','lim','keyWord','page' ));
    }
}
