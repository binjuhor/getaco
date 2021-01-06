<?php

namespace App\Http\Controllers;

use App\Log;

use Illuminate\Http\Request;

class LogController extends Controller
{
    // public function view(){
    //     $logs = Log::all();
    //     return view('log.add', compact('logs'));
    // }

    public function add(Request $request){
       
    }

    public function index(){
        $logs= Log::where('log_status','=',1)->orderBy('sort_order', 'asc')->paginate(5);
        if (sizeof($logs) == 0) {
            return $this->view();
        }
        return view('log.list',compact('logs'));
    }

    public function destroy(Request $request){
        Log::find($request['id'])->delete();
        return redirect()->action('LogController@index');
    }
}
