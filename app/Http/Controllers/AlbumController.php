<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Albun;
use App\Galeria;
use App\Video;
use App\Http\Requests;

class AlbumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $galerias = Albun::orderBy('id','DESC')->get();
        $galerias->each(function($galerias){
            $galerias->album;
        });
        $videos = Video::all();
        $todo[]=$galerias ;
        $todo[]=$videos ;
        return view('gestor.album.ver')->with('todo', $todo);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestor.album.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $galeria = new Albun($request->all());
        $galeria->activo = 'Activo';
        $galeria->save();
        return redirect('app/album');
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
        //
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
     public function galeria($id)
    {
        $galerias = Galeria::where('albun_id',$id)->orderBy('id','DESC')->paginate(20);
        return view('gestor.galeria.ver')->with('galeria', $galerias)->with('idalbum',$id);
    }
    public function grid(){
        $galerias = Albun::where('activo', 'Activo')->orderBy('id','DESC')->paginate(20);
        $galerias->each(function($galerias){
            $galerias->album;
        });
        $videos = Video::all();
        $todo[]=$galerias ;
        $todo[]=$videos ;
        return view('index.galeria')->with('todo', $todo);
    }
    public function cambiarEstadoAlbum($id)
    {
        $album = Albun::find($id);
        if ($album->activo == 'Activo') {
            $album->activo = 'Inactivo';
        }
        else
            $album->activo = 'Activo';

        $album->save();
        return redirect('app/album');
    }
}
