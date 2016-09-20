<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Comunicado;
use DB;
use App\Http\Requests;

class ComunicadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gestor.comunicados.ver');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestor.comunicados.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $comunicado = new Comunicado($request->all());
        if($request->file('imagen'))
        {
            $file = $request -> file('imagen');
            $name = 'comunicado_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/comunicados/";
            $file -> move($path,$name);
            $comunicado->imagen = $name;
        }
        $comunicado->save();
        return redirect('app/comunicados');
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
        $comunicado = Comunicado::find($id);
        $comunicado->fill($request->all());

        if($request->file('imagen'))
        {
            $file = $request -> file('imagen');
            $name = 'comunicado_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/comunicados/";
            $file -> move($path,$name);
            $comunicado->imagen = $name;
        }
        $comunicado->save();
        return redirect('app/comunicados');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Comunicado::destroy($id);

        return $this->getComunicado();
    }
    public function getComunicado()
    {
        
        $comuni = Comunicado::all();
        return response()->json( $comuni );


    }
    public function getComunicadoIndex()
    {
        $not = DB::table('comunicados')
                ->orderBy('fecha_pub', 'desc')
                ->take(5)
                ->get();
        return response()->json( $not );
    }
    public function detalle($id)
    {
        $registros = Comunicado::where('id', $id)
                             ->get();
        return view('index.comunicado')->with('comunicados', $registros);
    }
    public function getComunicadoIndexAll()
    {
        $noticias = Comunicado::orderBy('fecha_pub','DESC')->paginate(10);
        return view('gestor.comunicados.all')->with('comunicados', $noticias);
    }


}
