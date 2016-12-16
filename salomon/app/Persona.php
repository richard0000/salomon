<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Persona extends Model
{
	/**
    * Campos a manejar por el objeto a mapear
    *
    */	
	protected $fillable = [
		'descripcion',
		'created_at',
		'updated_at',
        'apellido',
        'nombre',
        'direccion',
        'location',
        'telefono1',
        'telefono2',
        'telefono3',
        'fecha_de_nacimiento',
        'fecha_de_fallecimiento',
        'sexo',
        'estado_civil',
        'observaciones',
        'activo',
        'foto',
        'email',
        /*
        foreign key's (FK's)
        */
        'idioma_nativo_id',
        /*
        (niño, adolescente, joven, adulto) el categoria es automático con la fecha de nacimiento, se establecen edades límite para cada rango en un ABM de categorias
        */
        'ocupacion_id',
        'territorio_id',
        /*
        relaciones con personas en el sistema
        */
        'conyugue_id',
        'padre_id',
        'madre_id',
        'hijo_id',
        'hija_id',
        'mentor_id',
        /*
        referencias de fk's
        */
        'ocupacion_id',
        'territorio_id',
        'categoria_id',
        'idioma_nativo_id',
        'conyugue_id',
        'padre_id',
        'madre_id',
        'hijo_id',
        'hija_id',
        'mentor_id',
        'iglesia_id'
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

    /**
    * Relación con modelo de diezmos
    * retorna los diezmos de una persona
    */
    public function diezmos()
    {
        return $this->hasMany('App\Diezmo');
    }

    public function mentor()
    {
        return $this->hasOne('App\Persona', 'id', 'mentor_id');
    }

    public function scopePastores($query)
    {
        return $query->where('mentor_id', 1);
    }
}
