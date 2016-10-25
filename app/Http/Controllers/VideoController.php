<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Video;
use App\Http\Requests;

class VideoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestor.video.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $video = new Video($request->all());
        $es1 = $video->url;
        $porciones = explode("=", $es1);
        //dd($porciones);
        if (count($porciones) > 1)
            $fn ='https://www.youtube.com/embed/'.$porciones[1].'?autoplay=0';
        else{
            $arg = explode("/", $es1);
            $fn ='https://www.youtube.com/embed/'.$arg[3].'?autoplay=0';
        }
        $video->fecha = date("Y-m-d");
        $video->url = $fn ;
        $video->save();
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
        $video = Video::find($id);
        $video->nombre = $request->nombre;
        $video->descripcion = $request->descripcion;
        if ($request->url != $video->url) {
            $es1 = $request->url;
            $porciones = explode("=", $es1);
            $fn ='https://www.youtube.com/embed/'.$porciones[1].'?autoplay=0';
            $video->url = $fn ;
        }
        $video->save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Video::destroy($id);
    }
}
