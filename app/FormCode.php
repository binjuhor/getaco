<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FormCode extends Model
{
    protected $table = 'form_codes';
    protected  $primaryKey = "id_form_code";
    protected $fillable = [
        'id_form',
        'source',
        'created_at',
        'updated_at',
    ];
}
