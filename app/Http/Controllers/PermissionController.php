<?php

namespace App\Http\Controllers;

use App\User;

use App\Company;

use App\Comment;

use App\Permission;

use App\Permission_group;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

class PermissionController extends Controller
{
/**
 * Display a listing of the resource.
 *
 * @return \Illuminate\Http\Response
 */
public function __construct()
{
    $this->middleware('auth');
}

public function index()
{
        // check company
        $group = Permission_group::all();
        $company = Auth::User()->id_company;
        $role = Permission::where('id_company',$company)->get();
        $user = User::where('id_company', '=', $company)->Where('id_role','>',1)->orderBy('id','desc')->get();
        return view('permission.permission',compact('user','role','group')); 
}

public function add(){
    return view('permission.add_user');
}

public function do_add(Request $request)
{   
    $company = Auth::User()->id_company;
    $add= new User();
    $tb = "";
    $check = User::where('email',$request->email)->orwhere('phone',$request->phone)->get();
    if(count($check) == 0){
        $add->name=$request->name;
        $add->email=$request->email;
        $add->phone=$request->phone;
        $add->password=bcrypt($request->password);
        $add->id_role=$request->role;
        $add->user_status=0;
        $add->id_group=0;
        $add->id_company=$company;
        $add->verified = 1;
        $add->save();
        return redirect()->to('app/user/list');
    }else{
        $tb = "Email or phone does exsit !";
        return view('permission.add_user',compact('tb'));
    }

}

// List user of this company
public function list(){
    $company = Auth::User()->id_company;
    $role = Auth::User()->id_role;
    $user = User::where('id_company', '=', $company)->Where('id_role','>',1)->Where('id_role','!=',10)->orderBy('id','desc')->get();
    return view('permission.list_user', compact('user','role'));
}

public function uprole(Request $request)
{
    $id_company = Auth::User()->id_company;
    $permission = Permission::where('id_company',$id_company)->get();
    foreach ($permission as $key) {

        $up = Permission::findOrFail($key['id']);

        for ($i=4; $i >=2 ; $i--) { 
            $role = $key['id'].'role'.$i;
            if( isset($_POST[$role]))
                $up->update(['role'.$i => 1]);
            else
                $up->update(['role'.$i => 0]);
        }
    }
    return redirect()->action('PermissionController@index');

}

public function delete($id)
{
    $arr=User::findOrFail($id);
    $arr->delete();
    return redirect()->action('PermissionController@list');
}

public function edit($id)
{
    $arr=User::where('id',$id)->get();
    return view('permission.edit_user',compact('arr'));
}

public function do_edit(Request $request, $id)
{
    $company = Auth::User()->id_company;
    $add=User::findOrFail($id);
    $check = User::where('email',$request->email)->orwhere('phone',$request->phone)->pluck('id')->toArray();
    $check = array_diff( $check, [$add->id] );

    if(count($check) == 0){
        $add->name=$request->name;
        $add->email=$request->email;
        $add->phone=$request->phone;
        if($request->password != ""){
            $add->password=bcrypt($request->password);
        }
        $add->id_role=$request->role;
        $add->user_status=0;
        $add->id_group=0;
        $add->id_company=$company;
        $add->save();
        return redirect()->to('app/user/list');
    }else{
        $tb = "Email or phone does exsit !";
        $arr=User::where('id',$id)->get();
        return view('permission.edit_user',compact('arr','tb'));
    }
}
public function history()
{
    $company = Auth::User()->id_company;
    $user = User::where('id_company',$company)->Where('id_role','>',1)->Where('id_role','!=',10)->get();
    $comment = $add_tag = $become = array();
    foreach ($user as $value) {
        $comment[] = Comment::where('idUser',$value->id)->where('type',0)->count();
        $add_tag[] = Comment::where('idUser',$value->id)->where('type',1)->count();
        $become[] = Comment::where('idUser',$value->id)->where('type',3)->count();
    }
    return view('permission.history', compact('user','comment','add_tag','become'));
}
}
