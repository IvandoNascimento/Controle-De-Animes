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
            <p>anime user id {{$anime->user_id}}</p>
            <p>user id {{$user->id}}</p>
        </div>
        <div class="col col-3">
            <span class="">  Status </span>
            <select id="opt1" class="form-select" aria-label="Default select example"
             onchange="atualiza(this.options[this.selectedIndex].value,{{$anime->id}})" >
                <option {{$anime->status == 'assistindo' ? 'selected' : 'value=assistindo'}}>Assistindo</option>
                <option {{$anime->status == 'completado' ? 'selected' : 'value=completado'}}>Completado</option>
                <option {{$anime->status == 'pretendoAssistir' ? 'selected' : 'value=pretendoAssistir'}}>Pretendo Assistir</option>
            </select>
        </div>
        <div class="col col-2">
            <span>  Nota </span>
            <select id="opt2" class="form-select " aria-label="Default select example" 
            onchange="atualiza(this.options[this.selectedIndex].value,{{$anime->id}})">
                <option  {{$anime->rank == 1 ? 'selected' : 'value=1'}}>1</option>
                <option  {{$anime->rank == 2 ? 'selected' : 'value=2'}}>2</option>
                <option  {{$anime->rank == 3 ? 'selected' : 'value=3'}}>3</option>
                <option  {{$anime->rank == 4 ? 'selected' : 'value=4'}}>4</option>
                <option  {{$anime->rank == 5 ? 'selected' : 'value=5'}}>5</option>
                <option  {{$anime->rank == 6 ? 'selected' : 'value=6'}}>6</option> 
                <option  {{$anime->rank == 7 ? 'selected' : 'value=7'}}>7</option> 
                <option  {{$anime->rank == 8 ? 'selected' : 'value=8'}}>8</option> 
                <option  {{$anime->rank == 9 ? 'selected' : 'value=9'}}>9</option> 
                <option  {{$anime->rank == 10 ? 'selected' : 'value=10'}}>10</option>       
            </select>
        </div>
        @csrf
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

<script>
    function atualiza(selecionado,animeId){
        let formData = new FormData();
        const token = document.querySelector('input[name="_token"]').value;
        formData.append('nome', selecionado);
        formData.append('_token',token);

        const url = `/animes/${animeId}/temporadas/edit`;
        fetch(url,{ method: 'POST', body: formData
        });
    }
</script>
@endsection