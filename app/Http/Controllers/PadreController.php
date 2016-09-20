<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;
use App\Tutor;
use App\Colegio;

class PadreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('padres.ver');
    }

    /**
     * Listado de padres
     *
     * @return \Illuminate\Http\Response
     */
    public function get()
    {
        $users = User::where('usuariotipo_id', 5)->get();
        return response()->json( $users );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('padres.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $padre = new User($request->all());
        $padre->usuariotipo_id = 5;
        $padre->usuario = $request->dni;
        $padre->password = bcrypt($request->dni);

        $padre->save();
        return redirect('app/padres');
        
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
        $padre = User::find($id);
        $padre->fill($request->all());
        $padre->save();

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

    public function vistaAsignarHijos()
    {
        return view('padres.asignarHijos');
    }

    public function getPadre($dni)
    {
        $padre = User::where('dni', $dni)->get();

        return response()->json( $padre );
    }
    public function asignarHijo($dni, $id)
    {
        $tutor = new Tutor();
        $tutor->dni_hijo = $dni;
        $tutor->user_id = $id;

        $tutor->save();

        return $this->getHijosPadre($id);
        
    }
    public function getHijosPadre($id)
    {
        $hijos = \DB::table('tutors')
            ->join('users', 'users.dni', '=', 'tutors.dni_hijo')
            ->select('tutors.id as idTutor', 'users.*')
            ->where('user_id', $id)
            ->get();

        return response()->json( $hijos );
    }
    public function getHijosPadreActual()
    {

        $hijos = \DB::table('tutors')
            ->join('users', 'users.dni', '=', 'tutors.dni_hijo')
            ->select('tutors.id as idTutor', 'users.*')
            ->where('user_id', \Auth::user()->id)
            ->get();

        $col = Colegio::all();
        return view('usuarios.notas', ['colegio' => $col[0] ])->with('hijos', $hijos);
    }
    
    public function eliminar($id)
    {
        $tut = Tutor::find($id);
        $padreID = $tut->user_id;

        Tutor::destroy($id);

        return $this->getHijosPadre($padreID);
    }

}
