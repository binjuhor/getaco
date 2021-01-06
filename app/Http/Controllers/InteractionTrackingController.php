<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class InteractionTrackingController extends Controller
{
    /**
     * Get form request and save it to redis database.
     *
     * @param Request $request
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function formLog( Request $request )
    {
        $redis    = Redis::connection();
        $status   = 'Invalid form';
        if(isset($request->form_id)){
            $key                = 'form_'.$request->form_id;
            $show               = 0;
            $newShow            = isset($request->show)?$request->show:0;
            $oldData            = json_decode(Redis::get($key));
            if ( $oldData ) {
                $show           = intval($oldData->show) + intval($newShow);
            }else{
                $show           = $newShow;
            }
            $store['form_id']   = isset($request->form_id)?$request->form_id:'';;
            $store['show']      = $show;
            $status             = Redis::set($key, json_encode($store));
        }
        return response()->json("status:".$status);
    }
}
