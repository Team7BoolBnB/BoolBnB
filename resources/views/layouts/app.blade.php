<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/backend.js') }}" defer></script>
    

    <!-- Fonts -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css"
        integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>

<body>
    <div id="app">

        {{-- Navbar --}}
        <nav class="navbar navbar-expand-md navbar-light bg-white">
            <div class="container-fluid d-flex justify-content-between">

                {{-- Logo --}}
                <div>
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('/img/logo.png') }}" alt="BoolBnb Logo" width="120">
                    </a>
                </div>
                <div>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                            aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                    </button>
                </div>

                {{-- Menu --}}
                <div class="collapse navbar-collapse justify-content-center bg-nav" id="navbarText">
                    <a class="nav-link {{ Request::route()->getName() === 'admin.home' ? 'navActivePage' : '' }}" aria-current="page" href="/admin">Dashboard</a>
                    <a class="nav-link {{ Request::route()->getName() === 'admin.accommodation.index' ? 'navActivePage' : '' }}" href="{{ route('admin.accommodation.index') }}">Accommodations</a>
                    <a class="nav-link {{ Request::route()->getName() === 'admin.sponsorship.index' ? 'navActivePage' : '' }}" href="{{ route('admin.sponsorship.index') }}">Sponsorships</a>
                    
                {{-- User --}}


                <div class="login-no">
                    <span class="navbar-text d-flex">
                            <div class="nav-item dropdown nav-link">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                            </div>
                    </span>
                </div>
                </div>
                {{-- User --}}
                <div class="login-view">
                    <span class="navbar-text">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <div class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Ciao, {{ Auth::user()->firstName }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                            document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        @endguest
                    </span>
                </div>
            </div>
        </nav>

        {{-- Main content --}}
        <main>
            @yield('content')
        </main>

    </div>
</body>

</html>
