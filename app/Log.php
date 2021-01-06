<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'logs';
    protected  $primaryKey = "id_log";
    protected $fillable = [
        'cookieID',
        'id_form',
        'action',
    ];
}
