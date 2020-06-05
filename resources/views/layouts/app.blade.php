<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">
    <!-- JQuery -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!-- MDB core JavaScript -->
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.8.9/js/mdb.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.0/jquery.slim.min.js" integrity="sha256-MlusDLJIP1GRgLrOflUQtshyP0TwT/RHXsI1wWGnQhs=" crossorigin="anonymous"></script>
    <title>{{ config('app.name', 'Fanshawe International Student') }}</title>

    <!-- Scripts -->    
 <script src="{{ asset('js/app.js') }}" defer></script>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Asap&display=swap" rel="stylesheet">
   
    <link href="{{ asset('css/btnStyle.css') }}" rel="stylesheet">
   
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/main.css') }}" rel="stylesheet">
    
</head>
<body >
    <div id="app" >
    <div class="font-style">
    <nav class="navbar navbar-expand-sm navbar-light" style="background-color: white;">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                <img src="{{ asset('images/logo.svg') }}"  class="logo" alt="logo">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav mr-auto">
                        @auth()
                            <div class="nav-item">
                            <a href="{{url('/forum')}}" class="nav-link"><i class="fas fa-home"></i></a>
                            </div>
                        @endauth
                    </ul>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}"><i class="fa fa-sign-in" aria-hidden="true"></i>{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}"><i class="fa fa-user-plus" aria-hidden="true"></i>{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            @unless(Auth::user()->unreadNotifications->isEmpty())
                            <li class="nav-item dropdown">
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                <i class="fas fa-bell"><span class="badge badge-danger">{{ auth()->user()->unreadNotifications->count() }}</i> </span> <span class="caret"></span>
                                </a>
                                
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    @foreach (auth()->user()->unreadNotifications as $notification)
                                    <a class="dropdown-item" href="#" 
                                    method="POST"><i class="fas fa-comment-dots">
                                    {{ Auth::user()->unreadNotifications->markAsRead()}}
                                        {{$notification->data['name']}}</i> commented at <strong>{{$notification->data['topicTitle']}}</strong>
                                        </a>
                                    @endforeach      
                                </div>
                            </li>
                            @endunless
                            <li class="nav-item dropdown">
                                
                                
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                              {{ Auth::user()->name }} <span class="caret"></span>
                                </a>
                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('topics.create')}}" method="POST"><i class="fas fa-pen"></i>Create Post</a>
                                    @if(auth()->user()->hasRole('admin'))
                                    <a href="{{url('/dashboard')}}" class="dropdown-item"><i class="fas fa-users"></i>List Users</a>
                                    @endif
                                    
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i class="fa fa-power-off" aria-hidden="true"></i>{{ __('Logout') }}
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
    </div>
</body>
</html>
