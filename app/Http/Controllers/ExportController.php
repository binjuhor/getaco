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
use Session;
use Excel;
use File;
use App\Import;
use DB;
use App\Http\Controllers\SearchController;
use Illiminate\Http\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Maatwebsite\Excel\Concerns\FromCollection;

class ExportController extends Controller
{
	public function __construct()
    {
        $this->middleware('auth');
    }
    public function CustomerExport(Request $request)
    {
        ini_set('max_execution_time', 0);
        $user = Auth::user();
        $type = $request->customer_type;
        $name = $request->name_fillter;
        $from_date = $request->fillter_from;
        $to_date = $request->fillter_to;
        $status = $request->tag;
        $attr_radio = $request->attr_fillter_radio;
        $attr_checkbox = $request->attr_fillter_checkbox;
        $attr_text = $request->attr_fillter_text;

        $get_data = new SearchController;
        $data_fillter = $get_data->getfillter($user,$type,$name,$from_date,$to_date,$status,$attr_radio,$attr_checkbox,$attr_text);
        if (isset($request->id_segment)) {
            $segment = Segment::findOrFail($request->id_segment);
            if($segment->id_company != $user->id_company){
                return redirect('/app');
            }

            if($segment->type == 'custom_segment'){
                $count_ctm = Customer::where('customer_status', '=', 1)->where('id_company',$user->id_company)->where('type',$type)->where('delete',0)->pluck('id_customer')->toArray();

                $count_seg = RelCustomerSegment::where('id_segment',$segment->id_segment)->pluck('id_customer')->toArray();
                
                $count_custom = array_intersect($count_ctm,$count_seg);

                $data_fillter = array_merge($data_fillter,$count_custom);
                $data_fillter = array_keys(array_count_values($data_fillter));
            }
        }

        $customers = Customer::wherein('id_customer',$data_fillter)->where('id_company', $user->id_company)
        ->where('delete',0)->where('type',$type)->get();

        $attributes = CustomerAttribute::where('status', 1)->where('id_company', '=', $user->id_company)->get();
        foreach ($customers as $key => $customer) {
            $customerdata[$key]=[
                'Name' => $customer->customer_name,
                'Phone' => $customer->customer_phone,
                'Email' => $customer->customer_email,
            ];
            foreach ($attributes as $k => $attribute) {
                $dynamic = ($customer->dynamicValue($attribute->name, $customer->id_customer) != null)?$customer->dynamicValue($attribute->name, $customer->id_customer):"N/a";
                $customerdata[$key][$attribute->label] = $dynamic;
            }
        }
        Excel::create('CustomerExport_'.now(), function ($excel) use ($customerdata) {
            $excel->sheet('Customer', function ($sheet) use ($customerdata) {
                $sheet->fromArray($customerdata);
            });
        })->download('xlsx');
    }

    public function index($type)
    {
        $log = Import::where('id_company',Auth::user()->id_company)->orderBy('id_import', 'desc')->get();
        return view('Export.import',compact('type','log'));
    }
    public function note(Request $request, $id)
    {

        $note = Import::findOrFail($id);
        $note->update(['note' => $request->import_note]);
        return back();
    }

    public function UploadFile(Request $request)
    {
            $extension = $request->file('file')->getClientOriginalExtension();
            $dir = 'uploads/';
            $filename = uniqid() . '_' . time() . '.' . $extension;
            $request->file('file')->move($dir, $filename);
            $abc = basename($request->file('file'));
            return $extension;
    }
 
