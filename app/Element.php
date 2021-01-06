<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Element extends Model
{
    protected $table = 'elements';
    protected  $primaryKey = "id_element";
    protected $fillable = [
        'id_form',
        'element_type',
        'element_label',
        'element_value',
        'element_status',
        'created_at',
        'updated_at',
        'sort_order',
        'element_required',
        'element_validate',
    ];
}
