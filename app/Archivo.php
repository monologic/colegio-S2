<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Archivo extends Model
{

	protected $fillable = ['titulo', 'autor', 'pub_lugar','pub_editorial','pub_year','edicion','calificacion','archivo','archivotipo_id','posteador','decripcion'];

  	public function archivotipo()
  	{
  		return $this->belongsTo('App\Archivotipo');
  	}
  	public function scopeSearch($query, $titulo, $tipo)
  	{
  		if ($tipo == "?")
  			return $query->where('titulo', 'LIKE', "%$titulo%")->orWhere('autor', 'LIKE', "%$titulo%")->orWhere('pub_lugar', 'LIKE', "%$titulo%")->orWhere('pub_editorial', 'LIKE', "%$titulo%")->orWhere('decripcion', 'LIKE', "%$titulo%");
  		else{
        if ($titulo != null) {
          return $query->where(function ($q)use($titulo) {
                $q->where('titulo', 'LIKE', "%$titulo%")->orWhere('autor', 'LIKE', "%$titulo%")->orWhere('pub_lugar', 'LIKE', "%$titulo%")->orWhere('pub_editorial', 'LIKE', "%$titulo%")->orWhere('decripcion', 'LIKE', "%$titulo%");
            })->where('archivotipo_id', '=', $tipo);
        }
  		}
  	}
}
