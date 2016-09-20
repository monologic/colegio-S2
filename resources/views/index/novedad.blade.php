@extends('welcome')

@section('title', 'Novededades')

@section('content')
    <div class="row" style="width: 100%">
    @foreach ($novedades as $novededa)
        <div class="col-md-12 col-xs-10">
             <article class="noticia ve">
                <header>
                    <div class="title">
                        <h2><a>{{ $novededa->titulo }}</a></h2>
                        <blockquote>{{ $novededa->copete }}</blockquote>                      
                    </div>
                    <div class="meta">

                        <time class="published" datetime="2015-11-01">{{ $novededa->fecha }}</time>
                        <a href="#" class="author"><span class="name">{{ $novededa->autor }}</span><img src="../images/avatar.jpg" alt="" /></a>
                    </div>
                </header>
                <a href="#" class="image featured"><img src="../imagen/novedades/{{ $novededa->foto }}" alt="" /></a>
                <p class="text-center" style="margin-top: -45px">{{ $novededa->epigrafe }}</p>
                <p>{!! $novededa->cuerpo !!}</p>
            </article>
        </div>
        @endforeach
    </div>
    
@endsection