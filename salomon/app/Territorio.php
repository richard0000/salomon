<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Territorio extends Model
{
    /**
    * Campos a manejar por el objeto a mapear
    *
    */	
	protected $fillable = [
		'descripcion',
		'created_at',
		'updated_at'
	];

    /**
    * Campos que van a ser tratados como fechas 
    * (pueden ser usados por la librería "Carbon")
    *
    */
	protected $dates = [
		'created_at',
		'updated_at'
	];
}
