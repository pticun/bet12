<html>
<head>
    <title>FootBall Betting System</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>

  <div class='container'>
    <nav class="navbar navbar-default">
    
    <div class="container-fluid">
        <div class="navbar-header">
        <a class="navbar-brand">FootBall Betting System</a>
        </div>
        <ul class="nav navbar-nav">
        </ul>
    <!-- Right Side Of Navbar -->
    <ul class="nav navbar-nav navbar-right">
        <!-- Authentication Links -->
        @if (Auth::guest())
            <li><a href="{{ route('login') }}">Login</a></li>
            <li><a href="{{ route('register') }}">Register</a></li>
        @else
            @if( Auth::user()->level == 0)
            <li style="margin-top: 10px; margin-left: -150px;"><strong>Current Money: </strong>{{ Auth::user()->total_money }}</li>
            @endif
            <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                    {{ Auth::user()->name }} <span class="caret"></span>
                </a>

                <ul class="dropdown-menu" role="menu">
                    <li>
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
</nav>
<div class='container'>
    @yield('main')
</div>
  <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>