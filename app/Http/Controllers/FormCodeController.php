<?php

namespace App\Http\Controllers;

use App\Form;
use App\Element;
use App\FormCode;
use Illuminate\Http\Request;

class FormCodeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view()
    {
        $form_codes = FormCode::all();
        $forms = Form::all();
        return view('form_code.add', compact('form_codes', 'forms'));
    }

    public function add(Request $request)
    {
        $allRequest = $request->all();
        $newForm_code = new FormCode();
        $newForm_code->fill([
            'id_form' => $allRequest['id_form'],
            'source' => $allRequest['source'],
        ])->save();
        return redirect()->back();
    }

    public function index()
    {
        $form_codes = FormCode::all();
        return view('form_code.list', compact('form_codes'));
    }

    public function edit(Request $request)
    {
        $forms = Form::all();
        $form_codes = FormCode::find($request['id']);
        return view('form_code.edit', compact('form_codes', 'forms'));
    }

    public function update(Request $request)
    {
        $allRequest = $request->all();
        $update = FormCode::find($allRequest['id_form_code']);

        $update->update([
            'id_form' => $allRequest['id_form'],
            'source' => $allRequest['source'],
        ]);
        return redirect()->action('FormCodeController@index');
    }

    public function destroy(Request $request)
    {
        FormCode::find($request['id'])->delete();
        return redirect()->action('FormCodeController@index');
    }

    /**
     *
     */
    public function tesst()
    {

        $element = Element::where('id_form', '=', 1)->get();
        $formcode = '{
            "form" :
           [';
                foreach ($element as $key => $value) {
                    $formcode .='{';
                    if ($value['element_label']) {
                        $formcode .='"element_label":"'.$value['element_label'].'",';
                    }
                    if ($value['element_value']) {
                        $formcode .=' "element_value" : "'.$value['element_value'].'",';
                    }
                    if ($value['id_element']) {
                        $formcode .=' "id_element" : "'.$value['id_element'].'",';
                    }
                    if ($value['element_status']) {
                        $formcode .=' "element_status" : "'.$value['element_status'].'",';
                    }
                    if ($value['sort_order']) {
                        $formcode .=' "sort_order" : "'.$value['sort_order'].'",';
                    }
                    if ($value['element_required']) {
                        $formcode .=' "element_required" : "'.$value['element_required'].'",';
                    }
                    if ($value['element_validate']) {
                        $formcode .=' "element_validate" : "'.$value['element_validate'].'",';
                    }
                    if ($value['step']) {
                        $formcode .=' "step" : 1 .';
                    }
                }
            $formcode .=']
        }';
        $form_code = new FormCode();
        $form_code ->fill([
            'id_form'=> 1,
            'source' => $formcode
        ])->save();
    }

}