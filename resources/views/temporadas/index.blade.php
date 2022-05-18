@extends('layout')

@section('cabecalho')
    Página de {{$anime->nome}}
@endsection

@section('conteudo')

<div class="container-top">
    <div class="row">
        <div class="col col-7">
            <h3>Sinopse</h3>
            <p> {{$anime->sinopse}}</p>
        </div>
        <div class="col col-2">
            <span class="">  Status</span>
            <select class="form-select" aria-label="Default select example">
                <option selected>{{$anime->status}}</option>
                <option value="1">Completado</option>
                <option value="2">Pretendo Assistir</option>
              </select>
        </div>
        <div class="col col-2">
            <span>  Nota</span>
            <select class="form-select" aria-label="Default select example">
                <option selected>{{$anime->rank}}</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
              </select>
        </div>
    </div>
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