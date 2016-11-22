<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Iglesia;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
    * Variable para acceder a la iglesia actual en cualquier parte del sistema
    *
    */
    protected $iglesiaSingleton;

    /**
    * Constructor de Controller. Agrega una instancia única (singleton)
    * de la clase Iglesia
    *
    * @return void
    */
    public function __construct(Iglesia $iglesia)
    {
    	$this->iglesiaSingleton = $iglesia;	
    }

    /**
    * Página de inicio
    *
	* @return void
    */
    public function welcome()
    {
    	return $this->vista('welcome');
    }

    /**
    * Página de inicio
    *
    * @return void
    */
    public function vista(string $view, array $args = [])
    {
        $iglesiaS = $this->iglesiaSingleton
            ->pluck('nombre', 'id');

        $args = array_add($args, 'iglesiaS', $iglesiaS);

        return view($view, $args);
    }
}