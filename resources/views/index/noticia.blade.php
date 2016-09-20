@extends('welcome')

@section('title', 'Noticias')

@section('content')
    <div style="width: 100%;margin: 10px auto 10px auto">
    <div class="row">
        @foreach ($noticias as $noticia)
        <div class="col-md-12 col-xs-10">
             <article class="noticia ve" >
                <header>
                    <div class="title">
                        <h2><a>{{ $noticia->titulo }}</a></h2>
                        <blockquote style="text-align: left;">{{ $noticia->copete }}</blockquote>                      
                    </div>
                </header>
                <a href="#" class="image featured"><img src="../imagen/noticia/{{ $noticia->foto }}" alt="" /></a>
                <p class="text-center" style="margin-top: -45px">{{ $noticia->epigrafe }}</p>
                <div class="notautor">
                        <time class="published" datetime="2015-11-01"><b>Fecha : </b> {{ $noticia->fecha }}</time><br>
                        <span class="name"><b>Autor : </b> {{ $noticia->autor }}</span>
                </div>
                <p>{!! $noticia->cuerpo !!}</p>
            </article>
        </div>
        @endforeach
    </div>
    
    </div>
    
@endsection