<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{
    protected $table = 'permission';
    protected  $primaryKey = "id";
    protected $fillable = [
        'function',
        'role2',
        'role3',
        'role4',
        'id_group',
        'id_company'
    ];
}
