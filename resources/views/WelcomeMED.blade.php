<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bienvenida/style.css') }}">

</head>
<body>
    <header>
        <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">
        <h2>WELCOME</h2>
    </header>
    <div class="container">
        <div class="column-left">
            <form action="{{ route('AgendasClinicas') }}" method="">
                @csrf
                <input type="submit" value="Clinica - Agendas">
            </form>
            <br>
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <input type="submit" value="Cerrar Sesión">
            </form>

        </div>
        <div class="column-right">
        </div>
    </div>
</body>
</html>
