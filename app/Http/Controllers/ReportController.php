<?php

namespace App\Http\Controllers;

use App\Tag;
use App\Customer;
use App\User;
use App\RelCustomerTag;
use App\RelCustomerSegment;
use App\FormLog;
use App\Form;
use App\Segment;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Collection;

class ReportController extends Controller
{
    private $emailDemo = 'demo@getaco.com';
    
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function convert(Request $request)
    {
        if(isset($request->type)){
            $type = $request->type;
        }else{
            $type = "customer";
        }
        $startTime = date("Y-m-d");
        $report_from = date('Y-m-d',strtotime('-30 day',strtotime($startTime)))." "."00:00:01";
        $report_to = date("Y-m-d H:i:s");
        $seg = Segment::where('id_company',Auth::User()->id_company)->orwhere('id_company',0)->where('updated_at','>=',$report_from )->where('updated_at','<=',$report_to)->get();
        $sum_cus = Customer::where('id_company',Auth::User()->id_company)
        ->where('delete',0)->where('type',$type)->where('updated_at','>=',$report_from )->where('updated_at','<=',$report_to)
        ->get();
        $sum = count($sum_cus);
        // thống kê segment
        $index_seg   =  $customerID = $c_seg = array();
        foreach ($sum_cus as $key => $customer) {
            $customerID[] = $customer->id_customer;
        }
        foreach ($seg as $t) {
            $c_seg[] = $t->segment_name;
            $countCustomer = (RelCustomerSegment::whereIn('id_customer',$customerID)
                ->where('id_segment',$t->id_segment)->where('updated_at','>=',$report_from )->where('updated_at','<=',$report_to)
                ->get()
                ->count());
            if($countCustomer == 0)
                $index_seg[] = 0;
            else
                $index_seg[] =  $countCustomer;
        }
        //end thống kê segment


        // dd($index_seg);
        // end thống kê tag
        $tag = Tag::where('id_company',Auth::User()->id_company)->orwhere('id_company',0)->where('updated_at','>=',$report_from )->where('updated_at','<=',$report_to)->get();
        $index   =  $customerID = $c_tag = array();
        foreach ($sum_cus as $key => $customer) {
            $customerID[] = $customer->id_customer;
        }
        foreach ($tag as $t) {
            $c_tag[] = $t->tag_name;
            $countCustomer = (RelCustomerTag::whereIn('id_customer',$customerID)
                ->where('id_tag',$t->id_tag)
                ->get()
                ->count());
            if($countCustomer == 0){
                $index[] = 0;
            }
            else{
                $index[] = $countCustomer;
            }
        }
        $user = Auth::user();
        if ( $user->email == $this->emailDemo ) {
            $sum  = 200;
            $index_seg  = [100,60,180,120,150];
            $c_seg  = ['5-10tr/tháng','10-20tr/tháng','Trên 50tr','Tiềm Năng','Trả góp'];

            $index  = [100,60,180,120,150];
            $c_tag  = ['Call','Send mail','Success','Checked','Think'];
            // $tag = [];
        }
        //thống kê tag
        return view('report.convert',compact('sum','index_seg','c_seg','index','c_tag','type','tag'));
    }

    public function customReport(Request $request)
    {
        $report_from = $request->report_from;
        $report_to = $request->report_to;
        $id_tag = $request->id_tag;
        $khoang = "+ ".$request->khoang." day";
        $type = $request->type;
        $sum_cus = Customer::where('id_company',Auth::User()->id_company)
        ->where('delete',0)->where('type',$type)->where('updated_at','>=',$report_from )->where('updated_at','<=',$report_to)
        ->get();
        $sum = count($sum_cus);


        // thống kê segment
        $seg = Segment::where('id_company',Auth::User()->id_company)->orwhere('id_company',0)->where('updated_at','>=',$report_from )->where('updated_at','<=',$report_to)->get();
        $index_seg   =  $customerID = $c_seg = array();
        foreach ($sum_cus as $key => $customer) {
            $customerID[] = $customer->id_customer;
        }
        foreach ($seg as $t) {
            $c_seg[] = $t->segment_name;
            $countCustomer = (RelCustomerSegment::whereIn('id_customer',$customerID)
                ->where('id_segment',$t->id_segment)->where('updated_at','>=',$report_from )->where('updated_at','<=',$report_to)
                ->get()
                ->count());
            if($countCustomer == 0)
                $index_seg[] = 0;
            else
                $index_seg[] =  $countCustomer;
        }
        //end thống kê segment


        // end thống kê tag
        $index   =  $customerID = $c_tag = array();
        foreach ($sum_cus as $key => $customer) {
            $customerID[] = $customer->id_customer;
        }
        if($id_tag == 0){
            $tag = Tag::where('id_company',Auth::User()->id_company)->get();
            foreach ($tag as $t) {
                $c_tag[] = $c_tag_table[] = $t->tag_name;
                $countCustomer = (RelCustomerTag::whereIn('id_customer',$customerID)
                    ->where('id_tag',$t->id_tag)->where('updated_at','>=',$report_from )->where('updated_at','<=',$report_to)
                    ->get()
                    ->count());
                if($countCustomer == 0){
                    $index[] = 0;
                }
                else{
                    $index[] = $countCustomer;
                }
            }
        }else{
            $cenvertedTime = $report_from;
            $extra_time =  $report_from;
            $i =0;
            while (strtotime($report_from) <= strtotime($cenvertedTime) && strtotime($report_to) >= strtotime($cenvertedTime)) {

                $time_text = date('d M', strtotime($extra_time));
                if($khoang == "+ 1 day"){
                    if($i%5 == 0)
                        $c_tag[] = $time_text;
                    else
                        $c_tag[] = "" ;
                }else{
                    $c_tag[] = $time_text;
                }
                $c_tag_table[] = $time_text;
                $extra_time = date('Y-m-d',strtotime($khoang,strtotime($cenvertedTime)));

                $countCustomer = (RelCustomerTag::whereIn('id_customer',$customerID)
                    ->where('id_tag',$id_tag)->where('updated_at','>=',$cenvertedTime )->where('updated_at','<=',$extra_time)
                    ->get()
                    ->count());

                $cenvertedTime = $extra_time;

                if($countCustomer == 0)
                    $index[] = 0;
                else
                    $index[] = $countCustomer;
                $i++;
            }


        }
        $user = Auth::user();
        if ( $user->email == $this->emailDemo ) {
            $sum = 200;
            $c_tag = $c_tag_table = ['28 May','02 Jun', '07 Jun','12 Jun','17 Jun','22 Jun','27 Jun'];
            $index = [100,130,20,50,110,80,60];
        }
        //thống kê tag
        $data = ['tag_name' => $c_tag, 'index_tag' => $index , 'tag_table' => $c_tag_table ,'select_type' => $type ,'sum' => $sum,'c_seg'=>$c_seg,'index_seg'=>$index_seg];
        return json_encode($data);
    }

