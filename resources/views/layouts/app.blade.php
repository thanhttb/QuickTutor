<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    {{-- <title>{{ config('app.name', 'Laravel') }}</title> --}}

    <!-- Styles -->
    {{-- <link href="/css/app.css" rel="stylesheet"> --}}
    <link href="/css/freelancer.css" rel="stylesheet">
    <link href="/css/boostrap-flatly.css" rel="stylesheet">
    <link href="/css/select2-bootstrap.css" rel="stylesheet" />
    <link href="/css/bootstrap-switch.min.css" rel="stylesheet">

    <!-- Scripts -->
    <link href="/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,400italic,700italic" rel="stylesheet" type="text/css">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    @yield('header')

</head>
<body>
    <!-- <nav class="navbar navbar-default navbar-static-top"> -->
    <nav class="navbar navbar-default navbar-custom">
        <div class="container-fluid">
            <div class="navbar-header">

                <!-- Collapsed Hamburger -->
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
                    <span class="sr-only">Toggle Navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>

                <!-- Branding Image -->
                <a class="navbar-brand" href="{{ url('/') }}">
                    <b>{{ config('app.name', 'Laravel') }}</b>
                </a>
            </div>

            <div class="collapse navbar-collapse" id="app-navbar-collapse">
                <!-- Left Side Of Navbar -->
                <ul class="nav navbar-nav">
                    &nbsp;
                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="nav navbar-nav navbar-right">
                    <!-- Authentication Links -->
                    <li>
                        <a href="{{ url('/about') }}" class="navLink">
                            About Team
                        </a>
                    </li>
                    <li>
                        <a href="{{ url('/contact') }}" class="navLink">
                            Contact
                        </a>
                    </li>
                    @if (Auth::guest())
                        <li><a href="{{ url('/login') }}"  class="navLink">Login</a></li>
                        <li><a href="{{ url('/register') }}" class="navLink">Register</a></li>
                    @else
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle navLink" data-toggle="dropdown" role="button" aria-expanded="false">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu" role="menu">
                                <li>
                                    <a href="{{ url('/logout') }}"
                                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Logout
                                    </a>

                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </li>


                                <li>
                                    <a href="{{ url('/profile'.'/'.Auth::user()->id) }}">
                                        View Profile <!-- {{Auth::user()->id}} -->
                                    </a>

                                    {{-- <form id="profile" action="{{ url('/profile') }}" method="GET" style="display: none;">
                                        {{ csrf_field() }}
                                    </form> --}}
                                </li>

                                <li>
                                    <a href="{{ url('#') }}">
                                        Hướng dấn sử dụng
                                    </a>
                                </li>

                            </ul>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        @yield('content')
    </div>
    <script src="/js/jquery-3.1.1.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>


    <script src="/js/select2.min.js"></script>
    <script src="/js/bootstrap-switch.min.js"></script>
    <script>
        $(".navLink").hover(function(){
                $(this).css({"background-color": "#99c93d", "color": "#2c3e50"});
            }, function(){
                $(this).css({"background-color": "#2c3e50", "color": "#ffffff"});
        });
    </script>
    <!-- Scripts -->
    {{-- <script src="/js/app.js"></script> --}}
    @yield('footer')
    @include('layouts.footer')
</body>
</html>
