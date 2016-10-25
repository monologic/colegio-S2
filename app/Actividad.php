<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Actividad extends Model
{
    public $timestamps = false;
	protected $fillable = ['tipo','responsable','titulo', 'fecha_creacion', 'fecha_inicio','fecha_fin','descripcion','lugar', 'participantes','usuario_id'];

    public function usuario()
  	{
  		return $this->belongsTo('App\User');
  	}
}
