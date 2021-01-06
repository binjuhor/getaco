<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\TemplateForm;

use App\Element;

use App\TemplateElement;

use Illuminate\Support\Facades\DB;

use App\ElementItem;

use App\Orbit;

use App\CustomerAttribute;

use Illuminate\Support\Facades\Auth;

use App\Company;

class TemplateFormController extends Controller
{
    protected $formType = [
        'inline'     => 'Inline',
        'popup'      => 'Popup',
        // 'fullscreen' => 'Full Screen',
        'floatbar'   => 'Float Bar',
        'timed'      => 'Timed popup',
        // 'scroll'     => 'Scroll display',
    ];

    protected $effects = [
        'fade' => 'Fade',
        'slideup' => 'Slide up',
        'slideup' => 'Slide Down',
        'roll' => 'Role In',
        'float' => 'Floating',
    ];

    protected $scrolls = [
        'scrolldown' => 'Scroll Down',
        'scrollup' => 'Scroll Up',
    ];

	public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::User();
        $formDemos = TemplateForm::where('id_user','=',$user->id_company)->where('status_template','=',1)->orwhere('status_public','=',1)->get();
    	return view('template.template',compact('formDemos'));
    }
    public function add()
    {
        $formtype = $this->formType;
        $effects  = $this->effects;
        $scrolls  = $this->scrolls;
        $this->trashClear();
        $user = Auth::User();
        $key = 0;
        $attribute  = CustomerAttribute::where('id_company','=',$user->id_company)->where('delete',0)->get()->sortBy('sort_order');
        $company = Company::find($user->id_company);
        $num_field = $company->num_field;
        $form_demos = TemplateForm::where('id_user','=',$user->id_company)->where('status_template','=',1)->orwhere('status_public','=',1)->get();
        $new_template = new TemplateForm();
        $new_template->fill([
            'name_template' => '',
            'form_backend' => '',
            'source' => '',
            'file_html' => '',
            'status_public' => 0,
            'id_user' => $user->id_company,
            'display' => '',
            'image' => '',
            'status_template' => 0,
            'form' => '',
            'id_business'=>0,
        ])->save();
        $business = Orbit::all();
        $id_form = $new_template->id_template;
    	return view('form.build_form',compact('key','attribute','form_demos','num_field','id_form','formtype','effects','scrolls','business'));
    }
    public function create(Request $request)
    {
        $user = Auth::User();
    	$data = $request->all();
        $template = TemplateForm::find($data['id_form']+1);
    	$allow = ['png', 'jpg', 'jpeg', 'gif'];
        $image_name = '';
        if ($request->hasFile('image')) {
            $image = $request->file('image');
            if ($image->getClientSize() < 5000000) {
                    $name = mt_rand(0, 0xffff) . time() . '.' . $image->guessClientExtension();
                    $image->move("images/template_form", $name);
                    $image_name = url()->to('images/template_form/'.$name);
            }
        }
        else{
            $image_name = $template->image;
        }
        
        if(isset($data['id_business'])){
            $id_business = $data['id_business'];
        }
        else{
            $id_business = 0;
        }
        $template->update([
            'id_user' => $user->id_company,
        	'name_template' => $data['name_form'],
        	'image' => $image_name,
            'source' => $data['form_html'],
            'form_backend' => $data['form_backend'],
            'theme' => $data['display'],
            'status_public' => 0,
            'file_html' => 0,
            'status_template'=>1,
            'form' => $data['form'],
            'id_business'=>$id_business,
        ]);
        $company = Company::find($user->id_company);
        $company->update([
            'num_field' => $data['num_field']
        ]);
        $id = $data['id_form'];
        return redirect()->to('app/form/template/');
    }
    public function edit(Request $request)
    {
    $formtype = $this->formType;
      $effects  = $this->effects;
      $scrolls  = $this->scrolls;
      $user = Auth::User();
      $form_demos = TemplateForm::where('id_user','=',$user->id_company)->orwhere('status_public','=',1)->get();
      $form_edit = TemplateForm::find($request['id']);
        // check company
        if($this->checkCompany($form_edit->id_company) == 'false') return redirect('/app');
        //end check
      $settings = json_decode($form_edit->setting);
      $id_form = $request->id;
      $company = Company::find($user->id_company);
      $num_field = $company->num_field;
      $key = 0;
      $form_edit['display'] = $form_edit->theme;
      $form_edit['form_name'] = $form_edit['name_template'];
      $attribute = CustomerAttribute::where('id_company','=',$user->id_company)->get();
      return view('form.build_form',
      compact(
        'key',
        'form_edit',
        'form_demos',
        'attribute',
        'id_form',
        'num_field',
        'formtype',
        'effects',
        'scrolls',
        'settings'
      ));
    }
    public function detail(Request $request)
    {
        $formDemo = TemplateForm::find($request['id']);
          // check company
        if($this->checkCompany($formDemo->id_company) == 'false') return redirect('/app');
        //end check
        $data = $formDemo->source;
        return $data;
    }
    public function delete(Request $request)
    {
        $form = TemplateForm::find($request['id']);
          // check company
        if($this->checkCompany($form->id_company) == 'false') return redirect('/app');
        //end check
        $rel = TemplateElement::where('id_template','=',$request['id'])->get();
        foreach ($rel as $key) {
            $key ->delete();
        }
        TemplateForm::find($request['id'])->delete();
        return "ok";

    }
    public function publicTemplate(Request $request)
    {
        $id = $request['id'];
        $template = TemplateForm::find($id);
        $pub = $template['status_public'];
        if ($pub == 0) {
            $template->update([
                'status_public' => 1
            ]);
        }
        else{
            $template->update([
                'status_public' => 0
            ]);   
        }
        return redirect()->back();
    }
    public function trashClear()
    {
        // clear trash
        $trash = TemplateForm::where('status_template','=',0)->get();
        foreach ($trash as $key) {
            $key->delete();
        }
        // end clear trash
    }
}
