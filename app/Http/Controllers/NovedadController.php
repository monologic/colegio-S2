<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Novedad;
use DB;

use App\Http\Requests;

class NovedadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gestor.novedades.ver');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestor.novedades.create');
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
            $name = 'novedad_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/novedades/";
            $file -> move($path,$name);
        }
        $noticia = new Novedad($request->all());

        $noticia->foto = $name;
        $noticia->save();
        return redirect('app/novedades');
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
        $noticia = Novedad::find($id);
        $noticia->fill($request->all());
        if($request->file('imagen'))
        {
            $file = $request -> file('imagen');
            $name = 'novedades_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/novedades/";
            $file -> move($path,$name);
            $noticia->foto = $name;
        }
        $noticia->save();
        return redirect('app/novedades');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Novedad::destroy($id);

        return $this->getNovedades();
    }
    public function getNovedades()
    {
        
        $not = Novedad::all();
        return response()->json( $not );

    }
    public function getNovedadesIndex()
    {
        
        $not = DB::table('novedads')
                ->orderBy('fecha', 'desc')
                ->take(3)
                ->get();
        return response()->json( $not );


    }
    public function detalle($id)
    {
        $registros = Novedad::where('id', $id)
                             ->get();
        return view('index.novedad')->with('novedades', $registros);
    }
    public function getNovedadesIndexAll()
    {
        $noticias = Novedad::orderBy('fecha','DESC')->paginate(10);
        return view('gestor.novedades.all')->with('novedades', $noticias);
    }

}
