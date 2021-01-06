<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    protected $table = "payment";
      protected $primary_key = 'id_pay';
      protected $fillable = [
            'name',
            'mail',
            'phone',
            'id_company',
            'id_package',
            'lim',
            'total',
            'status'
        ];
}
