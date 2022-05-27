<x-layout  cabecalho="Ranking dos Animes">
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
          @if ($anime->status == 'pretendoAssistir')
            <td>Pretendo Assistir</td>
          @else
            <td>{{ucfirst($anime->status)}}</td>
          @endif
         
        </tr> 
      @endforeach
      <tbody>
        @foreach ($groupwithcount as $groups)    
          <tr>
            <th scope="row">{{$i++}}</th>
            <td>{{$groups->group->}}</a></td>
            <td>{{$groups->group['nome']}}</td>
            <td>t</td>
            <td>a</td>
          </tr> 
        @endforeach
        </tbody>
      </tbody>
    </table>
  </div>

</x-layout>