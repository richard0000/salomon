<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Ocupacion extends Model
{
    /**
     * Tabla de ocupaciones en la BD
     *
     */
	protected $table = 'ocupaciones';

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
