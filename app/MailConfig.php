<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MailConfig extends Model
{
    protected $table = 'mail_content';
    protected  $primaryKey = "id_content";
    protected $fillable = [
        'id_company',
        'mail_address',
        'mail_pass',
        'mail_config',
        'mail_name',
        'mail_subject',
        'mail_content',
        'mail_type'
    ];
}
