<!doctype html>

{{-- CONFIGURAÇÃO DO IDIOMA DO SISTEMA --}}
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <!-- META TAGS - WEB-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- TÍTULO DA APLICAÇÃO -->
    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- FavIcon -->
    <link rel="icon" href="{{ config('app.asset_path') }}/clapperboard.ico" type="image/x-icon">

    <!-- Fonts -->
    <link href="//fonts.bunny.net" rel="dns-prefetch">
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">

    <!-- DIRETIVA DO VITE PARA CARREGAMENTO DOS ASSETS -->
    {{-- @vite(['resources/sass/app.scss', 'resources/css/app.css', 'resources/js/app.js']) --}}
    
</head>
<body>
    <div id="app">
        <!-- Barra de navegação -->
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <!-- Logo do sistema com um link configurado-->
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                    <!-- <img src="https://bootstrapbrain.com/demo/components/logins/login-1/assets/img/bsb-logo.svg" alt="BootstrapBrain Logo" width="175" height="57"> -->
                </a>

                <!-- Botão para dispositivos moveis - Icone Hambúrguer -->
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <!-- Menu que será exibido nos dispositivos moveis -->
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav me-auto">
                        <!--
                            <li>
                                <a class="navbar-brand" href="{{ url('/') }}">{{ config('app.name', 'Laravel') }}</a>
                            </li>
                        -->
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ms-auto">

                        <!-- Authentication Links -->
                        {{-- RENDERIZA "@guest" PARA NÃO AUTENTICADOS E "@else" PARA AUTENTICADOS --}}
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Entrar') }}</a>
                                </li>
                            @endif
                            
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Crie sua conta') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <!-- <a href="#!" role="button" id="navbarDropdown" class="nav-link dropdown-toggle" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</a> -->
                                <button type="button" id="navbarDropdown" class="nav-link dropdown-toggle shadow-none" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>{{ Auth::user()->name }}</button>
                                
                                <!-- Menu dropdown com opções para o usuário logado -->                                
                                <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                    <!-- <a href="{{ route('logout') }}" class="dropdown-item" id="btnLogout">{{ __('Sair') }}</a> -->
                                    <a href="{{ route('logout') }}" class="dropdown-item classBtnLogout">{{ __('Sair') }}</a>

                                    <form id="logoutForm" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <!-- CONTEÚDO PRINCIPAL -->
        <main class="pt-4"> <!-- py-4 -->        
            @yield('content')
        </main>

        <!-- Data Tables JS -->
        <script src="{{ config('app.asset_path') }}/js/datatables.min.js"></script>
        
        <!-- JavaScript PADRÃO DA APLICAÇÃO -->
        <script src="{{ config('app.asset_path') }}/build/assets/app-DkTTh6p2.js"></script>
        
        <!-- JavaScript CUSTOMIZADO -->
        <script src="{{ config('app.asset_path') }}/js/custom.js"></script>

        {{-- EXIBE O RODAPÉ SOMENTE SE A SEÇÃO "footer" FOI DEFINIDA EM ALGUMA VIEW --}}
        @hasSection ('footer')
            <footer>        
                @yield('footer')
            </footer>
        @endif
    </div>
</body>
</html>
