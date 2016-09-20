<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Institucional extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['nombre	', 'descripcion', 'imagen'];
}