<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/png" sizes="32x32" href="/img/favicon.png">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'SiSeDe') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="/bower_components/bootstrap/dist/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="/bower_components/font-awesome/css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="/bower_components/Ionicons/css/ionicons.min.css">
    @yield('style')
</head>
<body>
    <div id="app" style="height: 10%;">
        <nav class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">

                    <!-- Collapsed Hamburger -->
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse" aria-expanded="false">
                        <span class="sr-only">Toggle Navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                     <img src="/img/logo.png"  style="width: 28px; padding-top: 10px" alt="">
                    <!-- Branding Image -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        {{ config('app.name', 'SiSeDe') }}
                    </a>
                </div>

                <div class="collapse navbar-collapse" id="app-navbar-collapse">
                    <!-- Left Side Of Navbar -->
                    <ul class="nav navbar-nav">
                        &nbsp;
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        @if (Auth::check())
                            <li>
                                <a href="{{ url('/home') }}" class="submit">Regresar al Inicio</a>
                            </li>
                        @endif
                    </ul>
                    <!-- Right Side Of Navbar -->
                    <ul class="nav navbar-nav navbar-right">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Ingresar</a></li>
                            <li><a href="{{ route('register') }}">Registrarse</a></li>
                        @else
                            <div class=" links">
                               
                            </div>
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name}}<span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Cerrar Sesión
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                            
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>
        <div class="row">
            <div class="col-md-12">
                <div class="panel ">
                    <div class="panel-heading"><center>Acceso al Sistema de Información para el seguimiento de las demandas en el Tribunal de lo Contencioso Administrativo del Estado de Colima</center></div>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
    <footer style="height: 20%; position: fixed; bottom: 0px; width: 100%; ">
        <div class="col-md-12 navbar-static-bottom">
            <div class="panel panel-default">
                <div class="panel-body">
                    <center> Dirección Francisco Zarco #1460, Colonia Girasoles</center>
                    <center>Teléfono: <strong>01 312 314 8203 </strong></center>
                    <center>C.P. 28018, Colima, Colima, México</center>
                    <center>contencioso@tcacolima.org.mx </center>
                    <center>© Derechos Reservados Agosto 2017. Tribunal de lo Contencioso Administrativo del Estado de Colima</center>
                </div>
            </div>
        </div>
    </footer>
    <!-- Scripts -->
    <script src="/js/jquery-2.2.4.min.js"></script>
    @yield('script')
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
