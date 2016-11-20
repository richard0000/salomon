<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\EdadCategoria;

use Validator, Redirect, Input, Session;

class EdadCategoriasController extends Controller
{
    /**
     * Retorna unaocupacion en formato json
     *
     * @return \Illuminate\Http\Response
     */
    public function getEdadCategoria(Request $request)
    {
        $edadCategoria = EdadCategoria::findOrFail($request->get('id'));

        return response()->json($edadCategoria);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $edadCategorias = edadCategoria::orderBy('descripcion')->paginate(10);

        return view('edadcategorias/index', ['edadCategorias'=> $edadCategorias]);
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
            'descripcion' => 'required|unique:edadcategorias',
            'desde' => 'required',
            'hasta' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('edadcategorias')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();
            
            EdadCategoria::create($input);

            Session::flash('flash_message', 'Nueva Categoria de edad guardada con &eacute;xito!');

            return redirect('/edadcategorias');
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
            'descripcion' => 'required|unique:edadcategorias',
            'desde' => 'required',
            'hasta' => 'required'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('edadcategorias')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();
            
            $edadCategoria = EdadCategoria::findOrFail($id);

            $edadCategoria::fill($input)->save();

            Session::flash('flash_message', 'Categoria de edad modificada con &eacute;xito!');

            return redirect('/edadCategorias');
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
        $edadCategoria = EdadCategoria::findOrFail($id);
        $edadCategoria->delete();
        return redirect('/edadcategorias');
    }
}
