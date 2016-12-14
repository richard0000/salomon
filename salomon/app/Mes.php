<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Mes extends Model
{
	protected $table = 'meses';
	public $timestamps = false;

	public function diezmos()
	{
		return $this->hasMany('App\Diezmo', 'id', 'month(fecha)');
	}

}
