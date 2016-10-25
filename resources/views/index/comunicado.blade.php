@extends('welcome')

@section('title', 'Comunicado')

@section('content')
    <div class="" style="width: 100%">
        <div class="row">
            @foreach ($comunicados as $comunicado)
            <div class="col-md-12 col-xs-10">
                 <article class="noticia ve"  >
                    <header>
                        <div class="title">
                            <h2><a>{{ $comunicado->asunto }}</a></h2>
                            <blockquote>Para : {{ $comunicado->destinatario }}</blockquote>                      
                        </div>
                        <div class="meta">

                            <time class="published" datetime="2015-11-01">{{ $comunicado->fecha_pub }}</time>
                            <p class="text-center">{{ $comunicado->puesto_cargo }}</p><br>
                            <p class="text-center">{{ $comunicado->nombre }}</p>

                        </div>
                    </header>
                    <p>{{ $comunicado->cuerpo }}</p>
                </article>
            </div>
            @endforeach
        </div>
    
    </div>
    
@endsection