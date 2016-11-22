<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Territorio;
use App\Ocupacion;
use App\Idioma;
use Carbon\Carbon;

use Validator, Redirect, Input, Session;

class PersonasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $personas = Persona::orderBy('nombre', 'apellido')->paginate(10);

        return $this->vista('personas/index', ['personas'=> $personas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ocupaciones = Ocupacion::orderBy('descripcion')
            ->pluck('descripcion', 'id');

        $idiomas = Idioma::orderBy('descripcion')
            ->pluck('descripcion', 'id');

        $territorios = Territorio::orderBy('descripcion')
            ->pluck('descripcion', 'id');

        $personas = Persona::orderBy('nombre', 'apellido')->get();

        return $this->vista('personas.create', [
            'personas' => $personas,
            'idiomas' => $idiomas,
            'territorios' => $territorios,
            'ocupaciones' => $ocupaciones
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'apellido' => 'required',
            'nombre' => 'required',
            'email' => 'email',
            'fecha_de_nacimiento' => 'date_format:d-m-Y'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('personas')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();

            if (($input['fecha_de_nacimiento'] !== null)&&($input['fecha_de_nacimiento'] !== '')) {
                dd($input['fecha_de_nacimiento'] == '');
                $input['fecha_de_nacimiento'] = Carbon::createFromFormat('d-m-Y', $input['fecha_de_nacimiento']);
            }else{
                $input['fecha_de_nacimiento'] = null;
            }

            Persona::create($input);

            Session::flash('flash_message', 'Nueva persona guardado con &eacute;xito!');

            return redirect('/personas');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $ocupaciones = Ocupacion::orderBy('descripcion')
            ->pluck('descripcion', 'id');

        $idiomas = Idioma::orderBy('descripcion')
            ->pluck('descripcion', 'id');

        $territorios = Territorio::orderBy('descripcion')
            ->pluck('descripcion', 'id');

        $persona = Persona::findOrFail($id);

        return $this->vista('personas.edit', [
            'persona' => $persona,
            'idiomas' => $idiomas,
            'territorios' => $territorios,
            'ocupaciones' => $ocupaciones
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $rules = [
            'apellido' => 'required',
            'nombre' => 'required',
            'email' => 'email',
            'fecha_de_nacimiento' => 'date_format:d-m-Y'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('personas')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();
            
            if (($input['fecha_de_nacimiento'] !== null)&&($input['fecha_de_nacimiento'] !== '')) {
                $input['fecha_de_nacimiento'] = Carbon::createFromFormat('d-m-Y', $input['fecha_de_nacimiento']);
            }else{
                $input['fecha_de_nacimiento'] = null;
            }

            $persona = Persona::findOrFail($id);

            $persona->fill($input)->save();

            Session::flash('flash_message', 'Los datos fueron actualizados con &eacute;xito!');

            return redirect('/personas');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $persona = Persona::findOrFail($id);
        $persona->delete();
        return redirect('/personas');
    }
}
