<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title>Prontuário Eletrônico do Paciente</title>
    
        <!-- Fonts -->
        <link rel="dns-prefetch" href="//fonts.gstatic.com">
        <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
        <!-- Styles -->
        <link href="{{ asset('css/geral.css') }}" rel="stylesheet">
    
        <!-- CSS only -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    
        <!-- JS, Popper.js, and jQuery -->
        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
        <script src="js/dynamic_inputs.js"></script>
    
        <!-- Datatables -->
        <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.css">
        <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.js"></script>
        
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css" integrity="sha512-1PKOgIY59xJ8Co8+NE6FZ+LOAZKjy+KY8iq0G4B3CyeY6wYHN3yt9PW0XpSriVlkMXe40PTKnXrLnZ9+fkDaog==" crossorigin="anonymous" />
    
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.min.js"></script>

    </head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light shadow-sm" style="background-color: #2A75B2">
            <div class="container">
                <img src="img/pepchain.png" width="35px" style="padding-right: 5px">
                <a class="navbar-brand text-light" href="{{ url('/') }}">
                    Prontuário Eletrônico do Paciente
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">

                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link text-light" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                           <!-- @if (Route::has('register'))-->
                                <li class="nav-item">
                                    <div class="dropdown" style="color: #2A75B2">
                                        <button class="btn dropdown-toggle" style="color:white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('Cadastrar') }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="/register">Paciente</a>
                                            <a class="dropdown-item" href="/register-ps">Profissional da Saúde</a>
                                            <a class="dropdown-item" href="/register-is">Instituição de Saúde</a>
                                            <a class="dropdown-item" href="/register-lm">Laboratório Médico</a>
                                        </div>
                                        </div>
                                        <!--<a class="nav-link text-light" href="{{ route('register') }}">{{ __('Cadastrar') }}</a>-->
                                    </li>
                           <!--  @endif-->
                        @else
                            @if (Auth::user()->type != null)
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="/home">Home</a>
                                </li>

                                @if (Auth::user()->type == 1) <!--Paciente-->
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="/registers-patient-especific">Registros</a>
                                    </li>
                                @elseif(Auth::user()->type == 2 || Auth::user()->type == 3) <!--Profissional da Saúde ou Instituição de Saúde-->
                                    
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="/registers">Registros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="/patients">Pacientes</a>
                                    </li>

                                    <li class="nav-item">
                                    <div class="dropdown" style="color: #2A75B2">
                                        <button class="btn dropdown-toggle" style="color:white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('Registrar Laudo') }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="/register-anamnese">Anamnese</a>
                                            <a class="dropdown-item" href="/register-observation">Observação</a>
                                            <a class="dropdown-item" href="/register-diagnostic">Diagnóstico</a>
                                            <a class="dropdown-item" href="/register-medication">Medicação</a>
                                        </div>
                                        </div>
                                    </li>

                                    <!--<li class="nav-item">
                                        <a class="nav-link text-light" href="/register-observation">Anamnese</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="/register-observation">Observação</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="/register-diagnostic">Diagnóstico</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="/register-medication">Medicação</a>
                                    </li>-->
                                @elseif(Auth::user()->type == 4)
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="/registers">Registros</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="/patients">Pacientes</a>
                                    </li>

                                    <li class="nav-item">
                                    <div class="dropdown" style="color: #2A75B2">
                                        <button class="btn dropdown-toggle" style="color:white" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            {{ __('Registrar Laudo') }}
                                        </button>
                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                            <a class="dropdown-item" href="/register-diagnostic">Diagnóstico</a>
                                        </div>
                                        </div>
                                    </li>
                                    <!-- <li class="nav-item">
                                        <a class="nav-link text-light" href="/register-observation">Diagnóstico</a>
                                    </li>
                               @elseif(Auth::user()->type === 2)
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="/hei-register">Diploma Register</a>
                                    </li>
                                @elseif(Auth::user()->type === 3)
                                    <li class="nav-item">
                                        <a class="nav-link text-light" href="/se-register">Speciality Register</a>
                                    </li>-->
                                
                                @endif

                                <!--<li class="nav-item">
                                    <a class="nav-link text-light" href="/search">Search</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-light" href="/feedback">Feedback</a>
                                </li>-->
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        Olá, {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('perfil') }}">
                                            <i class="fa fa-user" style="padding-right: 5px"></i> Perfil
                                        </a>
                                        <a class="dropdown-item" href="/feedback">
                                            <i class="fa fa-comment-alt" style="padding-right: 5px"></i> Feedback
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                        <i class="fas fa-sign-out-alt"></i> {{ __('Sair') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @else
                                <!--<li class="nav-item">
                                    <a class="nav-link text-light" href="/feedback">feedback</a>
                                </li>-->

                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#"
                                        role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"
                                        v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('perfil') }}">
                                            <i class="fa fa-user"></i> Perfil
                                        </a>
                                        <a class="dropdown-item" href="/feedback">
                                            <i class="fa fa-comment-alt" style="padding-right: 5px"></i> Feedback
                                        </a>
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                            style="display: none;">
                                            @csrf
                                        </form>
                                        
                                    </div>
                                </li>
                            @endif

                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>


        <main class="py-4">
            @yield('custom-content-footer')
        </main>

    </div>
</body>

</html>
