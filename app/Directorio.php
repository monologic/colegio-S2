<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Directorio extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['titulo', 'nombre', 'cargo','foto','email'];
}