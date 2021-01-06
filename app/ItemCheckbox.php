<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ItemCheckbox extends Model
{
    protected $table = 'item_checkboxes';
    protected  $primaryKey = "id_checkbox";
    protected $fillable = [
        'id_customer',
        'field_name',
        'field_value',
    ];
}
