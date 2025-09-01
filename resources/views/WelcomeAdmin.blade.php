<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
</head>
<body>
    <form action="{{ route('verRegistro') }}">
        <input type="submit" value="Registro de Usuarios">
    </form>
    <form action="{{ route('verGestor') }}">
        <input type="submit" value="Gestionar Usuarios">
    </form>
    <form action="{{ route('verLogin') }}">
        <input type="submit" value="Cerrar Sesion">
    </form>
</body>
</html>