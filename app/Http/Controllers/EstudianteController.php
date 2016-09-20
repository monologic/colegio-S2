<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class EstudianteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('estudiantes.ver');
    }

    /**
     * Listado de estudiantes
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $users = User::where('usuariotipo_id', 1)->get();
        return response()->json( $users );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('estudiantes.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $estudiante = new User($request->all());
        $estudiante->usuariotipo_id = 1;
        $estudiante->usuario = $request->dni;
        $estudiante->password = bcrypt($request->dni);

        $estudiante->save();
        return redirect('app/estudiantes');
        
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
        $estudiante = User::find($id);
        $estudiante->fill($request->all());
        $estudiante->save();

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
    public function getEstudiante($dni)
    {
        $Estudiante = User::where('dni', $dni)->get();

        return response()->json( $Estudiante );
    }
}
