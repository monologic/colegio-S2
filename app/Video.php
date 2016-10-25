<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class video extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['nombre', 'descripcion', 'url','posteador','fecha'];
}