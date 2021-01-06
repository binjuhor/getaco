<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Segment extends Model
{
    protected $table = 'segments';
    protected  $primaryKey = "id_segment";
    protected $fillable = [
        'segment_name',
        'id_company'
    ];

    public function customer(){
        return $this->belongsToMany('App\Customer','rel_customer_segments','id_customer','id_segment');
    }
}
