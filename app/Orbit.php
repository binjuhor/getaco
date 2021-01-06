<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orbit extends Model
{
    protected $table = 'orbits';
    protected  $primaryKey = "id_orbit";
    protected $fillable = [
        'id_orbit',
        'orbit',
    ];
}
