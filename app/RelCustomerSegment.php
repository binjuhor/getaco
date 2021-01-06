<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RelCustomerSegment extends Model
{
    protected $table = 'rel_customer_segments';
    protected  $primaryKey = "id_customer_segment";
    protected $fillable = [
        'id_segment',
        'id_customer',
        'created_at',
        'updated_at',
    ];
}
