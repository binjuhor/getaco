<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Form;

use App\Element;

use App\ElementValidate;

use App\Step;

use App\ElementItem;

use Illuminate\Support\Facades\Auth;

class ElementController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function add(Request $request)
    {
    	$form = Form::where('form_status','=',1)->get();
    	$types = ['text','number','texterea','date','datetime','time','email','password','radio','checkbox','select'];
        if (isset($request['id'])) {
            $id = $request['id'];
            $element = Element::find($id);
            if ($element['element_validate'] == 1) {
                $id_element = $element['id_element'];
                $validate = ElementValidate::where('id_element','=',$id_element)->get()->first();
               
                return view('element.form_element',compact('form','types','element','validate','id'));
            }
            return view('element.form_element',compact('form','types','element','id'));
        }
        elseif(isset($request['id_form'])){
            $id_form = $request['id_form'];
            return view('element.form_element',compact('form','types','id_form'));           
        }
        else{
            return view('element.form_element',compact('form','types'));
        }
    	
    }
    public function create(Request $request)
    {
        $data = $request->all();
    	$Element = new Element();
        $user = Auth::User();
        if (isset($data['id_form_demo'])) {
            $id_form = $data['id_form_demo'];
        }
        else{
            if ($user->id_role == 1) {
            $id_form = 0;
            }
            else{
                $id_form = $request['id_form'];
            }
        }
    	$Element->fill([
    		'id_form' => $id_form,
    		'element_type' => $request['element_type'],
    		'element_label' => $request['element_label'],
    		'element_value' => $request['element_value'],
    		'element_required' => $request['element_required'],
    		'element_validate' => $request['element_validate'],
    		'sort_order' => $request['sort_order'],
    		'element_status' => 1,
    	])->save();
    	$id_element = $Element['id_element'];
        if ($request['element_validate'] == 1) {
           
        	$validate = new ElementValidate();
        	$validate->fill([
        		'id_element' => $id_element,
        		'validate_min' => $request['validate_min'],
        		'validate_max' => $request['validate_max'],
        		'validate_integer' => $request['validate_integer'],
        		'validate_numeric' => $request['validate_numeric'],
        		'validate_alpha' => $request['validate_alpha'],
        		'validate_alpha_dash' => $request['validate_alpha_dash'],
        	])->save();
        }
        $step = new Step();
        $step->fill([
            'id_form' => $id_form,
            'id_element' => $id_element,
            'step' => 1,
        ])->save();
    	return redirect()->to("customer/detail?id=$id_form")->with('note','thêm thành công');
    	
    	
    }
    public function view(){
        $elements = element::all();

    }
    public function index()
    {
    	$elements = Element::where('element_status','=',1)->get();
    	return view('element.list_element',compact('elements'));

    }
    public function trash(Request $request)
    {
        $element = Element::find($request['id']);
        $element->update([
            'element_status' => 0
        ]);
        return redirect()->back();
    }
    public function unTrash(Request $request)
    {
        $element = Element::find($request['id']);
        $element->update([
            'element_status' => 1
        ]);
        return redirect()->back();
    }
    public function listTrash(Request $request)
    {
        $elements = Element::where('element_status','=',0)->get();
        return view('element.list_trashElement',compact('elements'));
    }
    public function delete(Request $request)
    {
        Element::find($request['id'])->delete();
        ElementValidate::where('id_element','=',$request['id'])->delete();
        ElementItem::where('id_element','=',$request['id'])->delete();
        Step::where('id_element','=',$request['id'])->delete();
        return redirect()->back();
    }
    public function edit(Request $request)
    {
    // tim form cua element dang edit
        $id = $request['id'];
        $element = Element::find($request['id']);
        $id_form = $element['id_form'];
    //end
        if ($element['element_validate'] == 1 ) {
            $validate = ElementValidate::find($request['id_validate']);
            $validate->update([
                'validate_min' => $request['validate_min'],
                'validate_max' => $request['validate_max'],
                'validate_integer' => $request['validate_integer'],
                'validate_numeric' => $request['validate_numeric'],
                'validate_alpha' => $request['validate_alpha'],
                'validate_alpha_dash' => $request['validate_alpha_dash'],
            ]);
            
            
        }
        else {
                if ($request['element_validate'] == 1) {
                $validate = new ElementValidate();
                $validate->fill([
                'id_element' => $element['id_element'],
                'validate_min' => $request['validate_min'],
                'validate_max' => $request['validate_max'],
                'validate_integer' => $request['validate_integer'],
                'validate_numeric' => $request['validate_numeric'],
                'validate_alpha' => $request['validate_alpha'],
                'validate_alpha_dash' => $request['validate_alpha_dash'],
                ])->save(); 
            }
        }
        $element->update([
            'element_type' => $request['element_type'],
            'element_label' => $request['element_label'],
            'element_value' => $request['element_value'],
            'element_required' => $request['element_required'],
            'element_validate' => $request['element_validate'],
            'sort_order' => $request['sort_order'],
        ]);
       
        return redirect()->to("customer/detail?id=$id_form");
    }
   
}
