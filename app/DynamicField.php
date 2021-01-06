<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DynamicField extends Model
{
    protected $table = 'dynamic_fields';
    protected  $primaryKey = "id_dynamic";
    protected $fillable = [
        'id_customer',
        'id_element',
        'value_field',
        'dynamic_status',
        'sort_order',
        'created_at',
        'updated_at',
    ];
}
