<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunidad extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['inicial', 'primaria','secundaria','valores','reglamento','convivencia'];
}