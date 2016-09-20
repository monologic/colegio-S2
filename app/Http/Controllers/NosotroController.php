<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Nosotro;
use App\Directorio;
use App\Http\Requests;

class NosotroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nosotros = Nosotro::all();
        $docentes = Directorio::all();
        $all[]=$nosotros;
        $all[]=$docentes;
        return view('gestor.nosotros.nosotros')->with('nosotros', $all);
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
        //
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
        $noticia = Nosotro::find($id);
        $noticia->fill($request->all());
        $noticia->save();
        return redirect('app/nosotros');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function grid(){
        $nosotros = Nosotro::all();
        $docentes = Directorio::all();
        $all[]=$nosotros;
        $all[]=$docentes;
        return view('index.nosotros')->with('nosotros', $all);
    }
}
