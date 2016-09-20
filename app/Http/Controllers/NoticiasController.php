<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Noticia;
use DB;

use App\Http\Requests;

class NoticiasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gestor.noticias.ver');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestor.noticias.create');
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
            $name = 'noticia_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/noticia/";
            $file -> move($path,$name);
        }
        $noticia = new Noticia($request->all());

        $noticia->foto = $name;
        $noticia->save();
        return redirect('app/noticias');
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
        $noticia = Noticia::find($id);
        $noticia->fill($request->all());

        if($request->file('imagen'))
        {
            $file = $request -> file('imagen');
            $name = 'noticia_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/noticia/";
            $file -> move($path,$name);
            $noticia->foto = $name;
        }
        $noticia->save();
        return redirect('app/noticias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Noticia::destroy($id);

        return $this->getNoticia();
    }
    public function getNoticia()
    {
        
        $not = Noticia::all();
        return response()->json( $not );

    }
    public function getNoticiaIndex()
    {
        
       $not = DB::table('noticias')
                ->orderBy('fecha', 'desc')
                ->take(3)
                ->get();
        return response()->json( $not );
    }
    
    public function getNoticiaIndexAll()
    {
        $noticias = Noticia::orderBy('fecha','DESC')->paginate(10);
        return view('gestor.noticias.all')->with('noticias', $noticias);
    }
    public function detalle($id)
    {
        $registros = Noticia::where('id', $id)
                             ->orderBy('fecha', 'desc')
                             ->get();
        return view('index.noticia')->with('noticias', $registros);
    }
}
