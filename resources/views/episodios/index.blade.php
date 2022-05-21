@extends('layout')

@section('cabecalho')
    Episodios 
@endsection

@section('conteudo')
@include('mensagem',['mensagem'=> $mensagem])
<div class="container">
    <form action="/temporadas/{{$temporadaId}}/episodios/assistir" method="post">
        @csrf
        <ul class="list-group ">
            <div class="row">
            @foreach ($episodios as $episodio)
                <div class="col-3 rounded mt-2">
                    <li class="list-group-item list-group-item list-group-item-info " >
                        Episodio {{$episodio->numero}}
                        <input class="form-check-input" type="checkbox" id="mycheck" name="episodios[]" value="{{$episodio->id}}" 
                        {{$episodio->assistido ? 'checked' : ''}} >
                        
                    </li>
                </div>
            @endforeach
        </div>
        </ul>
        <div class="btn">
            <button class="btn btn-primary">Salvar</button>
        </div>
    </form>
    <div class="row"></div>
    <button class="btn btn-primary" onclick="marcaTudo()">Marcar todos</button>
</div>
<script>
    function marcaTudo(){

        var $inputs = document.getElementsByTagName('input');
        var i = 0;
        var cont = 1;
        for(i=0; i<$inputs.length;i++){
            if($inputs[i].checked == true){
                cont++;
            }
        }
        
        i = 0;
        if(cont < $inputs.length || cont == 0){
            for(i=0; i<$inputs.length;i++){
                $inputs[i].checked = true;
        }
        }else{
            for(i=0; i<$inputs.length;i++){
                $inputs[i].checked = false;
            }
        }
    }
</script>
@endsection