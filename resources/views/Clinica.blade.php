<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/clinica/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tables/table.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

</head>
<body>
    <div>
        <header>
            <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">
            <h2>CLINICA</h2>
        </header>

        <div class="container">
            <div class="column-left">
                <form action="{{ route('Welcome') }}">
                    <input type="submit" value="WELCOME">
                </form>
            </div>
            <div class="column-right">
                <button><i class="fa-solid fa-plus"></i> Agregar</button>
                <button><i class="fa-solid fa-minus"></i> Quitar</button>
                <button><i class="fa-solid fa-pen"></i> Editar</button>
                <button><i class="fa-solid fa-trash"></i> Eliminar</button>
            </div>
        </div>
    </div>
</body>
</html>
