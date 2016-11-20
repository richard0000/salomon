<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EdadCategoria extends Model
{
    /**
     * Tabla de ocupaciones en la BD
     *
     */
	protected $table = 'edadcategorias';
	/**
    * Campos a manejar por el objeto a mapear
    *
    */
	protected $fillable = [
		'created_at',
		'updated_at',
		'descripcion',
		'desde',
		'hasta'
	];

    /**
     * Campos que van a ser tratados como fechas 
     * (pueden ser usados por la librería "Carbon")
     *
     */
	protected $dates = [
		'created_at',
		'updated_at',
	];
}
