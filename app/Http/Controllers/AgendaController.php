<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Agenda;

class AgendaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('agenda.ver');
    }

    public function getEntradasEstudiante($nivel, $grado, $seccion)
    {
        $entradas = \DB::table('agendas')
                       ->join('users', 'agendas.posteador', '=', 'users.id')
                       ->select('agendas.*', 'users.nombres', 'users.apellidos')
                       ->where([
                            ['agendas.nivel', '=', $nivel],
                            ['agendas.grado', '=', $grado],
                            ['agendas.seccion', '=', $seccion],
                        ])->orderBy('agendas.fecha_pub', 'desc')->get();

        return $entradas;
    }

    public function getEntradas()
    {
        if ( \Auth::user()->usuariotipo_id == 2 ) {
            $entradas = \DB::table('agendas')
                           ->join('users', 'agendas.posteador', '=', 'users.id')
                           ->select('agendas.*', 'users.nombres', 'users.apellidos')
                           ->where('posteador', \Auth::user()->id)->orderBy('fecha_pub', 'desc')->get();
        }
        if ( \Auth::user()->usuariotipo_id == 1 ) {
            $entradas = $this->getEntradasEstudiante(\Auth::user()->nivel, \Auth::user()->grado, \Auth::user()->seccion);
        }
        if ( \Auth::user()->usuariotipo_id == 5 ) {
            $hijos = \DB::table('tutors')
                ->join('users', 'users.dni', '=', 'tutors.dni_hijo')
                ->select('tutors.id as idTutor', 'users.*')
                ->where('user_id', \Auth::user()->id)
                ->get();

            $entradas;
            foreach ($hijos as $key => $hijo) {
                $hijo->agenda = $this->getEntradasEstudiante($hijo->nivel, $hijo->grado, $hijo->seccion);

                $entradas[] = $hijo;
            }
        }
        if ( \Auth::user()->usuariotipo_id == 3 || \Auth::user()->usuariotipo_id == 4 ) {
            $entradas = \DB::table('agendas')
                           ->join('users', 'agendas.posteador', '=', 'users.id')
                           ->select('agendas.*', 'users.nombres', 'users.apellidos')            
                           ->orderBy('fecha_pub', 'desc')->get();
        }

        return response()->json( $entradas );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('agenda.crear');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $agenda = new Agenda($request->all());
        
        if($request->file('imagen'))
        {
            $file = $request -> file('imagen');
            $name = 'imagen_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/agenda/";
            $file -> move($path,$name);
            $agenda->imagen = $name;
        }

        $agenda->save();
        return redirect('app/agenda');
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
        $agenda = Agenda::find($id);
        $agenda->fill($request->all());

        if($request->file('imagen'))
        {
            $file = $request -> file('imagen');
            $name = 'imagen_'. time() . '.' .$file->getClientOriginalExtension();
            $path=public_path() . "/imagen/agenda/";
            $file -> move($path,$name);
            $agenda->imagen = $name;
        }
        $agenda->save();
        return redirect('app/agenda');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Agenda::destroy($id);

        return $this->getEntradas();
    }
}
