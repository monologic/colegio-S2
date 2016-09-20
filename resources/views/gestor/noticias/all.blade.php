@extends('welcome')

@section('title', 'Todas las noticias')

@section('content')
    
    <div class="row">
    @foreach ($noticias as $noticia)
        <div class="col-md-12">
             <article class="noticia ve" >
                <header>
                    <div class="title">
                        <h2><a>{{ $noticia->titulo }}</a></h2>
                        <blockquote>{{ $noticia->copete }}</blockquote>                      
                    </div>
                </header>
                <a href="#" class="image featured"><img src="imagen/noticia/{{ $noticia->foto }}" alt="" /></a>
                <p class="text-center" style="margin-top: -45px;text-align: left;">{{ $noticia->epigrafe }}</p>
                <footer>
                    <ul class="actions">
                        <li><a href="noticias/{{ $noticia->id }}"  class="button big">Noticia Completa</a></li>
                    </ul>
                </footer>
            </article>
        </div>
        @endforeach
       {!! $noticias->render() !!} 
    </div>
    
@endsection