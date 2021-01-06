<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Package;
use App\Company;
use App\User;
use App\Package_order;
use App\Payment;
use App\PackageVariable;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function list_order()
    {  
        $limited = PackageVariable::all();
        $package = Package::all();
        $order = Package_order::all();
        $Company = Company::all();
        return view('order.order_list',compact('order','limited','package','Company'));
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function bought()
    {
       $buy = Payment::all();
       $cpn = Company::all();
       $pk = Package::all();
       $sum_pay = 0;
       foreach ($buy as $key => $value) {
          $sum_pay = $sum_pay+$value->total;
       }
       return view('order.order_pay',compact('buy','cpn','pk','sum_pay'));
    }

    public function delete($id)
    {
        $del = Package_order::findOrFail($id);
        $del->delete();
        return redirect()->action('OrderController@list_order');
    }
}
