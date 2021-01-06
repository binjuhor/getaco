<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelCustomerTag extends Model
{
   protected $table = 'rel_customer_tags';
    protected  $primaryKey = "id_customer_tag";
    protected $fillable = [
        'id_tag',
        'id_customer',
        'created_at',
        'updated_at',

    ];
    public function TagCustomer(){
        return $this->hasOne('App\Customer','id_customer','id_customer');
    }
}
