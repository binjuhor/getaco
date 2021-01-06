<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Orbit;


class OrbitController extends Controller
{
    public function index()
    {
    	$orbits = Orbit::all();
    	return view('Admin/orbit',compact('orbits'));
    }
    public function create(Request $request)
    {
    	$orbit = new Orbit();
    	$orbit->fill([
    		'orbit' => $request['orbit'],
    	])->save();
    	return back();
    }
    public function update(Request $request)
    {
    	$orbit = Orbit::find($request['id']);
    	$orbit->update([
    		'orbit' => $request['orbit']
    	]);
    	return back();
    }
    public function delete(Request $request)
    {
    	Orbit::find($request['id'])->delete();
    	return back();
    }
}
