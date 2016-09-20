<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Colegio;
use App\Http\Requests;

class ColegioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $nosotros = Colegio::all();
        return view('gestor.general.general')->with('nosotros', $nosotros);
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
        $noticia = Colegio::find($id);
        //dd($request);
        $noticia->fill($request->all());
        $noticia->save();
        return redirect('app/general');
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
    public function get()
    {
        $not = Colegio::all();
        return response()->json( $not );
    }
    public function urlApp()
    {
        $col = Colegio::all();
        return view('gestor.general.urlApp')->with('colegio', $col[0]);
    }
    public function urlUpdate(Request $request)
    {   
        $noticia = Colegio::find(1);
        //dd($request);
        $noticia->fill($request->all());
        $noticia->save();

        return redirect('app/urlApp');
    }
}
