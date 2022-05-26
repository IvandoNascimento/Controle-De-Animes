<x-layout  cabecalho="Adicionar anime">
  <x-mensagem :mensagens="$mensagens">{{$mensagens}}</x-mensagem>
  
  <x-erros :errors="$errors" >{{$errors}}</x-erros>
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

    </div>
    <button class="btn btn-success mt-2">Adicionar</button>
  </form>
</x-layout>
