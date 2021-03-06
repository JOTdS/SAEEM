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
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
</head>
<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('SAEEM', 'SAEEM') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @if (Auth::guard()->check())
                            <div class="dropdown">
                                <button class="dropbtn">Funcionário</button>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="{{route('/funcionario/cadastrar')}}">
                                        Novo Funcionário
                                    </a>
                                    <a class="dropdown-item" href="{{route('/funcionario/listar')}}">
                                        Listar Funcionários
                                    </a>
                                    <a class="dropdown-item" href="{{route('/funcionario/relatorios')}}">
                                        Relatório Funcionários
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="dropbtn">Aluno</button>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="{{route('/aluno/cadastrar')}}">
                                        Novo Aluno
                                    </a>
                                    <a class="dropdown-item" href="{{route('/aluno/listar')}}">
                                        Listar Alunos
                                    </a>
                                    <a class="dropdown-item" href="{{route('/aluno/listar/recupera')}}">
                                        Recupera Alunos
                                    </a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <button class="dropbtn">Escola</button>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="{{route('/escola/cadastrar')}}">
                                        Nova Escola
                                    </a>
                                    <a class="dropdown-item" href="{{route('/escola/listar')}}">
                                        Listar Escolas
                                    </a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <button class="dropbtn">Turma</button>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="{{route('/turma/cadastrar')}}">
                                        Nova Turma
                                    </a>
                                    <a class="dropdown-item" href="{{route('/turma/listar')}}">
                                        Listar Turmas
                                    </a>
                                </div>
                            </div>

                            <div class="dropdown">
                                <button class="dropbtn">Série</button>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="{{route('/serie/cadastrar')}}">
                                        Nova Série
                                    </a>
                                    <a class="dropdown-item" href="{{route('/serie/listar')}}">
                                        Listar Séries
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="dropbtn">Disciplina</button>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="{{route('/disciplina/cadastrar')}}">
                                        Nova Disciplina
                                    </a>
                                    <a class="dropdown-item" href="{{route('/disciplina/listar')}}">
                                        Listar Disciplinas
                                    </a>
                                    <a class="dropdown-item" href="{{route('/disciplina/relatorios')}}">
                                        Relatório Disciplinas
                                    </a>
                                </div>
                            </div>
                            <div class="dropdown">
                                <button class="dropbtn">Avaliação</button>
                                <div class="dropdown-content">
                                    <a class="dropdown-item" href="{{route('/avaliacao/cadastrar')}}">
                                        Nova Avaliação
                                    </a>
                                    <a class="dropdown-item" href="{{route('/avaliacao/listar')}}">
                                        Listar Avaliações
                                    </a>
                                    <a class="dropdown-item" href="{{route('/avaliacao/relatorios')}}">
                                        Relatórios Avaliações
                                    </a>
                                </div>
                            </div>
                        @endif
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
