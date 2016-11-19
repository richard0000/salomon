<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Ocupacion;

use Validator, Redirect, Input, Session;

class OcupacionesController extends Controller
{
    /**
     * Retorna unaocupacion en formato json
     *
     * @return \Illuminate\Http\Response
     */
    public function getOcupacion(Request $request)
    {
        $ocupacion = Ocupacion::findOrFail($request->get('id'));

        return response()->json($ocupacion);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ocupaciones = ocupacion::orderBy('descripcion')->paginate(10);

        return view('ocupaciones/index', ['ocupaciones'=> $ocupaciones]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
            'descripcion' => 'required'
        ];
        $errors = [
            'descripcion' => 'Debe completar el nombre de la ocupacion'
        ];
        $validator = Validator::make($request->all(), $rules, $errors);

        if ($validator->fails()) {
            return Redirect::to('ocupaciones')
                ->withErrors($errors)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();
            
            Ocupacion::create($input);

            Session::flash('flash_message', 'Nueva ocupacion guardado con &eacute;xito!');

            return redirect('/ocupaciones');
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
        //
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
            'descripcion' => 'required'
        ];
        $errors = [
            'descripcion' => 'Debe completar el nombre del ocupacion'
        ];
        $validator = Validator::make($request->all(), $rules, $errors);
        // process the login
        if ($validator->fails()) {
            return Redirect::to('ocupaciones')
                ->withErrors($errors)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();

            $ocupacion = Ocupacion::findOrFail($id);
            
            $ocupacion->fill($input)->save();

            Session::flash('flash_message', 'ocupacion editado con &eacute;xito!');

            return redirect('/ocupaciones');
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
        $ocupacion = Ocupacion::findOrFail($id);
        $ocupacion->delete();
        return redirect('/ocupaciones');
    }
}
