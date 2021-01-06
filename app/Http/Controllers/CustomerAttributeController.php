<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\CustomerAttribute;
use App\DynamicField;
use App\AttributeOption;
use App\TrashAttribute;
use App\Customer;
use Illuminate\Support\Facades\Auth;

class CustomerAttributeController extends Controller
{
    protected $redirectUrl    = 'app/customer/attribute';

    protected $redirecAddtUrl = 'app/customer/attribute/add';

    protected $attributeType  = [
        'text'     => 'Text',
        'textarea' => 'Textarea',
        'select'   => 'Select',
        'radio'    => 'Radio',
        'checkbox' => 'Check box',
        'date'     => 'Date',
        'email'    => 'Email',
        'number'   => 'Number',
        'password' => 'Password'
    ];

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * View list attribute of a company.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function index()
    {
        $user = Auth::user();
        $attributeType = $this->attributeType;
        $attributes = CustomerAttribute::where('id_company','=', Auth::user()->id_company)->where('delete',0)->get()->sortBy('sort_order');
        return view('attribute.index', compact('attributes','attributeType'));
    }

    /**
     * Add new attribute to customer.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function add( Request $request )
    {
        $attributeType = $this->attributeType;
        if (!isset($request->name)) return view('attribute.form', compact('attributeType'));
        $attribute = new CustomerAttribute();
        $this->save( $attribute, $request );
        return redirect($this->redirectUrl);
    }

    /**
     * Edit a customer attribute.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function edit( Request $request )
    {
        $attributeType = $this->attributeType;
        if (!isset($request->id)) return redirect($this->redirectUrl);
        $attribute = CustomerAttribute::find($request->id);
          // check company
            $checkCompany = $this->checkCompany($attribute->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //
        return view('attribute.edit', compact('attribute', 'attributeType'));
    }

    /**
     * Update attribute.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function update( Request $request )
    {
        if (isset($request->id)){
            $attribute = CustomerAttribute::find($request->id);
            // check company
            $checkCompany = $this->checkCompany($attribute->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //
            $this->save( $attribute, $request, true );
        }
        return redirect($this->redirectUrl);
    }

    /**
     * Save attribute data.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function save( $attribute, $request, $update = false )
    {
        if (!isset($request->name)) return false;
        $attribute['label'] = $request->name;
        if ( $update === false ) {
            $attribute['name'] =  uniqid('a'.Auth::user()->id.Auth::user()->id_company.'_');
        }
        $attribute['type'] =  $request->attribute_type?$request->attribute_type:'text';
        $attribute['id_company'] = Auth::user()->id_company;
        $attribute['status'] = isset($request->status)?$request->status:0;
        $attribute['orbit'] = isset($request->orbit)?$request->orbit:0;
        $attribute['for'] = $request->attribute_for;
        $attribute->save();
        return $this->addOption( $attribute, $request );
    }
    
    /**
     * Active on customer page.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function active( Request $request )
    {
        if( isset( $request->id ) || isset( $request->status ) ){
            $attribute = CustomerAttribute::find($request->id);

            $attribute['status'] = intval( $request->status );
            $attribute->save();
        }
        return redirect( $this->redirectUrl );
    }
    public function update_status( Request $request )
    {
        $id_attr = $request->id_attr;
        $stt_attr = $request->stt_attr;
        $up_active = CustomerAttribute::find($id_attr);
        // check company
            $checkCompany = $this->checkCompany($up_active->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //
        if ($stt_attr == "enable") {
            $up_active->status = 1;
            $up_active->save();
        }else{
            $up_active->status = 0;
            $up_active->save();
        }
        return "ok";
    }

    public function add_attr_fillter( Request $request ){
        $attribute = CustomerAttribute::findOrFail($request->id_attr);
        // check company
            $checkCompany = $this->checkCompany($attribute->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //

        if ($attribute->type == "radio" || $attribute->type == "select") {
            $option_attr = "";
                foreach ($attribute->options as $key => $value) {
                    if($value->option_value != 'getaco_default')
                        if($value->option_value != 'getaco_default')
                        $option_attr = $option_attr."
                            <input style='width: 100%;' type='checkbox' name='attr_fillter_radio[$attribute->name][]' id='radio_fillter".md5($key.$value->option_name)."' class='form-control' value='$value->option_value'>
                            <label class='attr_fillter' for='radio_fillter".md5($key.$value->option_name)."'>$value->option_name</label>
                        ";
                    
                }
                $html = "
                    <div class='row adv$attribute->name'>
                        <label for='name' class='text-left col-md-3 control-label'>$attribute->label</label>
                        <div class='col-md-9 text-left'>
                            ".$option_attr."
                        </div>
                    </div>
                ";
        }elseif ($attribute->type == "checkbox") {
            $option_attr = "";
                foreach ($attribute->options as $key => $value) {
                    $option_attr = $option_attr."
                        <input style='width: 100%;' type='checkbox' name='attr_fillter_checkbox[$attribute->name][]' id='checkbox_fillter".md5($key.$value->option_name)."' class='form-control' value='$value->option_value'>
                        <label class='attr_fillter' for='checkbox_fillter".md5($key.$value->option_name)."'>$value->option_name</label>
                    ";
                }
                $html = "
                    <div class='row adv$attribute->name'>
                        <label for='name' class='text-left col-md-3 control-label'>$attribute->label</label>
                        <div class='col-md-9 text-left'>
                            ".$option_attr."
                        </div>
                    </div>
                ";
        }
        else{
            $html = "
                    <div class='row adv$attribute->name' >
                        <label for='name' class='text-left col-md-3 control-label'>$attribute->label</label>
                        <div class='col-md-9 text-left'>
                            <input type='checkbox' id='attr_fillter$attribute->name' name='attr_fillter_text[]' value='$attribute->name'>
                            <label class='attr_fillter' for='attr_fillter$attribute->name'></label>
                        </div>
                    </div>
                    ";
        }
       
        return $html;
    }

    public function selected(Request $request)
    {
        $id_attr = $request->id_attr;
        $stt_attr = $request->stt_attr;
        $attribute = CustomerAttribute::findOrFail($id_attr);
        // check company
            $checkCompany = $this->checkCompany($attribute->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //
        if (isset($request->id_customer)) {
            $customer = Customer::find($request->id_customer);
            $value = $customer->dynamicValue($attribute->name, $customer->id_customer);
        }
        else{
            $value='';
        }
        $html_input = "";
        if ($stt_attr == "select_attr") {
            $attribute[$request->column] = 1;
            
            $col = isset($request->add)?2:3;
            $col2 = 12 - $col;
            switch ($attribute->type) {
                case 'textarea':
                    $html_input = "
                    <div class='field'>
                        <div class='form-group row' id='$attribute->name'>
                            <label for='name' class='col-md-".$col."' control-label'>$attribute->label</label>
                            <div class='col-md-".$col2."'>
                                <textarea class='form-control' name='customer_attr[$attribute->name]' value='".$value."'></textarea>
                            </div>
                        </div>
                        </div>
                    ";
                    break;
                case 'select':
                    $input_option="";
                    foreach ( $attribute->options as $key => $option ){
                        $selected = $option->option_value!=$value?'':'selected';
                        $disabled = $option->option_value=='getaco_default'?'disabled':'';
                         $input_option = $input_option."<option value='$option->option_value'' ".$selected." ".$disabled.">$option->option_name</option>";
                    }
                    $html_input = "
                    <div class='field'>
                        <div class='form-group row' id='$attribute->name'>
                            <label for='select_".md5($attribute->label)."' class='col-md-".$col." control-label'>$attribute->label</label>
                            <div class='col-md-".$col2."'>
                                <select id='select_".md5($attribute->label)."'  class='form-control' name='customer_attr[$attribute->name]'>
                                    ".$input_option."
                                </select>
                            </div>
                        </div>
                    </div>
                    ";
                break;

                case 'radio':
                    $input_option="";
                    foreach ( $attribute->options as $key => $option ){
                        $checked = $option->option_value!=$value?'':'checked';
                         $input_option = $input_option."<input id='radio_".md5($key.$option->option_name)."'
                                name='customer_attr[$attribute->name]'
                                type='$attribute->type'
                                value='$option->option_value' ".$checked.">
                                <label for='radio_".md5($key.$option->option_name)."'>$option->option_name</label>";
                    }
                    $html_input = "
                    <div class='field'>
                        <div class='form-group row' id='$attribute->name'>
                            <label for='select_".md5($attribute->label)."' class='col-md-".$col." control-label'>$attribute->label</label>
                            <div class='col-md-".$col2."'>
                                    ".$input_option."
                            </div>
                        </div>
                        </div>
                    ";
                break;

                case 'checkbox':
                    $input_option="";
                    foreach ( $attribute->options as $key => $option ){
                        $checked = $option->option_value!=$value?'':'checked';
                         $input_option = $input_option."<input id='checkbox_".md5($key.$option->option_name)."'
                                name='customer_attr[$attribute->name]'
                                type='$attribute->type'
                                value='$option->option_value' ".$checked.">
                                <label for='checkbox_".md5($key.$option->option_name)."'>$option->option_name</label>";
                    }
                    $html_input = "
                    <div class='field'>
                        <div class='form-group row' id='$attribute->name'>
                            <label for='select_".md5($attribute->label)."' class='col-md-".$col." control-label'>$attribute->label</label>
                            <div class='col-md-".$col2."'>
                                    ".$input_option."
                            </div>
                        </div>
                        </div>
                    ";
                break;
                default:
                    $html_input = "
                    <div class='field'>
                        <div class='form-group row' id='$attribute->name'>
                            <label class='col-md-".$col." control-label'>$attribute->label</label>
                            <div class='col-md-".$col2."'>
                                <input type='$attribute->type' class='form-control'
                                placeholder='$attribute->label'
                                name='customer_attr[$attribute->name]' value='".$value."'>
                            </div>
                        </div>
                        </div>
                    ";
                break;
            }
            
        }else{
            $attribute[$request->column] = 0;
        }
        $attribute->save();
        $data = ['status_attr' => $stt_attr , 'input_id' => $attribute->name , 'html_input' => $html_input];
        return json_encode($data);
    }

    /**
     * Add option to attribute.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0 
     */
    public function addOption( $attribute, $request )
    {
        $options = [];
        if (!isset($request->option_name)) return false;
        AttributeOption::where('id_attribute', $attribute->id_attribute)->delete();

        foreach ($request->option_name as $key => $option_name) {
            $options[$key]['id_attribute'] = $attribute->id_attribute;
            $options[$key]['option_name'] = $option_name;
            $value = empty($request->option_value[$key])?$option_name:$request->option_value[$key];
            $options[$key]['option_value'] = $value;
        }
        return AttributeOption::insert($options);
    }

    /**
     * Delete an attribute.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function delete( Request $request )
    {
        $attribute = CustomerAttribute::find( $request->id );
        // check company
            $checkCompany = $this->checkCompany($attribute->id_company);
            if ($checkCompany == 'false') {
                return redirect('/app');
            }
            //
        $attribute->delete = 1;
        $attribute->save();
        // if(!empty($attribute)){
        //     AttributeOption::where('id_attribute', $attribute->id_attribute)->delete();
        //     DynamicField::where('id_element', $attribute->name)->delete();
        //     $attribute->delete();
        // }
        return redirect( $this->redirectUrl );
    }
    public function sort(Request $request)
    {
        $data = $request->data;
        for ($i=1; $i < count($data)+1 ; $i++) { 
            $attr = CustomerAttribute::find($data[$i]);
            $attr->update(['sort_order'=>$i]);
        }
        return;
    }
}
