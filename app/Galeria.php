<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Galeria extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['nombre', 'descripcion', 'estado','imagen','albun_id'];

    public function albun()
  	{
  		return $this->belongsTo('App\Albun');
  	}
}