    public function import(Request $request,$type_customer)
    {
        ini_set('max_execution_time', 0);
        if($request->file('excel_file')){
                $user = Auth::user();
                $path = $request->file('excel_file')->getRealPath();
                $data = Excel::load($path)->get();
                $attributes = CustomerAttribute::where('for', 1)->where('delete', 0)->where('id_company', '=', $user->id_company)->get();
                $key_heading = $data[0]->keys()->toArray();
                foreach ($key_heading as $value) {
                    $heading[$this->remove_unicode($value)] = $value;
                }
                foreach ($attributes as $value) {
                    $attr[$this->remove_unicode($value->label)] = [$value->name,$value->type];
                }
                // check heading trùng với attr
                $check = array_intersect_key($heading,$attr);

                if($data->count()){
                    foreach ($data as $key => $value) {
                        $insert = [
                        'id_form' => 0,
                        'customer_name' => $value->name,
                        'customer_email' => $value->email,
                        'customer_phone' => $value->phone,
                        'from_url' => '',
                        'id_company' => $user->id_company,
                        'sort_order' => 0,
                        'customer_status' => 1,
                        'type' => $type_customer,
                        'dynamic_field' => '',
                        'created_at' => date("Y-m-d H:i:s"),
                        'updated_at' => date("Y-m-d H:i:s"),
                        ];
                        if(!empty($insert)){
                            $id = Customer::insertGetId($insert);
                            $i = 0;
                            foreach ($check as $key => $val) {
                                $emet = $attr[$key][0];
                                $row = $heading[$key];
                                $type = $attr[$key][1];
                                $attr_insert[$i] = [
                                    'id_customer' => $id,
                                    'id_element' => $emet,
                                    'value_field' => ($type == "checkbox")?json_encode(explode(",",$value->$row )):$value->$row,
                                    'created_at' => date("Y-m-d H:i:s"),
                                    'updated_at' => date("Y-m-d H:i:s"),
                                ];
                                if($attr_insert[$i]['value_field'] == null || $attr_insert[$i]['value_field'] == json_encode(explode(",",null )))
                                    unset($attr_insert[$i]);
                                $i++;
                            }
                            if(!empty($attr_insert)){
                                DynamicField::insert($attr_insert);
                            }
                        }
                    }
                }
                $log_import = [
                    'id_company' => $user->id_company,
                    'file_name' => $request->file_name,
                    'created_at' => date("Y-m-d H:i:s"),
                    'updated_at' => date("Y-m-d H:i:s"),
                ];
                $id_log = Import::insertGetId($log_import);
                Session::flash('success', count($data));
                Session::flash('id_log', $id_log);
            return back();
        }
        return back();
    }
    public function CheckFile(Request $request){
        $user = Auth::user();

        $path = $request->file('file')->getRealPath();
        $data = Excel::load($path)->get();

        //format heading excel
        $heading = $data[0]->keys()->toArray();
        $format_heading = $format_attr = array();
        $heading_check = [];
        foreach ($heading as $value) {
            $format_heading[] = $this->remove_unicode($value);
            $heading_check[$this->remove_unicode($value)] = $value;
        }
        //forrmat label attr
        $attr_default = ['name','phone','email'];
        $attributes = CustomerAttribute::where('for', 1)->where('delete', 0)->where('id_company', '=', $user->id_company)->pluck('label')->toArray();
        $attributes = array_merge($attr_default,$attributes);
        foreach ($attributes as $value) {
            $format_attr[] = $this->remove_unicode($value);
        }
        // check attr không phù hợp
        $attr_na = array_diff($format_heading,array_intersect($format_heading,$format_attr));
        $result = [];
        foreach ($attr_na as $key => $value) {
            $result[] = $heading_check[$value];
        }
        // check trường mặc định name , phone , email
        $check_default = array_intersect($format_heading,$attr_default);
        if(count($check_default) < 3){
            return json_encode(['status'=>'err_default']);
        }elseif(count($data) > 500){
            return json_encode(['status'=>'limit']);
        }
        elseif(count($result) > 0){
            $result = json_encode($result);
            return json_encode(['status'=>'err','back_data'=>$result]);
        }
        else{
            return json_encode(['status'=>'ok']);
        }
    }
    public function CreateExample()
    {
        $user = Auth::user();
        $attributes = CustomerAttribute::where('for', 1)->where('delete', 0)->where('id_company', '=', $user->id_company)->get();
            for ($i=0; $i < 10 ; $i++) {
                $customerdata[$i]=[
                    'Name' => 'Beau Acency '.$i,
                    'Phone' => '097 531 9889',
                    'Email' => 'info@beau.vn',
                ];
                foreach ($attributes as $k => $attribute) {
                    if($attribute->type == 'checkbox' || $attribute->type == 'radio'){
                        $option_value = "";
                        foreach ($attribute->options as $key => $value) {
                            $option_value =  $value->option_value.",".$option_value;
                        }
                        $customerdata[$i][$attribute->label."(".$attribute->type.")"] = rtrim($option_value,",");
                    }else{
                        $customerdata[$i][$attribute->label] = "value";
                    }
                    
                }
            }
        Excel::create('Excel_example_'.now(), function ($excel) use ($customerdata) {
            $excel->sheet('Example', function ($sheet) use ($customerdata) {
                $sheet->fromArray($customerdata);
            });
        })->download('xlsx');
    }
    public function DownDoc()
    {
        $fpath="uploads/5b601b67f2844_1533025127.xlsx";
        $fopen = fopen($fpath,"rb");
        header("Content-Type:application/octet-stream");
        header("Content-Length:".filesize($fpath));
        header("Content-Disposition:attachment; filename=".$fpath);
        $fread = fpassthru($fopen);
        fclose($fopen);
        return true;
    }
    function remove_unicode ($str){
        $unicode = array(
            'a'=>'á|à|ả|ã|ạ|ă|ắ|ặ|ằ|ẳ|ẵ|â|ấ|ầ|ẩ|ẫ|ậ',
            'd'=>'đ',
            'e'=>'é|è|ẻ|ẽ|ẹ|ê|ế|ề|ể|ễ|ệ',
            'i'=>'í|ì|ỉ|ĩ|ị',
            'o'=>'ó|ò|ỏ|õ|ọ|ô|ố|ồ|ổ|ỗ|ộ|ơ|ớ|ờ|ở|ỡ|ợ',
            'u'=>'ú|ù|ủ|ũ|ụ|ư|ứ|ừ|ử|ữ|ự',
            'y'=>'ý|ỳ|ỷ|ỹ|ỵ',
            'A'=>'Á|À|Ả|Ã|Ạ|Ă|Ắ|Ặ|Ằ|Ẳ|Ẵ|Â|Ấ|Ầ|Ẩ|Ẫ|Ậ',
            'D'=>'Đ',
            'E'=>'É|È|Ẻ|Ẽ|Ẹ|Ê|Ế|Ề|Ể|Ễ|Ệ',
            'I'=>'Í|Ì|Ỉ|Ĩ|Ị',
            'O'=>'Ó|Ò|Ỏ|Õ|Ọ|Ô|Ố|Ồ|Ổ|Ỗ|Ộ|Ơ|Ớ|Ờ|Ở|Ỡ|Ợ',
            'U'=>'Ú|Ù|Ủ|Ũ|Ụ|Ư|Ứ|Ừ|Ử|Ữ|Ự',
            'Y'=>'Ý|Ỳ|Ỷ|Ỹ|Ỵ',
        );
        
       foreach($unicode as $nonUnicode=>$uni){
            $str = preg_replace("/($uni)/i", $nonUnicode, $str);
       }
       $str = preg_replace('/[^A-Za-z0-9\-]/', '', $str);
       $str = strtolower($str);
        return $str;
    }
}
