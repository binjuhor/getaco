<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageFeature extends Model
{
    protected $table = 'package_feature';
    protected  $primaryKey = "id_feature";
    protected $fillable = [
        'id_package',
        'name',
        'description',
        'status',
        'sort_order',
        'created_at',
        'updated_at',
    ];

    /**
     * This return list package with feature
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function package()
    {
        return $this->beLongsTo('App\Package');
    }

    
}
