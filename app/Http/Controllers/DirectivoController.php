<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Directorio;
use App\Http\Requests;
use App\User;

class DirectivoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('directivos.ver');
    }

    /**
     * Listado de directivos
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $users = User::where('usuariotipo_id', 4)->get();
        return response()->json( $users );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('directivos.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $u = User::where('dni', $request->dni)->get();
        if (count($u) == 0) {
            $docente = new User($request->all());
            $docente->usuariotipo_id = 4;
            $docente->usuario = $request->dni;
            $docente->password = bcrypt($request->dni);
            $docente->estado = 'Activo';
            $docente->save();
            return redirect('app/directivos');
        }
        else{
            $error = 'Este dni ya está siendo usado';
            return view('directivos.crear')->with('error', $error);
        }
        
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
        $docente = User::find($id);
        $docente->fill($request->all());
        $docente->save();

        return $this->get();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::destroy($id);

        return $this->get();
    }
}
