<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Territorio;
use App\Ocupacion;
use App\Idioma;
use Carbon\Carbon;

use Validator, Redirect, Input, Session;

class PastoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pastores = Persona::pastores()
            ->orderBy('nombre', 'apellido')->paginate(10);

        return view('pastores/index', ['pastores'=> $pastores]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pastores.create');
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
            return Redirect::to('/pastores/create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();

            $input['mentor_id'] = 1;

            if (($input['fecha_de_nacimiento'] !== null)&&($input['fecha_de_nacimiento'] !== '')) {
                $input['fecha_de_nacimiento'] = Carbon::createFromFormat('d-m-Y', $input['fecha_de_nacimiento']);
            }else{
                $input['fecha_de_nacimiento'] = null;
            }

            Persona::create($input);

            Session::flash('flash_message', 'Nuevo pastor guardado con &eacute;xito!');

            return redirect('/pastores');
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
        $pastor = Persona::findOrFail($id);

        return view('pastores.edit', [
            'pastor' => $pastor
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
            return Redirect::to('pastores/edit')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // update
            $input = $request->all();

            $input['mentor_id'] = 1;
            
            if (($input['fecha_de_nacimiento'] !== null)&&($input['fecha_de_nacimiento'] !== '')) {
                $input['fecha_de_nacimiento'] = Carbon::createFromFormat('d-m-Y', $input['fecha_de_nacimiento']);
            }else{
                $input['fecha_de_nacimiento'] = null;
            }

            $persona = Persona::findOrFail($id);

            $persona->fill($input)->save();

            Session::flash('flash_message', 'Los datos fueron actualizados con &eacute;xito!');

            return redirect('/pastores');
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
        $pastor = Persona::findOrFail($id);
        $pastor->delete();
        return redirect('/personas');
    }
}
