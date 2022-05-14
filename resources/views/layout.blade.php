<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://kit.fontawesome.com/059f12be04.js" crossorigin="anonymous"></script>
    <style>
      /* The container <div> - needed to position the dropdown content */
      .dropdown {
        position: relative;
        display: inline-block;
      }
      
      /* Dropdown Content (Hidden by Default) */
      .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        border-radius: 5px;
        min-width: 100px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
        
      }
      /* Show the dropdown menu on hover */
      .dropdown:hover .dropdown-content {
        display: block;
        
      }
      
      /* Change the background color of the dropdown button when the dropdown content is shown */
      .dropdown:hover .dropdown-content {
        /*background-color: #3e8e41;*/
        
      }
      .dropdown-item:hover{
        background-color:deepskyblue;
        
        border-radius: 5px;
      }
     
     

      </style>
    <title>Controle de animes</title>
</head>
<body>

<header>
      {{--!style="background-color: #1786d4 ;" --}}
  <nav class="navbar navbar-expand-xl navbar-light" style="background-color: #4A235E" >
    <div class="container-fluid d-flex justify-content-xl-end">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon">Lista de Animes</span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav me-auto mb-2 mb-lg-0 ">
          <li class="nav-item " >
            <a class="nav-link active"  style="color: white"  aria-current="page" href="/animes/">Home</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link active a-primary"  style="color: white" href="{{route('login')}}">Login</a>
          </li>
        </ul>
        @auth
        
        <div class="dropdown">
          <button class="btn btn-primary  dropdown-toggle  " style="background-color: #14879C ; " type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            Sobre
          </button>
          <div class="dropdown-content" aria-labelledby="dropdownMenuButton">
            <a class="dropdown-item" href="{{route('sobre.index')}}">Quem sou eu</a>
            
            <a class="dropdown-item" href="https://myanimelist.net/">My Anime List</a>
          </div>
        </div>
      
        <div class="nav-item ">
          <button href="/sair" class="btn btn-primary ms-4 me-4  " style="background-color:#AD1D1A">Logout</button>
        </div>
        @endauth
        @guest
        <a href="/entrar">Entrar</a>
        @endguest
      </div>
    </div>
  </nav>
</header>  

<main>
  <div class="container">
    <div class="jumbotron" >
        <h1 class="mt-2">@yield('cabecalho')</h1>
    </div>
    @yield('conteudo')
    </div>
</main>


<footer class="footer mt-auto py-2 bg-light fixed-bottom"   >
  <div class="container"  >
    <div class="row mt-4"> 
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
          <img src="{{url('/storage/images/GitHub-Mark-64px.png')}}" alt="Logo do GitHub" width="50">
        </a>
        <a target="_blank" rel="noopener noreferrer">
          <img src="{{url('/storage/images/Li-In-Bug.png')}}" alt="Logo do LinkedIn" width="50" height="50">
        </a>
      </div> 
    </div>
  </div>
</footer>

  








<script>
  function dropDowm() {
    console.log('teste');
    document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown menu if the user clicks outside of it
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