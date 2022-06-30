<x-layout  cabecalho="Página de {{$anime->nome}}">
    <div class="container-top">
        <div class="row">
            <div class="col col-7">
                <h3>Sinopse</h3>
                <p> {{$anime->sinopse}}</p>
            </div>
            
            <div class="col col-3">
                <span class="">  Status </span>
                <select id="opt" class="form-select" aria-label="Default select example">
                    <option {{$anime->status == 'completado' ? 'selected ' : ''}} value=completado>Completado</option>
                    <option {{$anime->status == 'assistindo' ? 'selected ' : ''}} value=assistindo>Assistindo</option>
                    <option {{$anime->status == 'pretendoAssistir' ? 'selected ' : ''}} value=pretendoAssistir>Pretendo Assistir</option>
                </select>
            </div>
            <div class="col col-2">
                <span>  Nota </span>
                <select id="opt" class="form-select " aria-label="Default select example" >
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
        
        const opcoes = document.querySelectorAll("#opt");
        opcoes.forEach((opt) => {
            opt.addEventListener("change", (evento) => {
                console.log(evento);
                console.log(evento.target.value);
                
                atualiza({{$anime->id}},evento.target.value);
            })
            
        });
        function mudar(opt){
            console.log("teste");
            atualiza(evento.target.value,{{$anime->id}});
        }
       
        function atualiza(animeId,dado){
            let formData = new FormData();
            
            const status = opcoes[0].value;
            const rank = opcoes[1].value;
            console.log("dado");
            console.log(status);
            console.log(rank);
            
            const token = document.querySelector('input[name="_token"]').value;
            formData.append('rank', rank);
            formData.append('status', status);
            //formData.append('dado',dado);
            formData.append('_token',token);

            //const url = `/animes/${animeId}/temporadas/edit`;
            const url = `temporadas/edit`;
            
            fetch(url,{ method: 'POST', body: formData
            
            });
            
        }
        
    </script>
</x-layout>
