<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package_order extends Model
{
    protected $table = 'package_order';
    protected  $primaryKey = "id_order";
    protected $fillable = [
        'name_order',
        'phone_order',
        'email_order',
        'pay_order',
        'id_package'
    ];
}
