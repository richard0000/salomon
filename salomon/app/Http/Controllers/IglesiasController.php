<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Iglesia;
use App\Persona;

use Validator, Redirect, Input, Session, DB;

class IglesiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $iglesias = Iglesia::orderBy('nombre')->paginate(10);

        return view('iglesias.index', ['iglesias'=> $iglesias]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $personas = Persona::select('id', DB::raw('concat(nombre, " ", apellido) as apellido'))
            ->orderBy('apellido')
            ->pluck('apellido', 'id');

        return view('iglesias.create', [
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
            'nombre' => 'required',
            'email' => 'email'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('iglesias/create')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();

            Iglesia::create($input);

            Session::flash('flash_message', 'Nueva iglesia creada con &eacute;xito!');

            return redirect('/iglesias');
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
        $iglesia = Iglesia::findOrFail($id);

        $personas = Persona::select('id', DB::raw('concat(nombre, " ", apellido) as apellido'))
            ->orderBy('apellido')
            ->pluck('apellido', 'id');

        return view('iglesias.edit', [
            'iglesia' => $iglesia,
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
            'nombre' => 'required',
            'email' => 'email'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('iglesias/update')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();

            $iglesia = Iglesia::findOrFail($id);

            $iglesia->fill($input)->save();

            Session::flash('flash_message', 'Datos de iglesia modificados con &eacute;xito!');

            return redirect('/iglesias');
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
        $iglesia = Iglesia::findOrFail($id);
        $iglesia->delete();
        return redirect('/iglesias');
    }
}
