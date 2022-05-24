<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
    <script src="https://kit.fontawesome.com/059f12be04.js" crossorigin="anonymous"></script>
    <title>Controle de animes</title>
</head>
<body>
<div id="site">
  <header class="sticky-top">
  <nav class="navbar navbar-expand-xl navbar-light" style="background-color: #4A235E" >
    <div class="container-fluid d-flex">
      <div class="collapse navbar-collapse j" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          
          <li class="nav-item ms-2" >
            <a class="nav-link active"  style="color: white ;"  aria-current="page" href="/animes/">Home</a>
          </li>
          <li class="nav-item ms-2">
            <a class="nav-link active"  style="color: white" href="{{route('animes.ranking')}}">Ranking</a>
          </li>
        </ul>     
        @auth
        <div class="dropdown">
          <button class="btn btn-primary  dropdown-toggle  " style="background-color: #14879C ; " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sobre
          </button>
          <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('sobre.index')}}">Quem sou eu</a>            
            <a class="dropdown-item" target="_blank" rel="noopener noreferrer" href="https://myanimelist.net/">My Anime List</a>
          </div>
        </div>      
        <div class="btn">
          <a href="{{route('sair')}}" class="btn btn-primary" style="background-color:#AD1D1A">Logout</a>
        </div>
        @endauth
        @guest
        <a  class="nav-link active" style="color: white" href="/entrar">Entrar</a>
        @endguest
      </div>
    </div>
  </nav>
  </header>  
  <main class="pt-1 mt-1" style="min-height: 470px" >
  <div class="container" >
    <div class="jumbotron" >
        <h1 class="mt-2">@yield('cabecalho')</h1>
    </div>
    @yield('conteudo')
    </div>
  </main>
  <footer class="footer mt-auto py-2 bg-light position-relative bottom-0 ">
  <div class="container">
    <div class="row ms-4 mt-4"> 
      <div class="col-6 ">
        <h4>Copyright</h4>
        <span>Todos os direitos reservados</span>
      </div>
      <div class="col-1 ">
        <br>
        <span>Contatos</span>    
      </div>
      <div class="col-3 ">
        <br>
        <span >Nascimentodoivan@gmail.com</span>
      </div>
      <div class="col-2 ">
        <a class="me-2" href="https://github.com/IvandoNascimento" target="_blank"  rel="noopener noreferrer" >
          <img src="{{url('/storage/images/GitHub-Mark-64px.png')}}" alt="Logo do GitHub" width="60">
        </a>
        <a target="_blank" href="https://www.linkedin.com/in/ivan-do-nascimento-ferreira-3763681aa/" rel="noopener noreferrer">
          <img src="{{url('/storage/images/Li-In-Bug.png')}}" alt="Logo do LinkedIn" width="60" height="50">
        </a>
      </div> 
    </div>
  </div>
  </footer>
</div>
<script>
  function dropDowm() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
  
</script>
</body>
</html>