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
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link href="{{ asset('../resources/css/app.css') }}" rel="stylesheet">
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">

    <!-- Biblioteca de jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- JavaScript de Bootstrap -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    @if(Auth::check())
    <header class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>Menu
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <div class="navbar-nav">
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('coordinadores.index') }}">Coordinadores</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('estudiantes.index') }}">Estudiantes</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('profesores.index') }}">Profesores</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('carreras.index') }}">Carreras</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('proyectos.index') }}">Proyectos</a>
                    </div>
                    <div class="nav-item">
                        <a class="nav-link" href="{{ route('tutorias.index') }}">Tutorias</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="navbar-nav ml-auto">
            <div class="nav-item">
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link btn btn-link">{{ Auth::user()->name }} - Cerrar sesión</button>
                </form>
            </div>
        </div>
    </header>
    
    
    
    
    @endif
    <div id="app">
        <main class="py-4">
        @if(empty(trim($__env->yieldContent('content'))))
            <script>window.location.href = "{{ route('dashboard') }}";</script>
        @else
            @yield('content')  
        @endif
        </main>
    </div>

    <!-- Bibliotecas de Bootstrap y jQuery -->
    <script src="{{ asset('../resources/js/app.js') }}"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        //chech de form proyecti
        function toggleEstudianteP2(checked) {
            var estudianteP2Select = document.getElementById('idEstudiante_p2');
            estudianteP2Select.disabled = !checked;
        }
        //modal de form proyecto
        $(document).ready(function() {
        $('#estadoModal').on('shown.bs.modal', function() {
            $(this).find('.modal-dialog').css({
                width: 'auto',
                height: 'auto',
                'max-height': '80%'
            });
        });
    });
    $(document).ready(function() {
        $('#estadoModal').modal('hide'); // Ocultar el modal al cargar la página
    });
    </script>
</body>
</html>
