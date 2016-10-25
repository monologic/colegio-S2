<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Archivo;
use App\Archivotipo;

class ArchivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $valor = null;
        $tipo = null;
        
        if (count($request->all()) > 1) {
            if ($request->valor != null || $request->valor == "")
                session(['busqueda' => [$request->valor, $request->archivotipo_id]]);
        }

        $busqueda = session('busqueda');
        if ($busqueda != null) {
            $valor = $busqueda[0];
            $tipo = $busqueda[1];
        }

        $ordenar = ($request->ordenar) ? $request->ordenar : 'titulo' ;
        $archivos = Archivo::search($valor, $tipo)->orderBy($ordenar ,'ASC')->paginate(100);
        $archivos->each(function($archivos){
            $archivos->archivotipo;
        });
        
        return view('biblioteca.ver')->with('archivos', $archivos)->with('valor', $valor)->with('tipo', $tipo);
       
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ats = Archivotipo::all();
        return view('biblioteca.crear')->with('archivoTipos', $ats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->file('archivo'))
        {

            $file = $request -> file('archivo');
            $tipo = $file->getClientOriginalExtension();
            if ($tipo == 'pdf' || $tipo == 'mp3') {
                $name = 'archivo_'. time() . '.' .$file->getClientOriginalExtension();
                $path=public_path() . "/archivos/";
                $file -> move($path,$name);
                $archivo = new Archivo($request->all());
                $archivo->archivo = $name;
                $archivo->save();
            }
            else
            {
                dd('Tipo de Archivo no permitido, Solo se permiten archivos PDF y audio en mp3');
            }
        }
        else
        {
            $es1 = $request->video;
                $porciones = explode("=", $es1);
                $fn ='https://www.youtube.com/embed/'.$porciones[1].'?autoplay=0';
                $archivo = new Archivo($request->all());
                $archivo->archivo = $fn;
                $archivo->save();
        }
        return redirect('app/archivos');
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
        $archivo = Archivo::find($id);
        $archivo->fill($request->all());
        if($request->file('archivo'))
        {

            $file = $request -> file('archivo');
            $tipo = $file->getClientOriginalExtension();
            if ($tipo == 'pdf' || $tipo == 'mp3') {
                $name = 'archivo_'. time() . '.' .$file->getClientOriginalExtension();
                $path=public_path() . "/archivos/";
                $file -> move($path,$name);
                $archivo->archivo = $name;
            }
            else
                dd('Tipo de Archivo no permitido, Solo se permiten archivos PDF y audio en mp3');
            
        }
        
        $archivo->save();
        return redirect('app/archivos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Archivo::destroy($id);

        return $this->get();
    }

    public function get()
    {
        
        $archivos = Archivo::all();
        return response()->json( $archivos );

    }
    public function getArchivoTipos()
    {
        $ats = Archivotipo::all();

        return response()->json( $ats );
    }

    public function visualizar($id)
    {
        $archivo = Archivo::find($id);
        //dd($archivo);
        return view('biblioteca.visualizar')->with('archivo', $archivo);
    }
}
