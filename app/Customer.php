<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table = 'customers';
    protected  $primaryKey = "id_customer";
    protected $fillable = [
        'customer_name',
        'id_form',
        'customer_email',
        'customer_phone',
        'id_company',
        'customer_status',
        'from_url',
        'sort_order',
        'created_at',
        'updated_at',
        'dynamic_field',
    ];

    /**
     * Get full dynamic fields from dynamic_field.
     * 
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function dynamicField()
    {
        return $this->hasMany('App\DynamicField', 'id_customer','id_customer');
    }

    /**
     * Get value from dynamic field.
     * 
     * @author Binjuhor - binjuhor@gmail.com 
     * @version 1.0.0
     */
    public function dynamicValue( $field_id, $customer_ID )
    {
        $dynamics = $this->dynamicField;
        if (!count($dynamics)) return '';
        foreach ($dynamics as $key => $data) {
            if ( $field_id == $data->id_element) {
                if (is_array(json_decode( $data->value_field))) {
                    return implode(', ',json_decode( $data->value_field));
                }
                return $data->value_field;
            }
        }
    }


    public function segment(){
        return $this->belongsToMany('App\Segment','rel_customer_segments','id_customer','id_segment');
    }
    public function CustomerTag(){
        return $this->belongsToMany('App\Tag','rel_customer_tags','id_customer','id_tag');
    }
    public function rel_tag(){
        return $this->hasMany('App\RelCustomerTag','id_customer');
    }
    public function rel_seg(){
        return $this->hasMany('App\RelCustomerSegment','id_customer');
    }
    public function dynamic_customer(){
        return $this->hasMany('App\DynamicField','id_customer');
    }

}
