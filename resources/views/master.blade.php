<!DOCTYPE html>
<html>
<head>
        <meta charset="UTF-8">
        <title>PrintIt</title>
        <!-- Latest compiled and minified CSS & JS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link rel="stylesheet" href="/css/style.css">
</head>
<body>
    <div class="container">
        <div class="masthead">
            <div>
                <div class="jumbotron">    
                    <h1 class="letraTitulo">PrintIt</h1>
                </div>
                <!--<ul class="nav nav-pills pull-right">
                    
                    <li>
                        <a class="letra" href="{{route('logout')}}">Log Out</a>
                    </li>
                    <li>
                        <a class="letra" href="{{route('login')}}">Log In</a>
                    </li>
                    <li>
                        <a class="letra" href="{{route('register')}}">Registar</a>
                    </li>
                </ul>-->
                <ul class="nav nav-pills pull-right">
                        <!-- Authentication Links -->
                        @if (Auth::guest())
    
                            <li><a href="{{route('users.showUsers')}}">Contactos</a></li>
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li><a href="{{route('users.showUsers')}}">Contactos</a></li>
                            @if(Auth::user()->isAdmin())
                            <li>
                        <a class="letra" href="{{route('users.usersBlock')}}">Administração</a>
                    </li>
                    @endif
                            <li class="dropdown">
                            
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu" role="menu">
                                    <li>
                                        <a href="{{ route('users.showUserPerfil', Auth::user()) }}">
                                            Perfil
                                        </a>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endif
                    </ul>
            </div>
            <div>
                <ul class="nav nav-tabs">
                @if (Auth::guest())
                    <li>
                        <a class="letra" href="{{route('home')}}">Home</a>
                    </li>
                @else
                    <li>
                        <a class="letra" href="{{route('home')}}">Home</a>
                    </li>
                    <li>
                        <a class="letra" href="{{route('requests.showRequests')}}">Pedidos</a>
                    </li>  
                @endif                 
                </ul>
            </div>
            </div>
        <div>
            <h2 class="letraTitulo">@yield('´pageName')</h2>
        </div>
        @yield('content')
        <div class="container">
            <div class="footer letra">
                </br>
                <p>Projeto AINET 2016/2017</p>
                <p>Martinho Gonçalves | Rute Leite Ferreira | Patricia Pedrosa </p>
            </div>
        </div>
    </div>
    <script src="//code.jquery.com/jquery.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
</body>
</html>
