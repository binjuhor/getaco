<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;
    
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','user_status','id_group','id_company','id_role','avatar'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function comment(){
        return $this->hasMany('App\Comment','id','idUser');
    }
    
    public function company()
    {
        return $this->hasOne('App\Company', 'id_company','id_company');
    }

    public function verifyUser()
    {
        return $this->hasOne('App\VerifyUser');
    }
}
