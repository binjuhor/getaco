<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RequestDemo extends Model
{
    protected $table = 'request_demos';
    protected  $primaryKey = "id_reDemo";
    protected $fillable = [
        'first_name',
        'last_name',
        'business_email',
        'phone_number',
        'company',
        'company_size',
        'notes',
        
    ];
}
