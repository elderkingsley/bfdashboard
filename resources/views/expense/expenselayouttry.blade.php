<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Backyard Farms') }}</title>
    <link rel="stylesheet" href="{{ asset('main/css/style.css') }}">
    <link href='https://cdn.boxicons.com/3.0.3/fonts/basic/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://kit.fontawesome.com/78813c08bd.js" crossorigin="anonymous"></script>


    </head>
<body>
    <nav class="navbar">
        <div class="navbar-container">
            <a class="navbar-logo" href="{{ url('/home') }}">
                {{ config('app.name', 'Laravel') }}
            </a>   
            <button class="navbar-toggle">
                <span class="bar"></span>    
                <span class="bar"></span> 
                <span class="bar"></span> 
            </button>    
            <!-- Authentication Links -->
                @guest
                    @if (Route::has('login'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                        </li>
                    @endif

                    @if (Route::has('register'))
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                        </li>
                    @endif
                @else
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            {{ Auth::user()->name }}
                        </a>
                        <ul class="navbar-menu">
                            <li><a class="dropdown-item" href="{{ route('home') }}">Home</a></li>
                            <li><a class="dropdown-item" href="{{ route('expense.index') }}">Expense List</a></li>
                            <li><a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                                {{ __('Logout') }}
                            </a></li>
                        </ul>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                @csrf
                            </form>
                                
                            
                        
                    @endguest
        </div>            
    </nav>
            @yield('content')
                
    
</body>

</html>
