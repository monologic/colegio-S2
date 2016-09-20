<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Colegio extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['nombre', 'direccion', 'email','facebook','twiter','youtube','telefono','region','ciudad','url'];
}