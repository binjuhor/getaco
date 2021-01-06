<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $table = 'packages';
    protected  $primaryKey = "id_package";
    protected $fillable = [
        'name',
        'description',
        'image',
        'origin_price',
        'status',
        'sort_order',
        'created_at',
        'updated_at',
    ];

    /**
     * Package features.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function feature()
    {
        return $this->hasMany('App\PackageFeature', 'id_package','id_package');
    }

    /**
     * Package variable.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function variable()
    {
        return $this->hasMany('App\PackageVariable', 'id_package','id_package');
    }
}
