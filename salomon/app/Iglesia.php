<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iglesia extends Model
{
    /**
     * Campos a manejar por el objeto a mapear
     *
     */
	protected $fillable = [
		'nombre',
		'direccion',
		'location',
		'telefono1',
		'telefono2',
		'telefono3',
		'email',
		'logo',
		'pastor_id',
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

	public function pastor()
	{
		return $this->hasOne('App\Persona', 'id', 'pastor_id');
	}
}
