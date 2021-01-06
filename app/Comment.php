<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = 'comments';
    protected  $primaryKey = "id";
    protected $fillable = [
        'idUser',
        'id_customer',
        'comment_content',
        'type',
        'sticky',
        'status_tag'
    ];

    public function user(){
        return $this->hasOne('App\User','id','idUser');
    }
    public function comment()
    {
        return $this->hasOne('App\Tag','id_tag','type');
    }
}