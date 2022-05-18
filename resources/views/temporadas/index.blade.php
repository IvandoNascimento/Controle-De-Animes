@extends('layout')

@section('cabecalho')
    Página de {{$anime->nome}}
@endsection

@section('conteudo')

<div class="container-top">
    <h3>Sinopse</h3>
    <p> {{$anime->sinopse}}</p>
</div>
<div class="container-mid">
    <h3>Temporadas</h3>
    <ul class="list-group">
        @foreach ($temporadas as $temporada)
            <div class="border-b border-gray-50 rounded p-6  mt-2">
                <li class="list-group-item list-group-item-info d-flex justify-content-between align-items-center">
                    <a href="/temporadas/{{$temporada->id}}/episodios"> Temporada {{$temporada->numero}}</a>
                    <span class="badge bg-primary rounded-pill">{{$temporada->getEpisodiosAssistidos()->count()}} / {{$temporada->episodios->count()}}</span>
                </li>
            </div>
        @endforeach
        
    </ul>

</div>


@endsection