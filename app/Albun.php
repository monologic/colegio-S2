<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Albun extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['nombre', 'nombre','descripcion', 'epigrafe', 'activo'];

    public function album()
    {
        return $this->hasMany('App\Galeria');
    }
}