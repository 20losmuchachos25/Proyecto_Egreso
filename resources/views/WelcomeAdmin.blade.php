<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/bienvenida/style.css') }}">

    <title>Welcome</title>
</head>
<body>
    <header>
        <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">
        <h2>WELCOME</h2>
    </header>
    <div class="container">
        <div class="column-left">
            <form action="{{ route('verRegistro') }}" method="GET">
                @csrf
                <input type="submit" value="Registro de Usuarios">
            </form>
            <br>
            <form action="{{ route('verGestor') }}">
                @csrf
                <input type="submit" value="Gestionar Usuarios">
            </form>
            <br>
            <form action="{{ route('Agenda') }}">
                @csrf
                <input type="submit" value="Agenda">
            </form>
            <br>
            <form action="{{ route('Clinicas') }}">
                @csrf
                <input type="submit" value="Clinicas">
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