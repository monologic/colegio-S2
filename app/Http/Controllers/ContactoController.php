<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Colegio;
use Mail;

class ContactoController extends Controller
{
    public function send(Request $request){

   		$data = $request->all();
   		$nombre = $request->nombre;
   		$email = $request->email;
   		$subject = 'Contacto por Mail';
   		$colegio = Colegio::all();
      $to = $colegio[0]->email;
   		Mail::send('contacto.contactoMail', $data, function ($message) use($email, $nombre, $subject, $to){
		    $message->from($email, $nombre);
		    $message->subject($subject);
		    $message->to($to);
		});
		return redirect('mensajeenviado');

   }
}
