<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\User;

class UserController extends Controller
{
	public function vistaEstudiantes()
	{
		return view('estudiantes.ver');
	}
	public function getEstudiantes()
	{
		$users = User::where('usuariotipo_id', 1)->get();
		return response()->json( $users );
	}
	public function vistaCrearEstudiante()
	{
		return view('estudiantes.crear');
	}
	public function editarUsuario(Request $request)
	{
		if (\Hash::check($request->password, \Auth::user()->password )) {
			
			$user = User::find(\Auth::user()->id);
			$user->password = bcrypt($request->password1);
			$user->save();

			return response()->json([
	            "msg" => '1'
	        ]);

		}
		else {
			return response()->json([
	            "msg" => '0'
	        ]);
		}
		/*

		if(\Auth::user()->usuario != $request->usuario){
			$ct = User::where('usuario', $request->usuario)->get();
			$ct = count($ct);
		}
		if ($ct == 0) {
			
			$user->usuario = $request->usuario;
			if ($request->password) {
				
			}    	
			
			
		}
		else{
			
		}*/
	}
	
}