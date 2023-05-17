<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.5.1/css/bootstrap.min.css">
    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <header class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container">
            <nav class="navbar-nav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ route('dashboard.dashboard') }}" class="nav-link">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('estudiantes.index') }}">Estudiantes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('carreras.index') }}">Carreras</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header> 

    <div id="app">
        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <!-- Bibliotecas de Bootstrap y jQuery -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.5.1/js/bootstrap.bundle.min.js"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
    </script>
</body>
</html>
