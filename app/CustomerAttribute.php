<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CustomerAttribute extends Model
{
    protected $table       = 'customer_attribute';
    protected  $primaryKey = "id_attribute";
    public $timestamps  = true;
    protected $fillable = [
        'id_user',
        'label',
        'name',
        'status',
        'select',
        'type',
        'for',
        'id_company',
        'sort_order',
        'orbit',
        'created_at',
        'updated_at',
    ];

    /**
     * Attribute options.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function options()
    {
        return $this->hasMany('App\AttributeOption', 'id_attribute','id_attribute');
    }
}
