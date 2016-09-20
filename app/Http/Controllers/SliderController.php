<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;
use App\Http\Requests;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('gestor.slider.ver');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('gestor.slider.create');
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
            $name = 'slider_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/slider/";
            $file -> move($path,$name);
        }
        $slider = new Slider($request->all());

        $slider->imagen = $name;
        $slider->save();
        return redirect('app/slider');
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
         $noticia = Slider::find($id);
        $noticia->fill($request->all());

        if($request->file('imagen'))
        {
            $file = $request -> file('imagen');
            $name = 'slider_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/slider/";
            $file -> move($path,$name);
            $noticia->imagen = $name;
        }
        $noticia->save();
        return redirect('app/slider');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Slider::destroy($id);

        $this->getGaleria();
    }
    public function getSlider()
    {
        
        $not = Slider::all();
        return response()->json( $not );

    }
    public function getSliderIndex()
    {
        
        $not = Slider::where('estado','Activo')->orderBy('orden', 'asc')->get();
        return response()->json( $not );
    }
}
