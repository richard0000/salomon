<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Configuracion extends Model
{
    protected $table='configuracion';
    protected $primaryKey = 'clave';
    public $timestamps = false;
    protected $fillable = [
    	'clave',
    	'valor'
    ];

    public function getIglesia()
    {
		return $this->where('clave', 'iglesia')->get()->first()->valor;
    }
}