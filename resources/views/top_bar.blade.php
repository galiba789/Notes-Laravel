
<nav class="navbar navbar-dark navbar-expand-lg">
    <div class="container">
        <a class="navbar-brand" href="#">Meu App de Notas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#notas">Notas</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('new')}}" data-bs-toggle="modal" data-bs-target="#novaNota">Criar Nota</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Perfil</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('logout')}}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
