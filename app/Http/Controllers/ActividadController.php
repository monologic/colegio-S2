<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Actividad;

class ActividadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('actividades.ver');
    }

    public function get()
    {
        $acts = Actividad::all();
        $acts->each(function($acts){
            $acts->usuario;
        });
        //dd($acts);
        return response()->json( $acts );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('actividades.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $actividad = new Actividad($request->all());
        $actividad->fecha_creacion = date('Y-m-d H:i:s');
        $actividad->save();

        return redirect('app/actividades');
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
        $actividad = Actividad::find($id);
        $actividad->fill($request->all());
        $actividad->save();

        return $this->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Actividad::destroy($id);

        return $this->get();
    }
     public function getdia($fecha)
    {  

        $ats = Actividad::whereBetween('fecha_inicio', array($fecha .' 00:00:00', $fecha .' 23:59:59'))
                        ->get();
        $ats->each(function($ats){
            $ats->usuario;
        });
        return response()->json( $ats );
    }
}
