<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Partner;
Use App\Company;
Use App\Package;
use App\Package_order;
use App\PackageVariable;
use Illuminate\Support\Facades\Auth;

class PartnerController extends Controller
{
     public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
    	$list = Partner::all();
    	$company = Company::all();
    	$order = Package_order::all();
    	return view('partner.list',compact('list','company','order'));
    }
    public function del($id){
        $del = Partner::findOrFail($id);
        $del->delete();
        return redirect()->action('PartnerController@index');
    }
    
    public function orderDetail(Request $request){
        $id_order = $request->id_order;
        $order = Package_order::findOrFail($id_order);
        foreach ($order as $value) {
            $Package = Package::where('id_package',$order->id_package)->get();
            foreach ($Package as $val) {
                $name = $val->name;
            }
            $lim = PackageVariable::where('id_variable',$order->id_variable)->get();
            foreach ($lim as $val) {
                $limit = $val->name;
            }
            $total = $order->total_pay;
        }
        return response()->json(['package'=> $name,'lim'=> $limit,'total'=>$total]);
    }
}
