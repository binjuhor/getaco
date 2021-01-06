<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrashAttribute extends Model
{
     protected $table = 'trash_attributes';
    protected  $primaryKey = "id_trash";
    protected $fillable = [
        'id_attribute',
        'id_company',
    ];
}
