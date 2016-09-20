<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Enlace;

use App\Http\Requests;

class EnlaceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gestor.enlaces.ver');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestor.enlaces.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('imagen'))
        {
            $file = $request -> file('imagen');
            $name = 'enlace_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/enlace/";
            $file -> move($path,$name);
        }
        $nelace = new Enlace($request->all());

        $nelace->imagen = $name;
        $nelace->save();
        return redirect('app/enlaces');
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
        $enlace = Enlace::find($id);
        $enlace->fill($request->all());

        if($request->file('imagen'))
        {
            $file = $request -> file('imagen');
            $name = 'enlace_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/enlace/";
            $file -> move($path,$name);
            $enlace->imagen = $name;
        }
        $enlace->save();
        return redirect('app/enlaces');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         Enlace::destroy($id);

        $this->getEnlaces();
    }
    public function getEnlaces()
    {
        
        $not = Enlace::all();
        return response()->json( $not );

    }
    public function getEnlacesIndex()
    { 
        $not = Enlace::all();
        return response()->json( $not );
    }
}
