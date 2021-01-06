<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Segment;
use App\Tag;
use App\ColorTag;
use App\Form;
use App\Customer;
use App\RelCustomerSegment;
use App\CustomerAttribute;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\Auth;

class SegmentController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    //add and edit segment
    public function add(Request $request){
        $user = Auth::user();
        //data attr
        $radio_value = $checkbox_value = $text_value = $data_tag = $data_from = null;
        //attribute_radio
        if(isset($request->attr_fillter_radio)){
            $radio_value = $request->attr_fillter_radio;
        }
        //radio checkbox
        if(isset($request->attr_fillter_checkbox)){
            $checkbox_value = $request->attr_fillter_checkbox;
        }
        //attr text
        if(isset($request->attr_fillter_text)){
            $text_value = $request->attr_fillter_text;
        }
        //tag
        if(isset($request->tag)){
            $data_tag = $request->tag;
        }
        // from
        if(isset($request->customer_from)){
            $data_from = $request->customer_from;
        }


        $data_segment = ['radio'=>$radio_value,'checkbox'=>$checkbox_value,'text'=>$text_value ,'tag'=>$data_tag,'from'=>$data_from];
        $data_segment = json_encode($data_segment);
        $newSeg = new Segment();
        if(isset($request->id_segment)){
            $newSeg = Segment::findOrFail($request->id_segment);
            if($newSeg->id_company != $user->id_company){
                return redirect('/app');
            }
        }
        if(isset($request->segment_type)){
            $newSeg->type = 'custom_segment';
        }else{
            $newSeg->type = 'segment';
        }
        $newSeg->segment_name = $request->save_fillter_name;
        $newSeg->id_company = $user->id_company;
        $newSeg->option = $data_segment;
        $newSeg->save();

        return redirect()->action('SegmentController@index');
    }

    public function index(){
        $user = Auth::user();
        $segments = Segment::where('id_company','=',$user->id_company)->paginate(10);
        $check = new SearchController;
        $count_ctm = Customer::where('customer_status', '=', 1)->where('id_company',$user->id_company)->where('type','customer')->where('delete',0)->pluck('id_customer')->toArray();
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
                $data_fillter = array_merge($data_fillter, $count_custom);
                $data_fillter = array_keys(array_count_values($data_fillter));
            }
            $count_customer[] = count($data_fillter);
        }
        return view('segment.list',compact('segments','count_customer'));
    }
    public function view_add()
    {
        $user = Auth::user();
        $form = Form::where('id_company',$user->id_company)->where('form_status',1)->get();
        $tags = Tag::where('id_company','=',$user->id_company)->where('delete',0)->orwhere('id_company','=',0)->get();
        $attributes = CustomerAttribute::where('id_company', $user->id_company)->where('for',1)->where('delete',0)->get()->sortBy('sort_order');
        return view('segment.add',compact('attributes','tags','form'));
    }
    public function edit(Request $request){
        $user = Auth::user();
        $segments = Segment::find($request['id']);
        $segment_value = json_decode($segments->option);
        $radio = $checkbox = $text = [];
        if(!empty($segment_value->radio)){
            foreach ($segment_value->radio as $key => $value) {
                $radio[] = $key;
            }
        }
        if(!empty($segment_value->checkbox)){
            foreach ($segment_value->checkbox as $key => $value) {
                $checkbox[] = $key;
            }
        }
        if(!empty($segment_value->text)){
            foreach ($segment_value->text as $key => $value) {
                $text[] = $value;
            }
        }
        $form = Form::where('id_company',$user->id_company)->where('form_status',1)->get();
        $tags = Tag::where('id_company','=',$user->id_company)->where('delete',0)->orwhere('id_company','=',0)->get();
        $attr =  array_merge($radio , $checkbox , $text);
        $attribute = CustomerAttribute::where('id_company', $user->id_company)->whereIn('name',$attr)->where('for',1)->where('delete',0)->get()->sortBy('sort_order');
        $attributes = CustomerAttribute::where('id_company', $user->id_company)->where('for',1)->where('delete',0)->get()->sortBy('sort_order');
        return view('segment.edit',compact('segments','attributes','attribute','attr','segment_value','tags','form'));
    }

    public function destroy(Request $request)
    {
        Segment::find($request['id'])->delete();
        return redirect()->action('SegmentController@index');
    }

}
