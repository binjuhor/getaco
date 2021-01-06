<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';
    protected  $primaryKey = "id_tag";
    protected $fillable = [
        'tag_name',
        'id_company',
        'id_color',
        'created_at',
        'updated_at',
    ];

    /**
     * Get color information
     *
     * @return void
     * @author Binjuhor - binjuhor@gmail.com
     * @version 1.0.0
     */
    public function color()
    {
        return $this->hasOne('App\ColorTag','id_color','id_color');
    }
    
}

