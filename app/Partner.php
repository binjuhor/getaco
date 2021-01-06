<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Partner extends Model
{
    protected $table = 'partner';
    protected $primaryKey = 'id_partner';
    protected $fillable = [
    	'id_order',
		'id_company',
		'name',
		'email',
		'phone'
    ];
}
