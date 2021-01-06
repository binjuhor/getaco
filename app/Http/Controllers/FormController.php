<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Form;
use App\Company;
use App\Element;
use App\Step;
use App\TemplateForm;
use App\TemplateElement;
use App\User;
use App\Orbit;
use App\CustomerAttribute;
use App\AttributeOption;
use App\TrashAttribute;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Redis;


class FormController extends Controller
{

  protected $formType = [
    'inline'     => 'Inline',
    'popup'      => 'Popup',
    'fullscreen' => 'Full Screen take over',
    'floatbar'   => 'Float Bar',
    'timed'      => 'Timed popup',
    'scroll'     => 'Scroll display',
  ];

  protected $effects = [
    "in"=>[
      "Attention Seekers"=>[
        "bounce" => "bounce",
        "flash" => "flash",
        "pulse" => "pulse",
        "rubberBand" => "rubberBand",
        "shake" => "shake",
        "swing" => "swing",
        "tada" => "tada",
        "wobble" => "wobble",
        "jello" => "jello",
      ],
      "Bouncing Entrances"=>[
        "bounceIn" => "bounceIn",
        "bounceInDown" => "bounceInDown",
        "bounceInLeft" => "bounceInLeft",
        "bounceInRight" => "bounceInRight",
        "bounceInUp" => "bounceInUp",
      ],
      "Fading Entrances"=>[
        "fadeIn" => "fadeIn",
        "fadeInDown" => "fadeInDown",
        "fadeInDownBig" => "fadeInDownBig",
        "fadeInLeft" => "fadeInLeft",
        "fadeInLeftBig" => "fadeInLeftBig",
        "fadeInRight" => "fadeInRight",
        "fadeInRightBig" => "fadeInRightBig",
        "fadeInUp" => "fadeInUp",
        "fadeInUpBig" => "fadeInUpBig",
      ],
      "Flippers"=>[
        "flipInX" => "flipInX",
        "flipInY" => "flipInY",
      ],
      "Lightspeed"=>[
        "lightSpeedIn" => "lightSpeedIn",
      ],
      "Rotating Entrances"=>[
        "rotateIn" => "rotateIn",
        "rotateInDownLeft" => "rotateInDownLeft",
        "rotateInDownRight" => "rotateInDownRight",
        "rotateInUpLeft" => "rotateInUpLeft",
        "rotateInUpRight" => "rotateInUpRight",
      ],
      "Sliding Entrances"=>[
        "slideInUp" => "slideInUp",
        "slideInDown" => "slideInDown",
        "slideInLeft" => "slideInLeft",
        "slideInRight" => "slideInRight",
      ],
      "Zoom Entrances"=>[
        "zoomIn" => "zoomIn",
        "zoomInDown" => "zoomInDown",
        "zoomInLeft" => "zoomInLeft",
        "zoomInRight" => "zoomInRight",
        "zoomInUp" => "zoomInUp",
      ],
      "Specials"=>[
        "rollIn" => "rollIn"
      ]
    ],
    "exit" =>[
      "Attention Seekers" =>[
        "bounce" => "bounce",
        "flash" => "flash",
        "pulse" => "pulse",
        "rubberBand" => "rubberBand",
        "shake" => "shake",
        "swing" => "swing",
        "tada" => "tada",
        "wobble" => "wobble",
        "jello" => "jello",
      ],
      "Bouncing Exits" =>[
        "bounceOut" => "bounceOut",
        "bounceOutDown" => "bounceOutDown",
        "bounceOutLeft" => "bounceOutLeft",
        "bounceOutRight" => "bounceOutRight",
        "bounceOutUp" => "bounceOutUp",
      ],
      "Fading Exits" =>[
        "fadeOut" => "fadeOut",
        "fadeOutDown" => "fadeOutDown",
        "fadeOutDownBig" => "fadeOutDownBig",
        "fadeOutLeft" => "fadeOutLeft",
        "fadeOutLeftBig" => "fadeOutLeftBig",
        "fadeOutRight" => "fadeOutRight",
        "fadeOutRightBig" => "fadeOutRightBig",
        "fadeOutUp" => "fadeOutUp",
        "fadeOutUpBig" => "fadeOutUpBig",
      ],
      "Flippers" =>[
        "flipOutX" => "flipOutX",
        "flipOutY" => "flipOutY",
      ],
      "Lightspeed" =>[
        "lightSpeedOut" => "lightSpeedOut",
      ],
      "Rotating Exits" =>[
        "rotateOut" => "rotateOut",
        "rotateOutDownLeft" => "rotateOutDownLeft",
        "rotateOutDownRight" => "rotateOutDownRight",
        "rotateOutUpLeft" => "rotateOutUpLeft",
        "rotateOutUpRight" => "rotateOutUpRight",
      ],
      "Sliding Exits" =>[
        "slideOutUp" => "slideOutUp",
        "slideOutDown" => "slideOutDown",
        "slideOutLeft" => "slideOutLeft",
        "slideOutRight" => "slideOutRight",
      ],
      "Zoom Exits" =>[
        "zoomOut" => "zoomOut",
        "zoomOutDown" => "zoomOutDown",
        "zoomOutLeft" => "zoomOutLeft",
        "zoomOutRight" => "zoomOutRight",
        "zoomOutUp" => "zoomOutUp",
      ],
      "Specials" =>[
        "rollOut" => "rollOut",
      ]
    ]
    
  ];

