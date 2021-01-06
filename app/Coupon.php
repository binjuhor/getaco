<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table = 'coupons';
    protected  $primaryKey = "id_coupon";
    protected $fillable = [
       'title_coupon',
       'type_coupon',
       'value',
       'code_coupon',
       'expiry_date',
       'note',
       'coupon_status',
       'limited',
       'value_coupon'
    ];
}
