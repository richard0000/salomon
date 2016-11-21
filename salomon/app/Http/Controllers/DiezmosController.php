<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Diezmo;
use Carbon\Carbon;

use Validator, Redirect, Input, Session, DB;

class DiezmosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //Para mosrar las fechas en castellano
        Carbon::setLocale('es');
        setlocale(LC_TIME, config('app.locale'));

        /*personas para mostrar en el select*/
        $personas = Persona::select('id', DB::raw('concat(apellido, ", ", nombre) as apellido'))
            ->orderBy('apellido')
            ->pluck('apellido', 'id')
            ->prepend('--TODOS--', 0);

        /*persona actualmente seleccionada*/
        $persona_id = $request->get('persona_id') ?? null;

        /*vemos si hay seleccionada una persona o todos*/
        if(($persona_id !== null)&&($persona_id !== '0')){
            $diezmos = Persona::findOrFail($persona_id)
                ->diezmos()
                ->paginate(30);
        }else{
            $diezmos = Diezmo::with('persona')
                ->orderBy('fecha')->paginate(30);
        }

        return view('diezmos.index', [
            'diezmos' => $diezmos,
            'personas' => $personas,
            'persona_id' => $persona_id
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Persona::select('id', DB::raw('concat(apellido, ", ", nombre) as apellido'))
            ->orderBy('apellido')
            ->pluck('apellido', 'id');

        return view('diezmos.create', [
            'personas' => $personas
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
            'persona_id' => 'required',
            'fecha' => 'required|date_format:d-m-Y',
            'importe' => 'required|numeric'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('diezmos/create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();

            $input['fecha'] = Carbon::createFromFormat('d-m-Y', $input['fecha']);
            
            Diezmo::create($input);

            Session::flash('flash_message', 'Nuevo diezmo cargado con &eacute;xito!');

            return redirect('/diezmos');
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
        $diezmo = Diezmo::findOrFail($id);

        $personas = Persona::orderBy('nombre', 'apellido')
            ->pluck('nombre', 'apellido', 'id');

        return view('diezmos.edit', [
            'diezmo' => $diezmo,
            'personas' => $personas
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
            'persona_id' => 'required',
            'fecha' => 'required|date_format:d-m-Y',
            'importe' => 'required|numeric'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('diezmos/update')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();

            $input['fecha'] = Carbon::createFromFormat('d-m-Y', $input['fecha']);
            
            $diezmo = Diezmo::findOrFail($id);

            $diezmo::fill($input)->save();

            Session::flash('flash_message', 'Los datos del diezmo fueron modificados con &eacute;xito!');

            return redirect('/diezmos');
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
        $diezmo = Diezmo::findOrFail($id);
        $diezmo->delete();
        return redirect('/diezmos');
    }
}
