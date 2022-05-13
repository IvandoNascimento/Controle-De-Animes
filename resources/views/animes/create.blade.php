@extends('layout')

@section('cabecalho')
  Adicionar anime
@endsection

@section('conteudo')
@include('erros',['errors' => $errors])

<form method="post">
  @csrf
  <div class="form-control">
    <div class="row mb-2">
      <div class="col col-8">
      <label for="nome">Nome</label>
          <input type="text" class="form-control" name="nome" id="nome">
      </div>
      <div class="col col-2">
      <label for="qtd_temporadas">N° Temporadas</label>
          <input type="number" class="form-control" name="qtd_temporadas" id="qtd_temporadas">
      </div>
      <div class="col col-2">
      <label for="ep_temporada">Ep por Temporada</label>
          <input type="number" class="form-control" name="ep_temporada" id="ep_temporada">
      </div>
    </div>
    
  <label for="sinopse">Sinopse</label>
  <textarea type="text-field" class="form-control" name="sinopse" id="sinopse"></textarea>
  <!--
  <select class="form-group mt-2 " aria-label="Default select example" name="episodios">
  <option selected>Selecione quantidade de ep</option>
  <option value="1">12</option>
  <option value="2">24</option>
  <option value="3">+24</option>
  </select>
-->
  </div>
  <button class="btn btn-dark mt-2">Adicionar</button>
  </form>
@endsection