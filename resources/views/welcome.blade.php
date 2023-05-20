<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido</title>
    <link href="{{ asset('../resources/css/app.css') }}" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">¡Bienvenido!</div>
                    <div class="card-body">
                        <div class="text-center">
                            <a href="{{ route('login') }}" class="btn btn-primary">Iniciar Sesión</a>
                            <a href="{{ route('register') }}" class="btn btn-secondary">Registrarse</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>