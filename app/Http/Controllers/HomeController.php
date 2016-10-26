<?php

namespace App\Http\Controllers;

use App\Http\Requests;
use Illuminate\Http\Request;
use App\Colegio;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (\Auth::user()->estado == 'Activo') {
            $mensaje = "Bienvenido/a " . \Auth::user()->nombres;
            $col = Colegio::all();
            \Auth::user()->url = $col[0]->url;
            return view('docentes.welcome')->with('mensaje', $mensaje);
        }
        else{
            $mensaje = "Al parecer su usuario está inactivo.";
            
            return view('docentes.welcome')->with('mensaje', $mensaje);
        }
        
    }
}
