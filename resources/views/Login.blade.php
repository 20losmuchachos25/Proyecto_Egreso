<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/Registro/style.css') }}">

</head>
<body>
    <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">

        @if ($errors->any())
                <div style="color: red;">
                    
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    
                </div>
        @endif
    <form action="{{ route('Login') }} " method="POST">
        @csrf
        <h1>Login</h1>
        <label for="Documento">Usuario</label>
        <input type="text" id="Documento" name="Documento" placeholder="Ingrese su usuario" required />
        <br>
        <br>
        <label for="Password">Contraseña</label>
        <input type="password" id="Password" name="Password" placeholder="Ingrese su contraseña" required />
        <br>
        <br>
        <button type="submit">Iniciar Sesión</button>
    </form>
</body>
</html>