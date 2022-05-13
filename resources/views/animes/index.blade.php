@extends('layout')

@section('cabecalho')
    Minha Lista de Animes
@endsection

@section('conteudo')

@include('mensagem',['mensagem' => $mensagem])
  

@auth
<a href="{{route('adicionar_anime')}}" class="btn btn-dark mt-2 mb-2" >Adicionar</a>

@endauth


<ul class="list-group ">
  @foreach ($animes as $anime)
    <li  href="#"  class="list-group-item list-group-item-info d-flex justify-content-between align-items-center">
      <span id="nome-anime-{{ $anime->id }}">{{ $anime->nome }}</span>

        <div class="input-group w-50" hidden id="input-nome-anime-{{ $anime->id }}">
            <input type="text" class="form-control" value="{{ $anime->nome }}">
            <div class="input-group-append">
              <button class="btn btn-primary" onclick="editarAnime({{ $anime->id }})">
                <i class="fas fa-check"></i>
              </button>
              @csrf
            </div>
        </div>

    <span class="d-flex">
      @auth
      <button class="btn btn-info btn-sm me-1" onclick="toggleInput({{ $anime->id }})">
          <i class="fas fa-edit"></i>
      </button>
      @endauth
      <a href="/animes/{{ $anime->id }}/temporadas" class="btn btn-info btn-sm me-1">
          <i class="fas fa-external-link-alt"></i>
      </a>
      @auth
      <form method="post" action="/animes/{{ $anime->id }}"
            onsubmit="return confirm('Tem certeza que deseja remover {{ addslashes($anime->nome) }}?')">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm">
              <i class="far fa-trash-alt"></i>
          </button>
          <button  class="btn btn-primary btn-sm"  disabled="true"><i class="fa-solid fa-circle-plus"></i></button>
      </form>
      @endauth
    </span>
    </li>
  @endforeach
  <?php // print_r($animes)?> 
</ul>

<script>

  function toggleInput(animeId) {
    const nomeAnime = document.getElementById(`nome-anime-${animeId}`);
    const inputAnime = document.getElementById(`input-nome-anime-${animeId}`);
    if(nomeAnime.hasAttribute('hidden')){
      nomeAnime.removeAttribute('hidden');
      inputAnime.hidden = true;
    }else{
      inputAnime.removeAttribute('hidden');
      nomeAnime.hidden = true;
    }
    
  }
  function editarAnime(animeId){

    console.log('teste');
    let formData = new FormData();
    const nome = document.querySelector(`#input-nome-anime-${animeId} > input`).value;

    const token = document.querySelector('input[name="_token"]').value;
    

    
    formData.append('nome', nome);
    formData.append('_token',token);

    
    const url = `/animes/${animeId}/editaNome`;
    fetch(url,{ method: 'POST', body: formData
    }).then(()=>{
      toggleInput(animeId); 
      document.getElementById(`nome-anime-${animeId}`).textContent = nome;
    });
    
  }

</script>

@endsection
