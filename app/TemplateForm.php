<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateForm extends Model
{
    protected $table = 'template_forms';
    protected  $primaryKey = "id_template";
    protected $fillable = [
        'name_template',
        'image',
        'source',
        'id_user',
        'form_backend',
        'status_public',
        'file_html',
        'status_template',
        'form',
        'theme',
        'id_business'
    ];
}
