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
            {{-- Mensajes de validación --}}
            @if ($errors->any())
                <div style="color: red;">
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                </div>
            @endif

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div style="color: green;">
                    {{ session('success') }}
                </div>
            @endif
            <form action="{{ route('RegistrarAgenda') }} " method="POST">
                @csrf
                <label for="fecha">Fecha</label>
                <input type="date" id="Fecha" name="Fecha">
                <br>
                <label for="hora">Hora</label>
                <input type="time" id="Hora" name="Hora">
                <br>
                <label for="Motivo">Motivo</label>
                <textarea name="Motivo" id="Motivo" placeholder="Detalle motivo ..."></textarea>
                <br>
                <input type="submit" value="Enviar">
            </form>
        </div>
    </div>
    
</body>
</html>