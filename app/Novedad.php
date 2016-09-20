<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Novedad extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['titulo', 'fecha', 'copete','epigrafe','autor','foto','cuerpo','posteador'];
}