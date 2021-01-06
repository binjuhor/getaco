<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ColorTag extends Model
{
    protected $table = 'color_tags';
    protected $primaryKey = "id_color";
    protected $filltable = [
        'color_name',
        'created_at',
        'updated_at',
        'id_tag'
    ];
}
