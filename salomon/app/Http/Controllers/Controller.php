<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use App\Iglesia;
use App\Configuracion;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
    * Variable para acceder a la iglesia actual en cualquier parte del sistema
    *
    */
    protected $configuracion;

    public function __construct(Configuracion $configuracion)
    {
        $this->configuracion = $configuracion;
    }

    /**
    * Función para setear la variable $iglesia con una petición ajax PATCH
    *
    * @return void
    */
    public function setIglesia(Request $request)
    {
        $conf = $this->configuracion
            ->where('clave', 'iglesia')->get()->first();

        $conf->fill([
            'clave' => 'iglesia',
            'valor' => $request->get('id')
        ])->save();
    }

    /**
    * Página de inicio
    *
	* @return void
    */
    public function welcome()
    {
    	return view('welcome');
    }
}