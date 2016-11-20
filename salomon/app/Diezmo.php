<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Diezmo extends Model
{
	/**
    * Campos a manejar por el objeto a mapear
    *
    */
	protected $fillable = [
		'created_at',
		'updated_at',
		'fecha',
		'persona_id',
		'importe'
	];

    /**
     * Campos que van a ser tratados como fechas 
     * (pueden ser usados por la librería "Carbon")
     *
     */
	protected $dates = [
		'created_at',
		'updated_at',
		'fecha'
	];

    /**
     * Retorna la persona relacionada al diezmo (la que diezmó)
     *
     * @return App\Persona
     */
	public function persona()
	{
		return $this->belongsTo('App\Persona');
	}
}
