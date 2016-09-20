<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Nosotro extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['bienvenida', 'vision','mision','historia'];
}