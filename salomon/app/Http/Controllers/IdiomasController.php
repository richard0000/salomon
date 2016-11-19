<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Idioma;

use Validator, Redirect, Input, Session;

class IdiomasController extends Controller
{
    /**
     * Retorna un idioma en formato json
     *
     * @return \Illuminate\Http\Response
     */
    public function getidioma(Request $request)
    {
        $idioma = Idioma::findOrFail($request->get('id'));

        return response()->json($idioma);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $idiomas = Idioma::orderBy('descripcion')->paginate(10);

        return view('idiomas/index', ['idiomas'=> $idiomas]);
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
            'descripcion' => 'Debe completar el nombre del idioma'
        ];
        $validator = Validator::make($request->all(), $rules, $errors);

        if ($validator->fails()) {
            return Redirect::to('idiomas')
                ->withErrors($errors)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();
            
            Idioma::create($input);

            Session::flash('flash_message', 'Nuevo idioma guardado con &eacute;xito!');

            return redirect('/idiomas');
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
            'descripcion' => 'Debe completar el nombre del idioma'
        ];
        $validator = Validator::make($request->all(), $rules, $errors);

        if ($validator->fails()) {
            return Redirect::to('idiomas')
                ->withErrors($errors)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();

            $idioma = Idioma::findOrFail($id);
            
            $idioma->fill($input)->save();

            Session::flash('flash_message', 'idioma editado con &eacute;xito!');

            return redirect('/idiomas');
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
        $idioma = Idioma::findOrFail($id);
        $idioma->delete();
        return redirect('/idiomas');
    }
}
