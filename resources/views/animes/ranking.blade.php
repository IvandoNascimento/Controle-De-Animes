@extends('layout')

@section('cabecalho')
  Ranking dos Animes
@endsection

@section('conteudo')



<div>
  <table class="table table-light table-striped">
    <thead class="table-dark" >
      <tr>
        <th  scope="col">Rank</th>
        <th scope="col">Anime</th>
        <th scope="col">Pontuação</th>
        <th scope="col">Sua pontuação</th>
        <th>Status</th>
      </tr>
    </thead>
    <tbody>
    @foreach ($animes as $anime)
      
      <tr>
        <th scope="row">{{$i++}}</th>
        <td><a href="/animes/{{ $anime->id }}/temporadas">{{$anime->nome}}</a></td>
        <td>{{$anime->rank}}</td>
        <td>{{$anime->rank}}</td>
        <td></td>
      </tr>
    
    @endforeach
    </tbody>
  </table>
</div>

@endsection