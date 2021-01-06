<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Auth;

class FormLog extends Model
{
    protected $table      = 'form_log';
    protected $primaryKey = "id_form_log";
    protected $fillable   = [
        'id_form',
        'id_customer',
        'from_url',
        'logs',
    ];
    
    /**
     * Get form information.
     *
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function formInformation()
    {
        return $this->hasOne('App\form', 'id_form','id_form');
    }

    /**
     * Get count customer from form ID
     *
     * @param integer $id
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function countCustomer( int $id )
    {
        return  FormLog::where('id_form',$id)->get()->count();
    }

    /**
     * Get count total from URL
     *
     * @param string $fromURL
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function formLogUrlId( string $fromURL )
    {
        $data = [];
        $user          = Auth::user();
        $forms   = Form::where('id_company', $user->id_company)->where('form_status',1)->get();
        foreach ($forms as $key => $form) {
            $arrayID[] = $form->id_form;
        }
        $formInforID = FormLog::where('from_url', $fromURL)
            ->select('id_form')
            ->whereIn('id_form',  $arrayID)
            ->get()
            ->toArray();
        foreach ($formInforID as $key => $value) {
           $data[] = $value['id_form'];
        }
        return array_unique($data);
    }

    /**
     * Total view with URL
     *
     * @param string $fromURL
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function totalShowWithURL( string $fromURL )
    {
        $total   = 0;
        $redis   = Redis::connection();
        $formID  = $this->formLogUrlId( $fromURL );
        foreach ($formID as $key => $formID) {
            if(isset(json_decode($redis->get('form_'.$formID))->show)){
                $total = $total + json_decode($redis->get('form_'.$formID))->show;
            }
        }
        return $total;
    }

    /**
     * Rate convert
     *
     * @param  $view
     * @param  $lead
     * @return string $rate
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function convertRate( $view, $lead )
    {
        if ($view) {
           return round($lead / $view, 2)." %";
        }
        return "N/a";
    }
}
