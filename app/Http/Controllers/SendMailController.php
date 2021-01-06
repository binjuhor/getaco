<?php

namespace App\Http\Controllers;
use App\Mail\SendForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\MailConfig;
use Illuminate\Support\Facades\Auth;

class SendMailController extends Controller
{
	public function index()
    {
        $list_mail = MailConfig::where('id_company',Auth::user()->id_company)->where('mail_type','notyfi')->get();
        if(count($list_mail) > 0){
            return view('setting.list',compact('list_mail'));
        }
        return view('setting.configmail');
    }
    public function MailSubmit($id_company)
    {
        $id_content = MailConfig::where('id_company',$id_company)->where('mail_type','notyfi')->limit(1)->get()->toArray();
        if(count($id_content) > 0){
            $id_content = $id_content[0]['id_content'];
            $data = MailConfig::findOrFail($id_content);
            $emails = explode(",",$data->mail_address);
        	Mail::to($emails)->send(new SendForm($data));
        }
    }
    public function ConfigMail(Request $request)
    {
    	$user = Auth::user();
        if(isset($request->id_content)){
            $mail = MailConfig::findOrFail($request->id_content);
        }else{
            $mail = new MailConfig();
        }
    	$mail->id_company = $user->id_company;
		$mail->mail_address = str_replace(" ", "",$request->mail_address);
		$mail->mail_name = $request->mail_name;
		$mail->mail_subject = $request->mail_subject;
		$mail->mail_content = $request->mail_content;
		$mail->mail_type = $request->mail_type;
		$mail->save();
		return view('setting.mailsuccess');
    }
    public function DellMail($id)
    {
        $mail = MailConfig::findOrFail($id);
        $mail->delete();
        return back();
    }
}
