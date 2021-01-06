<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Step extends Model
{
    protected $table = 'steps';
    protected  $primaryKey = "id_step_form";
    protected $fillable = [
        'id_form',
        'id_element',
        'step',
    ];
}
