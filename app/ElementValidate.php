<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementValidate extends Model
{
    protected $table = 'element_validates';
    protected  $primaryKey = "id_validate";
    protected $fillable = [
        'id_element',
       	'validate_min',
       	'validate_max',
       	'validate_integer',
       	'validate_numeric',
       	'validate_alpha',
       	'validate_alpha_dash',
    ];
}
