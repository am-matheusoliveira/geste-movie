<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    
    
    <!-- CSS PADRÃO DA APLICAÇÃO -->    
    <link href="{{ config('app.asset_path') }}/build/assets/app-D-sv12UV.css" rel="stylesheet">

    <!-- CSS DO PLUGIN SELEC2 -->
    <link href="{{ config('app.asset_path') }}/build/assets/app-BnsfhC-g.css" rel="stylesheet">

    <!-- Data Tables CSS -->
    <link href="{{ config('app.asset_path') }}/css/datatables.min.css" rel="stylesheet">
    
    <!-- CSS CUSTOMIZADO -->
    <link href="{{ config('app.asset_path') }}/css/custom.css" rel="stylesheet">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!-- Scripts -->
    {{-- @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js']) --}}
    
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                
                <strong><a class="navbar-brand" href="{{ url('/') }}"> {{ config('app.name', 'Laravel') }} </a></strong>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Realizar login') }}</a>
                                </li>
                            @endif
                            <li class="nav-item">
                                <span class="nav-link">{{ __('|') }}</span>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Crie sua conta') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Sair') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="pt-4"> <!-- py-4 -->
            @yield('content')
        </main>

        <!-- Data Tables JS -->
        <script src="{{ config('app.asset_path') }}/js/datatables.min.js"></script>
        
        <!-- JavaScript PADRÃO DA APLICAÇÃO -->
        <script src="{{ config('app.asset_path') }}/build/assets/app-DkTTh6p2.js"></script>

        <!-- JavaScript CUSTOMIZADO -->
        <script src="{{ config('app.asset_path') }}/js/custom.js"></script>
                
        @hasSection ('footer')
            @yield('footer')
        @endif
    </div>
</body>
</html>
