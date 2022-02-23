<nav class="navbar navbar-expand-lg navbar-light bg-light custom-navbar">
    <div class="container-fluid">
        <div class="navbar-brand">
            <a href="/">
                <img class="navbar-img" src="/img/logo_large.png" alt="logo-medicall" style="width:200px" />
            </a>
        </div>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0 flex-grow-1 justify-content-end">
                <li class="nav-item text-center"><a class="nav-link mx-3" href="/">Home</a></li>
                <li class="nav-item text-center"><a class="nav-link mx-3" href="/search">Ricerca</a></li>
                {{-- <li><a href="">Servizi</a></li>
                <li><a href="">Contatti</a></li> --}}
                @auth
                    <li class="nav-item text-center">
                        <a class="nav-link mx-3" href="/dashboard">Dashboard</a>
                    </li>
                @endauth
            </ul>
            {{-- <div class="text-end" style="width: 200px"> --}}
            <button class="btn btn-primary">
                @guest
                    <a href="/login">Accedi</a>
                @endguest

                @auth
                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                        Logout
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                @endauth
            </button>
            {{-- </div> --}}
        </div>
    </div>
</nav>