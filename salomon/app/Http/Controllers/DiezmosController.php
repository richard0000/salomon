<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Persona;
use App\Diezmo;
use Carbon\Carbon;

use Validator, Redirect, Input, Session, DB;

class DiezmosController extends Controller
{
    public function diezmosPorMes(Request $request)
    {
        $iglesia = $this->configuracion->getIglesia();
        $anio = $request->get('anio') ?? Carbon::now()->year;

        if(($request->get('persona_id') !== null)&&($request->get('persona_id') !== '0')){
            $persona_id = $request->get('persona_id');

            $diezmos = DB::table('diezmos')
                ->select(DB::raw('month(fecha) as mes, sum(importe) as importe'))
                ->where('persona_id', $persona_id)
                ->whereRaw('year(fecha) = ' . $anio)
                ->groupBy('mes')
                ->orderBy('mes')
                ->get();
        }else{
            $personasIglesia = Persona::where('iglesia_id', $iglesia)
                ->select('id')
                ->get();

            $diezmos = DB::table('diezmos')
                ->select(DB::raw('persona_id, month(fecha) as mes, sum(importe) as importe'))
                ->whereIn('persona_id', $personasIglesia)
                ->whereRaw('year(fecha) = ' . $anio)
                ->groupBy(['persona_id', 'mes'])
                ->orderBy('mes')
                ->get();
        }

        return response()->json($this->prepareDiezmosForChart($diezmos));
    }

    public function prepareDiezmosForChart($diezmos)
    {
        $result = [];
        foreach ($diezmos as $key => $value) {
            $result[$key] = ['name' => $value->mes, 'y' => intval($value->importe)];
        }

        return $result;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   //Para mosrar las fechas en castellano
        Carbon::setLocale('es');
        setlocale(LC_TIME, config('app.locale'));

        $anios = $this->configuracion->getAnios();
        $iglesia = $this->configuracion->getIglesia();

        /*personas para mostrar en el select*/
        $personas = Persona::select('id', DB::raw('concat(nombre, " ", apellido) as apellido'))
            ->where('iglesia_id', $iglesia)
            ->orderBy('apellido')
            ->pluck('apellido', 'id')
            ->prepend('--TODOS--', 0);

        /*persona actualmente seleccionada*/
        $persona_id = $request->get('persona_id');
        $anio = $request->get('anio') ?? Carbon::now()->year;

        /*vemos si hay seleccionada una persona o todos*/
        if(($persona_id !== null)&&($persona_id !== '0')){
            $diezmos = Persona::findOrFail($persona_id)
                ->diezmos()
                ->paginate(30);
        }else{
            $diezmos = Diezmo::with('persona')
                ->join('personas', 'persona_id', 'personas.id')
                ->where('personas.iglesia_id', $iglesia)
                ->orderBy('fecha')
                ->paginate(30);
        }

        return view('diezmos.index', [
            'diezmos' => $diezmos,
            'personas' => $personas,
            'persona_id' => $persona_id,
            'anios' => $anios,
            'anio' => $anio
        ]);
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

        $personas = Persona::select('id', DB::raw('concat(nombre, " ", apellido) as apellido'))
            ->orderBy('apellido')
            ->pluck('apellido', 'id');

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
            return Redirect::to('diezmos/edit')
                ->withErrors($validator)
                ->withInput($request->all());
        } else {
            // store
            $input = $request->all();

            $input['fecha'] = Carbon::createFromFormat('d-m-Y', $input['fecha']);
            
            $diezmo = Diezmo::findOrFail($id);

            $diezmo->fill($input)->save();

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
