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

        {{-- Main content --}}
        <main class="d-flex">
            <div class="creationCol leftCol">
                <div class="logoCol">
                    <img src="{{asset('/img/logo-light.png')}}" alt="Logo BoolBnb" width="120">
                </div>
                <div class="h-100 d-flex align-items-center">
                    <h1 class="text-white">@yield('page-title')</h1>
                </div>
            </div>
            <div class="creationCol rightCol">
                @yield('content')
            </div>
        </main>

    </div>
</body>

</html>
