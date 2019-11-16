<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
    <title>@yield('title')</title>
    
    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans|Raleway|Candal">
    <link rel="stylesheet" href="{{asset('css/app.css')}}" type="text/css" media="screen"/>
    
    
    <link rel="stylesheet" href="{{asset('bower_components/font-awesome/css/font-awesome.min.css')}}">
    
    <script src="{{asset('/bower_components/jquery/dist/jquery.js')}}"></script>
    
    <!-- Styles -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    
    <link rel="stylesheet" type="text/css" href="{{asset('css/Medilab/css/style.css')}}">
    
    <link rel="stylesheet" href="https://bootstrapmade.com/demo/assets/css/normalize.css">
  
</head>
<body style="background-color: #e9ebee">
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light  shadow-sm " style="background-color:#00838f;" >
        <div class="container-fluid">
            <a class="navbar-brand ml-5" href="{{ url('/') }}" style="color: white; font-weight: bolder;">
        
                <h2 style="color:white;">{{ config('app.king', 'MDL') }}</h2>
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
                    aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                <span class="navbar-toggler-icon"></span>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              
                
                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto"  id="myNavbar">
                    <li class="nav-item active "><a class="nav-link" style="color: white;" href="/#banner" >Home</a></li>
                    <!-- Authentication Links -->
                    @guest
                    <li class="nav-item" >
                        <a class="nav-link" href="{{ route('login') }}" style="color: white;">{{ __('Login') }}</a>
                    </li>
                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}" style="color: white;">{{ __('Register') }}</a>
                        </li>
                    @endif
                    @else
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link " href="#" role="button" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre style="color: white;">
                                {{ Auth::user()->name }} <span class="caret"></span>
                            </a>
                            
                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    {{ __('Logout') }}
                                </a>

                                   <a class="dropdown-item" href="/home">Home
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        @endguest
                        <li class="nav-item" >
                            <a href="/store" class="nav-link" style="color: white;">Store</a>
                        </li>
        
                        <li class="nav-item"><a class="nav-link" style="color: white;" href="/#service">Services</a></li>
                        <li class="nav-item"><a class="nav-link" style="color: white;" href="/#testimonial">Testimonial</a></li>
                        <li class="nav-item"><a class="nav-link" style="color: white;" href="/#about-us">About</a></li>

                </ul>
            </div>
        </div>
    </nav>
    
    <main class="py-4">
        @yield('content')
    </main>
</div>
<script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
    @else
        @if(Session::has('error'))
            toastr.error("{{ Session::get('error') }}");
    @endif
    @endif
</script>
@yield('scripts')

</body>
</html>
