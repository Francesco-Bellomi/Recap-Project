<nav class="navbar navbar-expand-xl navbar-dark bg-dark sticky-top">
    <div class="container-fluid ">
        <a class="navbar-brand fs-3 title fw-bold title-font" href="{{ route('homepage') }}">RecapOnline</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            @guest
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('login') }}">Fai il Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('register') }}">Registrati</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('contact') }}">Contattaci</a>
                    </li>
                </ul>
            @else
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link " aria-current="page" href="{{ route('homepage') }}">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('category.index') }}">Lista Categorie</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('article.index') }}"> Lista Articoli</a>
                    </li>

                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Ciao , {{ Auth::user()->name }}
                        </a>
                        <ul class="dropdown-menu bg-dark " aria-labelledby="navbarDropdown">
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                                    onclick="event.preventDefault();document.getElementById('form-logout').submit();">Logout</a>
                            </li>
                            <form method="POST" action="{{ route('logout') }}" id="form-logout">
                                @csrf
                            </form>
                            <li>
                                <a class="dropdown-item" href="{{ route('category.create') }}">Crea Categoria</a>
                            </li>
                            <li>
                                <a class="dropdown-item" href="{{ route('article.create') }}">Aggiungi Articolo</a>
                            </li>
                            <li>
                                <a class="dropdown-item " aria-current="page" href="{{ route('contact') }}">Contattaci</a>
                            </li>
                        </ul>
                    </li>
                </ul>
            @endguest
        </div>
    </div>
</nav>
