<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ElementItem extends Model
{
    protected $table = 'element_items';
    protected  $primaryKey = "id_item";
    protected $fillable = [
        'id_element',
        'item_key',
        'item_value',
    ];
}
