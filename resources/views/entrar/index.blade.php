<x-layout  cabecalho="Página de login">
    <x-erros :errors="$errors" >{{$errors}}</x-erros>
    <form method="post">
        @csrf
        <div class="form-group">
            <label for="email">E-mail</label>
    <input type="email" name="email" id="email" required class="form-control">
        </div>
        <div class="form-group">
            <label for="password">Senha</label>
            <input type="password" name="password" id="password" required min="1" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary mt-3">
            Entrar
        </button>
        <a href="/registrar" class="btn btn-secondary mt-3">
            Registrar-se
        </a>
    </form>

</x-layout>