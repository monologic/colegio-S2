<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Enlace extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['nombre', 'imagen','url'];
}