  protected $scrolls = [
    'down' => 'Scroll Down',
    'up'   => 'Scroll Up',
  ];


  /**
     * Return Form builder 
     * @author kakarevert - kakarevert@gmail.com
     * @version 1.0.0
     */
  public function __construct()
  {
    $this->middleware('auth');
  }
    /**
     * list form of company.
     * 
     * @author kakarevert - kakarevert@gmail.com 
     * @version 1.0.0
     */
    public function index(Request $id)
    {
      $user  = Auth::user();
      $forms = Form::where('id_company', $user->id_company)->where('form_status',1)->paginate(10);
      $redis = Redis::connection();
      if (isset($id)) {
        $show_id = $id->id;
      }
      else{
        $show_id = '0';
      }
      return view('form.list_form',compact('forms','redis','show_id'));
    }
  /**
     * update  form.
     * 
     * @author kakarevert - kakarevert@gmail.com 
     * @version 1.0.0
     */
  public function create(Request $request)
  {
    $data = $request->all();
    // check starlake
    $formstarlake  = [47,48,49,54,55,63,73,75,76,78,80,81,82,84,375];
    $starlake = in_array ( $request->id,$formstarlake );
    if ($starlake === true) {
      return $this->starlake($request);
    }
    // end
    $user = Auth::user();
    $form = Form::find($request->id_form);

    $name_file = mt_rand(0, 0xffff) . time() . '.html';
    if (!empty($form->name_file)) {
      Storage::delete('FormHTML/'.$form->name_file);
    }
    $url = 'FormHTML/'.$name_file;
    Storage::put($url, $data['form_html']);
    $this->addAttribute( $request->attribute );
    $form->update([
      "id_company"   => $user->id_company,
      "id_template"  => 0,
      "source"       => $data['form_html'],
      "form_name"    => $data['name_form'],
      "form_backend" => $data['form_backend'],
      "form_status"  => 1,
      "id_template"  => $data['id_form_demo'],
      'display'      => $data['display'],
      'setting'      => json_encode($data['setting']),
      'name_file'    => $name_file,
      'form'         => $data['form']
    ]);
    $company = Company::find($user->id_company);
    $company->update([
      'num_field' => $data['num_field']
    ]);
      // save file html
    //
    
    //
    $id = $form->id_form;

    return redirect("app/form?id=$id");
  }

  public function starlake($data)
  {
    $form = Form::find($data->id);
    $name_file = mt_rand(0, 0xffff) . time() . '.html';
    if (!empty($form->name_file)) {
      Storage::delete('FormHTML/'.$form->name_file);
    }
    $url = 'FormHTML/'.$name_file;
    Storage::put($url, $data['form_html']);
     $form->update([
      "form_name"    => $data['name_form'],
      'name_file'    => $name_file,
      'form'         => $data['form_html']
    ]);
     $id=$data->id;
     return redirect()->action('FormController@index');
  }

