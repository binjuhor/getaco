<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = 'companies';
    protected  $primaryKey = "id_company";
    protected $fillable = [
        'company_name',
        'company_description',
        'company_address',
        'company_phone',
        'company_email',
        'website',
        'business_type',
        'timezone',
        'curency',
        'company_status',
        'sort_order',
        'open_hour',
        'closer_hour',
        'created_at',
        'updated_at',
        'num_field'
    ];
    public function user()
    {
        return $this->hasOne('App\User', 'id_company','id_company');
    }

    public function orbit()
    {
        return $this->hasOne('App\Orbit', 'id_orbit','business_type');
    }

}
