@extends('welcome')

@section('title', 'Todas los comunicados')

@section('content')
    
    <div class="" style="width: 100%">
    @foreach ($comunicados as $comunicado)
        <div class="col-md-12">
             <article class="noticia ve"  >
                <header>
                    <div class="title">
                        <h2><a>{{ $comunicado->asunto }}</a></h2>
                        <blockquote>Para: {{ $comunicado->destinatario }}</blockquote>                      
                    </div>
                    <div class="meta">

                        <time class="published" datetime="2015-11-01">{{ $comunicado->fecha_pub }}</time>
                        <p class="text-center">{{ $comunicado->puesto_cargo }}</p>
                        <a href="#" class="author"><span class="name">{{ $comunicado->nombre }}</span></a>

                    </div>
                </header>
                <p>{{ $comunicado->cuerpo }}</p>
            </article>
        </div>
        @endforeach
        {!! $comunicados->render() !!} 
    </div>
    
@endsection