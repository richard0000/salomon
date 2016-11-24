<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Territorio;

use Validator, Redirect, Input, Session;

class TerritoriosController extends Controller
{
    /**
     * Retorna un territorio en formato json
     *
     * @return \Illuminate\Http\Response
     */
    public function getTerritorio(Request $request)
    {
        $territorio = Territorio::findOrFail($request->get('id'));

        return response()->json($territorio);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $territorios = Territorio::orderBy('descripcion')->paginate(10);

        return view('territorios/index', ['territorios'=> $territorios]);
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
            'descripcion' => 'required|unique:territorios'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('territorios')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();
            
            Territorio::create($input);

            Session::flash('flash_message', 'Nuevo Territorio guardado con &eacute;xito!');

            return redirect('/territorios');
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
            'descripcion' => 'required|unique:territorios'
        ];
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return Redirect::to('territorios')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();

            $territorio = Territorio::findOrFail($id);
            
            $territorio->fill($input)->save();

            Session::flash('flash_message', 'Territorio editado con &eacute;xito!');

            return redirect('/territorios');
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
        $territorio = Territorio::findOrFail($id);
        $territorio->delete();
        return redirect('/territorios');
    }
}
