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

    @include('pages.partials.head_scripts')
    @yield('add_head_scripts')
</head>

<body class=" overflow-hidden">
    @yield('script_brain_tree')
    <div id="app" class="d-flex flex-column vh-100 overflow-hidden">

        <div class="d-flex flex-grow-1 h-100 overflow-hidden">
            {{-- Sidebar Large --}}
            <div class="d-none d-md-block h-100">
                @include('pages.partials.sidebar_lg')
            </div>
            {{-- Sidebar MD SM --}}
            <div class="d-md-none">
                @include('pages.partials.sidebar_sm')
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
</body>

</html>
