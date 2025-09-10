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
        <h2>Agenda</h2>
    </header>
    <div class="container">
        <div class="column-left">
            <form action="{{ route('Welcome') }}">
                <input type="submit" value="WELCOME">
            </form>

        </div>
        <div class="column-right">
        </div>
    </div>
</body>
</html>