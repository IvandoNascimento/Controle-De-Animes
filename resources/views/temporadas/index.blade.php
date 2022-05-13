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
            
            <li class="list-group-item  d-flex justify-content-between align-items-center">
                <a href="/temporadas/{{$temporada->id}}/episodios"> Temporada {{$temporada->numero}}</a>
                <span class="badge bg-primary rounded-pill">{{$temporada->getEpisodiosAssistidos()->count()}} / {{$temporada->episodios->count()}}</span>
            </li>
        @endforeach
        
    </ul>
    <div class="row">
        <div class="col col-13"></div>
        <div class="col col-1">
            <button class="btn btn-primary mt-2 " onclick="retornaPag()"><i class="fa-solid fa-arrow-rotate-left"></i></button>
        </div>
    </div>
</div>



<script>
    function retornaPag(){
     window.history.back();
}


</script>
@endsection