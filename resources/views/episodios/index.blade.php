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
                <div class="col-4">
                    <li class="list-group-item" >
                        Episodio {{$episodio->numero}}
                        <input class="form-check-input" type="checkbox" name="episodios[]" value="{{$episodio->id}}" 
                        {{$episodio->assistido ? 'checked' : ''}} >
                        
                    </li>
                </div>
            @endforeach
        </div>
        </ul>
        <div class="btn">
            <button class="btn btn-primary ">Salvar</button>
            <button class="btn btn-primary  " onclick="retornaPag()"><i class="fa-solid fa-arrow-rotate-left"></i></button>
        </div>
    </form>
</div>
<script>
    function retornaPag(){
     window.history.back();
}
</script>
@endsection