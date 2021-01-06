<?php

namespace App\Http\Controllers;

use App\Customer;
use App\DynamicField;
use Illuminate\Http\Request;


class DynamicFieldController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function view(){
        $customers = Customer::all();
        $dynamic_fields = DynamicField::all();
        return view('dynamic_field.add', compact('dynamic_fields','customers'));
    }

    // public function add(Request $request){
    //     $allRequest = $request->all();
    //     $dynamic_fields = new DynamicField();
    //     $dynamic_fields->fill([
    //         'id_customer' => $allRequest['id_customer'],
    //         'key_field' => $allRequest['key_field'],
    //         'value_field' => $allRequest['value_field'],
    //         'dynamic_status' => $allRequest['dynamic_status']=1,
    //         'sort_order' => $allRequest['sort_order'],
    //     ])->save();
    //     return redirect()->back();
    // }

    public function index(){
        $dynamic_fields = DynamicField::where('dynamic_status','=',1)->orderBy('sort_order', 'asc')->paginate(5);
        if (sizeof($dynamic_fields) == 0) {
            return $this->view();
        }
        return view('dynamic_field.list',compact('dynamic_fields'));
    }

    public function edit(Request $request){
        $customers = Customer::all();
        $dynamic_fields = DynamicField::find($request['id']);
        return view('dynamic_field.edit',compact('dynamic_fields','customers'));
    }

    public function update(Request $request){
        $allRequest = $request->all();
        $update = DynamicField::find($allRequest['id_dynamic']);

        $update->update([
            'id_customer' => $allRequest['id_customer'],
            'key_field' => $allRequest['key_field'],
            'value_field' => $allRequest['value_field'],
            'dynamic_status' => $allRequest['dynamic_status'],
            'sort_order' => $allRequest['sort_order'],
        ]);

        return redirect()->action('DynamicFieldController@index');
    }

    public function destroy(Request $request){
        DynamicField::find($request['id'])->delete();
        return redirect()->action('DynamicFieldController@index');
    }

    public function trash(Request $request)
    {
        $id = $request['id'];
        $dynamic_fields = DynamicField::find($id);
        $dynamic_fields->update([
            'dynamic_status' => 0,
        ]);
        return redirect()->back();
    }

    public function trashList()
    {
        $dynamic_fields = DynamicField::where('dynamic_status',0)->get();
        return view('dynamic_status.trash',compact('dynamic_fields'));
    }

    public function untrash(Request $request)
    {
        $id = $request['id'];
        $dynamic_fields = DynamicField::find($id);
        $dynamic_fields->update([
            'dynamic_status' => 1,
        ]);
        return redirect()->back();
    }
}
