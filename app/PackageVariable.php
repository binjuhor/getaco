<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PackageVariable extends Model
{
    protected $table = 'package_variable';
    protected  $primaryKey = "id_variable";
    protected $fillable = [
        'id_package',
        'name',
        'variable_price',
        'sort_order',
        'created_at',
        'updated_at',
    ];

    /**
     * This return list package with variable
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function package()
    {
        return $this->beLongsTo('App\Package');
    }
}