    /**
     * Analytics top form and top customer URL from.
     *
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function analytics()
    {
        $visistors  = 0;
        $user       = Auth::user();
        $redis      = Redis::connection();
        $arrayID    = [];
        $forms      = Form::where('id_company', $user->id_company)->where('form_status',1)->get();
        foreach ($forms as $key => $form) {
            $arrayID[] = $form->id_form;
            if($redis->get('form_'.$form->id_form)){
                $show = json_decode($redis->get('form_'.$form->id_form))->show;
                $visistors = $visistors + $show;
            }
        }
        $url_total_raw = \DB::raw('count(*) as total');
        $formInforURL  = FormLog::getQuery()
                        ->select('from_url', $url_total_raw)
                        ->groupBy('from_url')
                        ->whereIn('id_form',  $arrayID)
                        ->get();

        $leads  = FormLog::getQuery()
                ->select( $url_total_raw )
                ->whereIn('id_form',  $arrayID)
                ->get();

        $formLog = new FormLog();

        if ( $user->email == $this->emailDemo) {
            return view('example.analytics',compact('forms', 'formInforURL','formLog','leads', 'visistors'));
        }
        return view('report.analytics',compact('forms', 'formInforURL','formLog','leads', 'visistors'));
    }
    

    /**
     * Get data tracking with form ID
     *
     * @param Request $request
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function analyticsWithFormID( Request $request )
    {
        $id            = $request->form_id;
        $user          = Auth::user();
        $forms         = Form::where('id_company',$user->id_company)->where('form_status',1)->get();
        if( $request->form_id > 0){
            $arrayID[] = $request->form_id;
        }else{
            foreach ($forms as $key => $form) {
                $arrayID[] = $form->id_form;
            }
        }
        $url_total_raw = \DB::raw('count(from_url) as total');
        $formInforURL  = FormLog::getQuery()
        ->select('from_url', $url_total_raw)
        ->groupBy('from_url')
        ->whereIn('id_form', $arrayID )
        ->get();
        $formLog = new FormLog();   
        return view('report.ajaxreportUrl',compact('formInforURL','formLog'));
    }

    /**
     * Change chart data
     *
     * @param Request $request
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function analyticsWithChart( Request $request )
    {
        $id            = $request->form_id;
        $user          = Auth::user();
        $forms         = Form::where('id_company',$user->id_company)->where('form_status',1)->get();
        $label         = $value = [];
        if( $request->form_id > 0){
            $arrayID[] = $request->form_id;
        }else{
            foreach ($forms as $key => $form) {
                $arrayID[] = $form->id_form;
            }
        }
        $url_total_raw = \DB::raw('COUNT(from_url) AS total');
        $form_ids_raw = \DB::raw('DISTINCT(id_form)');
        $formInforChart  = FormLog::getQuery()
        ->select($form_ids_raw, $url_total_raw, 'created_at')
        ->groupBy('id_form', 'created_at')
        ->whereIn('id_form', $arrayID )
        ->get();
        $formLog = new FormLog();   
        foreach ($formInforChart as $key => $form) {
           $label[]    = $form->created_at;
           $value[]    = $form->total;
       }
       $chartLabel = json_encode( $label );
       $chartValue = json_encode( $value );
       return compact('chartLabel','chartValue');
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
}
