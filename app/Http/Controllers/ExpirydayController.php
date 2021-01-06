<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Payment;
use Illuminate\Support\Facades\Auth;

class ExpirydayController extends Controller
{
    public function Check()
    {
		if(isset(Auth::User()->id)){
            $id_company = Auth::User()->id_company;
            $date = Payment::where('id_company',$id_company)->get();

            if(Auth::User()->id_role == 0)
                return 1;
            else{
                if(count($date) > 0){
                    foreach ($date as $key => $val) {
                    $expiry = $val->lim;
                    }
                    $today = date("Y-m-d");
                    if ( strtotime($today) < strtotime($expiry) ) {
                        return 1;
                    }
                    else {
                         return 0;
                    }
                }else
                    return 1;
            }
        }
        return 1;
    }
}