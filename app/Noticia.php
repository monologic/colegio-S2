<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Noticia extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['titulo', 'fecha', 'copete','epigrafe','autor','foto','cuerpo','posteador'];
}