<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TemplateElement extends Model
{
    protected $table = 'template_elements';
    protected  $primaryKey = "id_rel_template_element";
    protected $fillable = [
        'id_template',
        'id_element',
    ];
}
