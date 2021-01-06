<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RequestDemo;

class RequestDemoController extends Controller
{
    public function index()
    {
    	$demos = RequestDemo::all();
    	return view('RequestDemo.list_request',compact('demos'));
    }
    public function add()
    {
    	return view('RequestDemo.form_request');
    }
    public function create(Request $request)
    {
    	$demo = new RequestDemo();
    	$demo->fill([
    		'first_name' => $request['first_name'],
    		'last_name' => $request['last_name'],
    		'business_email' => $request['business_email'],
    		'phone_number' => $request['phone_number'],
    		'company' => $request['company'],
    		'company_size' => $request['company_size'],
    		'notes' => $request['notes'],
    	])->save();
    	return redirect()->to('request_demo/');
    }
    public function delete(Request $request)
    {
    	RequestDemo::find($request['id'])->delete();
    	return redirect()->back();
    }
}
