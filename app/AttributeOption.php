<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AttributeOption extends Model
{
    protected $table      = 'attribute_options';
    protected $primaryKey = "id_option";
    public    $timestamps = true;
    protected $fillable = [
        'id_attribute',
        'option_name',
        'option_value',
        'sort_order',
        'created_at',
        'updated_at',
    ];
}
