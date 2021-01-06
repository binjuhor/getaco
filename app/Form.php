<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    protected $table = "forms";
    protected $primaryKey = "id_form";
    protected $fillable = [
    	"id_company",
    	"form_name",
    	"form_status",
    	"id_template",
    	"source",
    	"form_backend",
        'file_html',
        'display',
        'setting',
        'name_file',
        'form',
        'logs'
    ];

    /**
     * Get form information via ID
     *
     * @param [type] $id_form
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function getInfor( $id_form )
    {
        return Form::find( $id_form );
    }
}
