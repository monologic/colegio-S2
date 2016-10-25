<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\User;
use App\Actividad;
use App\Video;
use App\Noticia;
use App\Novedad;
use App\Comunicado;
use App\Http\Requests;

class EstadisticasController extends Controller
{
    public function getDatos($dni)
	{
		$users = User::where('dni', $dni)
					  ->get();
		$idp = $users[0]->id;
		//return response()->json( $idp );
		$Ractividad = $this->getActividades($idp);
		$Rvideo = $this->getVideos($idp);
		$Rnoticia = $this->getNoticias($idp);
		$Rnovedad = $this->getNovedad($idp);
		$Rcomicado = $this->getComunicado($idp);
		$all[] = $Ractividad;
		$all[] = $Rvideo;
		$all[] = $Rnoticia;
		$all[] = $Rnovedad;
		$all[] = $Rcomicado;
		return response()->json( $all );
	}
	public function getActividades($id)
	{
		$r = \DB::table('actividads')
    	          ->select(DB::raw('fecha_creacion as x, COUNT(id) as y'))
    	          ->where('usuario_id',$id)
    	          ->whereRaw("MONTH(fecha_creacion)<=MONTH (NOW()) and YEAR(fecha_creacion)<=YEAR(NOW())")
    	          ->groupBy(DB::raw('MONTH(fecha_creacion)'))
    	          ->get();

    	return $r;

	}
	public function getVideos($id)
	{
		$r = \DB::table('videos')
    	          ->select(DB::raw('fecha as x, COUNT(id) as y'))
    	          ->where('posteador',$id)
    	          ->whereRaw("MONTH(fecha)<=MONTH (NOW()) and YEAR(fecha)<=YEAR(NOW())")
    	          ->groupBy(DB::raw('MONTH(fecha)'))
    	          ->get();

    	return $r;
	}
	public function getNoticias($id)
	{
		$r = \DB::table('noticias')
    	          ->select(DB::raw('fecha as x, COUNT(id) as y'))
    	          ->where('posteador',$id)
    	          ->whereRaw("MONTH(fecha)<=MONTH (NOW()) and YEAR(fecha)<=YEAR(NOW())")
    	          ->groupBy(DB::raw('MONTH(fecha)'))
    	          ->get();

    	return $r;
	}
	public function getNovedad($id)
	{
		$r = \DB::table('novedads')
    	          ->select(DB::raw('fecha as x, COUNT(id) as y'))
    	          ->where('posteador',$id)
    	          ->whereRaw("MONTH(fecha)<=MONTH (NOW()) and YEAR(fecha)<=YEAR(NOW())")
    	          ->groupBy(DB::raw('MONTH(fecha)'))
    	          ->get();

    	return $r;
	}
	public function getComunicado($id)
	{
		$r = \DB::table('comunicados')
    	          ->select(DB::raw('fecha_pub as x, COUNT(id) as y'))
    	          ->where('posteador',$id)
    	          ->whereRaw("MONTH(fecha_pub)<=MONTH (NOW()) and YEAR(fecha_pub)<=YEAR(NOW())")
    	          ->groupBy(DB::raw('MONTH(fecha_pub)'))
    	          ->get();

    	return $r;
	}
}
