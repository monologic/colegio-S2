<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comunicado extends Model
{
    public $timestamps = false;
    
    protected $fillable = ['fecha_pub', 'nombre', 'puesto_cargo','destinatario','asunto','cuerpo','imagen','posteador'];
}