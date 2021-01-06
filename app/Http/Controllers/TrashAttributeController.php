<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TrashAttribute;
use Illuminate\Support\Facades\Auth;

class TrashAttributeController extends Controller
{
    public function delete(Request $request)
    {
    	$user = Auth::User();
    	$trash = new TrashAttribute();
    	$trash->fill([
    		'id_company' => $user->id_company,
    		'id_attribute' => $request->id
    	])->save();
    	return back();

    }
}
