<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Galeria;
use App\Http\Requests;

class GaleriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gestor.galeria.ver');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestor.galeria.create');
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
            $name = 'galeria_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/galeria/";
            $file -> move($path,$name);
        }
        $galeria = new Galeria($request->all());

        $galeria->imagen = $name;
        $galeria->save();
        return redirect('app/getAlbum/'.$galeria->albun_id);
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
        $noticia = Galeria::find($id);
        $noticia->fill($request->all());

        if($request->file('imagen'))
        {
            $file = $request -> file('imagen');
            $name = 'galeria_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/galeria/";
            $file -> move($path,$name);
            $noticia->imagen = $name;
        }
        $noticia->save();
        return redirect('app/getAlbum/'.$noticia->albun_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Galeria::destroy($id);
        $this->getGaleria();
    }
    public function getGaleria()
    {
        
        $not = Galeria::all();
        return response()->json( $not );

    }
    public function getGaleriaIndex()
    {
        
        $not = Galeria::all();
        return response()->json( $not );
    }
    
}
