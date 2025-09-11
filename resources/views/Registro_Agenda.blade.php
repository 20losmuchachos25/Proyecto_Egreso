<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/agenda/style.css') }}">
</head>
<body>
    <header>
        <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">
        <h2>Registro de Agendas</h2>
    </header>
    <div class="container">
        <div class="column-left">
            <form action="{{ route('verLogin') }}">
                <input type="submit" value="Cerrar Sesion">
            </form>
        </div>
        <div class="column-right">
            <form action="{{ route('RegistrarAgenda') }} " method="POST">
                @csrf
                <label for="fecha">Fecha</label>
                <input type="date" id="Fecha" name="Fecha">
                <br>
                <label for="hora">Hora</label>
                <input type="time" id="Hora" name="Hora">
                <br>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
    
</body>
</html>