    /**
     * Create Attribute 
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function addAttribute( $json )
    {

      $attributes = json_decode( $json );
      if (is_array($attributes)) {
        foreach ($attributes as $key => $attribute) {
          $attr               = new CustomerAttribute();
          $attr['label']      = $attribute->label;
          $attr['name']       = $attribute->name;
          $attr['type']       = $attribute->type;
          $attr['id_company'] = Auth::user()->id_company;
          $attr['status']     = 0;
          $attr['orbit'] = 0;
          $attr->save();
          if ( isset($attribute->values) && count( $attribute->values )) {
            $this->addAttributeOption( $attr, $attribute->values );
          }
        }
      }
      return true;
    }

    /**
     * Add attribute options
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function addAttributeOption( $attribute, $options )
    {
      $opts = [];
      AttributeOption::where('id_attribute', $attribute->id_attribute)->delete();
      foreach ($options as $key => $option) {
        $opts[$key]['id_attribute'] = $attribute->id_attribute;
        $opts[$key]['option_name']  = $option;
        $opts[$key]['option_value'] = $option;
      }
      return AttributeOption::insert($opts);
    }


    /**
     * detail form
     * 
     * @author kakarevert - kakarevert@gmail.com 
     * @version 1.0.0
     */
    public function detail(Request $request)
    {
      $form = Form::find($request['id']);
        // check company
        if($this->checkCompany($form->id_company) == 'false') return redirect('/app');
        //end check
      $settings = json_decode($form->setting);
      return $form->source;
      // return view('form.detail_form',compact('form','settings'));
    }
     /**
     * page form edit form
     * 
     * @author kakarevert - kakarevert@gmail.com 
     * @version 1.0.0
     */
     public function edit(Request $request)
     {
      $formtype = $this->formType;
      $effects  = $this->effects;
      $scrolls  = $this->scrolls;
      $user = Auth::User();
      $form_demos = TemplateForm::where('id_user','=',$user->id)->orwhere('status_public','=',1)->get();
      $form_edit = Form::find($request->id);
        // check company
        if($this->checkCompany($form_edit->id_company) == 'false') return redirect('/app');
        //end check
      $settings = json_decode($form_edit->setting);
      $id_form = $request->id;
      $company = Company::find($user->id_company);
      $num_field = $company->num_field;
      $attribute  = CustomerAttribute::where('id_company','=',$user->id_company)->where('delete',0)->get();
      return view('form.build_form',
        compact(
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
    
    // delete form
    public function delete(Request $request)
    {
      $id = $request['id'];
      $form = Form::find($id);
        // check company
        if($this->checkCompany($form->id_company) == 'false') return redirect('/app');
        //end check
      if ($form->name_file != null && file_exists(storage_path().'/app/FormHTML/'.$form->name_file)) {
        Storage::delete('FormHTML/'.$form->name_file);
      }
      $form->delete();

      return $id;


    }
  // step form
    public function step(Request $request)
    {
      $id = $request['id'];
      $customer = ['Customer Name','Customer Phone','Customer Email','Company','Sort Order'];
      $steps = Step::where('id_form','=',$id)->get();
      $Element = Element::where('id_form','=',$request['id'])->get();
      return view('form.step1_form',compact('customer','Element','id','steps'));
    }
    
    public function stepAdd(Request $request)
    {
      $data = $request->all();
      $data2 = array(
        'id_form' => "",
        '_token' =>"",
      );
      $data3 = array_diff_key($data, $data2);
      $steps = Step::where('id_form','=',$request['id_form'])->get();
      foreach ($data3 as $key => $value) {
        foreach ($steps as $step) {
          if ($value != null) {
            if ($step['id_element'] == $key) {
              $step->update([
                'step' => $value
              ]);
            }
          }
        }
      }
      return redirect()->to('app/form/');


      $form = new Form();
      $form->fill([
        'id_company' => $request['id_company'],
        'form_name' => $request['form_name'],
        'form_status' => 1,
      ])->save();
      return redirect()->to('app/form/')->with('note', 'thêm thành công');
    }

     /**
     * build form
     * 
     * @author kakarevert - kakarevert@gmail.com 
     * @version 1.0.0
     */
     public function buildForm()
     {
      $formtype = $this->formType;
      $effects  = $this->effects;
      $scrolls  = $this->scrolls;
      $user       = Auth::User();
      $form_demos = TemplateForm::where('id_user','=',$user->id_company)->where('status_template','=',1)->orwhere('status_public','=',1)->get();
      $attribute  = CustomerAttribute::where('id_company','=',$user->id_company)->where('delete',0)->get()->sortBy('sort_order');
      $newForm    = new Form();
      $newForm->fill([
        'id_company'   => $user->id_company,
        'id_template'  => 0,
        'source'       => '',
        'form_backend' => '',
        'display'      => '',
        'name_file'    => '',
        'setting'      => '',
        'form_name'    => '',
        'form_status'  => 0,
        'form'         => '',
      ])->save();
      $id_form = $newForm->id_form;
      $company   = Company::find($user->id_company);
      $num_field = $company->num_field;
      return view('form.build_form',compact('form_demos','attribute','id_company','id_form','num_field','formtype','effects','scrolls','attributes_public'));

    }
    public function clearTrash()
    {
      $trash = Form::where('form_status','=',0)->orwhere('id_template','=',0)->get();
      foreach($trash as $t){
        $t->delete();
      }
      return $this->index();
    }
    public function copy(Request $request)
    {
      $id = $request['id'];
      $form = Form::find($id);
        // check company
        if($this->checkCompany($form->id_company) == 'false') return redirect('/app');
        //end check
      $name = $form['form_name'].'(2)';

      $name_file = mt_rand(0, 0xffff) . time() . '.html';
      $url = 'FormHTML/'.$name_file;
      Storage::put($url, $form['form']);

      $newForm = new Form();

      $newForm->fill([
        'id_company'   => $form['id_company'],
        'id_template'  => $form['id_template'],
        'source'       => $form['source'],
        'form_backend' => $form['form_backend'],
        'display'      => $form['display'],
        'name_file'    => $name_file,
        'setting'      => $form['setting'],
        'form_name'    => $name,
        'form_status'  => 1,
        'form'         => $form['form'],
      ])->save();
      return redirect()->back();
    }
  }
