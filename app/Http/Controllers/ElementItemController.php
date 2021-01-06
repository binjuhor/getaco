<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\ElementItem;

class ElementItemController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
	public function index(Request $request)
	{
		$id = $request['id'];
		$items = ElementItem::where('id_element','=',$id)->get();
		return view('ElementItem.list_item',compact('id','items'));
	}
    public function create(Request $request){
    	$new = new ElementItem();
    	$id = $request['id'];
    	$new->fill([
    		'id_element' => $request['id'],
    		'item_key' => $request['value'],
    		'item_value' => $request['value'],
    	])->save();
    	return redirect()->back();
    	
    }
    public function delete(Request $request)
    {
    	ElementItem::find($request['id'])->delete();
        
    	return redirect()->back();
    }
    public function add(Request $request)
    {
    	if (isset($request['id_item'])) {
    		$id = $request['id_item'];
    		$id_element = $request['id_element'];
    		$item = ElementItem::find($request['id_item']);
    		return view('ElementItem.item',compact('item','id','id_element'));
    	}
    	else{
    		$id = $request['id'];
    		return view('ElementItem.item',compact('id'));
    	}
    	
    }
    public function edit(Request $request)
    {
    	$item = ElementItem::find($request['id']);
    	$id_element =$request['id_element'];
    	$item->update([
    		'item_key' => $request['key'],
    		'item_value' => $request['value'],
    	]);
    	return redirect()->to("item?id=$id_element");
    }

}
