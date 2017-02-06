<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use DB;

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

    public function getAnios()
    {
        $anioActual = Carbon::now()->year;
        $anioMin = DB::table('diezmos')
            ->select(DB::raw('min(year(created_at)) as anioMin'))
            ->first()
            ->anioMin;

        $rangoAnios = range($anioMin, $anioActual);

        $anios = [];
        foreach ($rangoAnios as $key => $value) {
            $anios[$value] = $value;
        }

        return $anios; 
    }
}