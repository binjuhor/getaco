<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Import extends Model
{
	protected $table = 'log_import';
	protected $primaryKey = 'id_import';
	protected $fillable = [
		'id_company',
		'file_name',
		'note',
	];
}
