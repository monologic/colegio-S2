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
    	$col = Colegio::all();
    	\Auth::user()->url = $col[0]->url;
        return view('docentes.welcome');
    }
}
