<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>@yield('title')</title>
    @yield('head')
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.3/css/all.css" integrity="sha384-UHRtZLI+pbxtHCWp1t77Bi1L4ZtiqrqD80Kn4Z8NTSRyMA2Fd33n5dQ8lWUE00s/" crossorigin="anonymous">
</head>
<body>

    <div id="app">
        <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <a class="navbar-brand" href="/">Blog</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="navbar-nav mr-auto">
                <li class="nav-item {{ Request::is('/') ? 'active' : '' }}">
                    <a class="nav-link" href="/">Strona Domowa <span class="sr-only">(current)</span></a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Nowości</a>
                  </li>
                  <li class="nav-item {{ Route::currentRouteNamed('adventure.index') ? 'active' : '' }}">
                    <a class="nav-link" href="{{route('adventure.index')}}">Przygody</a>
                  </li>
                  <li class="nav-item">
                    <a class="nav-link" href="#">Informacje</a>
                  </li>
              </ul>
              <form class="form-inline my-2 my-lg-0">
              @if (Auth::check())
                <div class="dropdown">
                  <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    {{Auth::user()->name}}
                  </button>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                    
                    <a class="dropdown-item" href="#">Panel Urzytkownika </a>
                    @if (Auth::user()->role->name == "admin" )
                      <a class="dropdown-item" target="blank" href="{{route('voyager.dashboard')}}">Panel Adminsistratora</a>
                    @endif
                    <a class="dropdown-item" href="{{route('logout')}}">Wyloguj</a>

                    
                  </div>
                </div>
              @else
                <a href="{{route('login')}}" class="btn btn-outline-light"><i class="fas fa-user"></i></a>
              @endif
              

              </form>
            </div>
          </nav>

        @yield('content')
    </div>
    <script src="{{mix('js/app.js')}}"></script>
</body>
</html>