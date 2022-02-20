<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    @yield('add_head_scripts')
</head>

<body class=" overflow-hidden">
    @yield('script_brain_tree')
    <div id="app" class="d-flex flex-column vh-100 overflow-hidden">



        <div class="d-flex flex-grow-1 h-100 overflow-hidden">
            {{-- sidebar on the left --}}
            <div class="dashboard-sidebar flex-shrink-0 d-flex flex-column  p-3 text-white bg-dark" style="width: 280px">
                <a href="/" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-white text-decoration-none">
                    <svg class="bi me-2" width="40" height="32">
                        <use xlink:href="#bootstrap"></use>
                    </svg>
                    <span class="fs-4">Dashboard</span>
                </a>
                <hr />
                <ul class="nav nav-pills flex-column mb-auto flex-grow-1">
                    <li class="nav-item">
                        <a href="/dashboard" class="nav-link {{ Request::is('dashboard') ? 'active' : 'text-white' }}" aria-current="page">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#home"></use>
                            </svg>
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/profile" class="nav-link {{ Request::is('dashboard/profile') ? 'active' : 'text-white' }}">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#speedometer2"></use>
                            </svg>
                            Il mio profilo
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/conversations" class="nav-link {{ Request::is('dashboard/conversations') ? 'active' : 'text-white' }}">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#table"></use>
                            </svg>
                            Messaggi
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/reviews" class="nav-link {{ Request::is('dashboard/reviews') ? 'active' : 'text-white' }} ">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#grid"></use>
                            </svg>
                            Recensioni
                        </a>
                    </li>
                    <li>
                        <a href="/dashboard/subscriptions" class="nav-link  {{ Request::is('dashboard/subscriptions') ? 'active' : 'text-white' }} ">
                            <svg class="bi me-2" width="16" height="16">
                                <use xlink:href="#people-circle"></use>
                            </svg>
                            Premium
                        </a>
                    </li>
                </ul>
                <hr />
                <div class="dropdown">
                    <a href="#" class="d-flex align-items-center text-white text-decoration-none dropdown-toggle" id="dropdownUser1" data-bs-toggle="dropdown" aria-expanded="false">
                        <img src="https://github.com/mdo.png" alt="" width="32" height="32" class="rounded-circle me-2" />
                        <strong>
                            {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }}
                        </strong>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-dark text-small shadow" aria-labelledby="dropdownUser1">
                        <li><a class="dropdown-item" href="/dashboard/profile">Profile</a></li>
                        <li>
                            <hr class="dropdown-divider" />
                        </li>
                        <li>
                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault();
                                        document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>

                            {{-- <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault() document.getElementById('logout-form').submit();">
                            Logout
                            </a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form> --}}
                        </li>
                    </ul>
                </div>
            </div>



            {{-- main content --}}
            <div class=" flex-grow-1 d-flex flex-column overflow-scroll">
                {{-- @include('pages.partials.navbar') --}}
                <main class=" flex-grow-1">
                    @yield('content')
                </main>
                <the-footer></the-footer>
            </div>
        </div>
    </div>



    </div>
</body>

</html>
