<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fuera de Servicio</title>
</head>
<body>
    <h1>ESTA PAGINA SE ENCUENTRA EN DESARROLLO</h1>
    <p>
        <?php 
            echo session('Documento'); 
        ?>
    </p>
    <br>
    <form action="{{ route('logout') }}" method="POST">
        @csrf
        <input type="submit" value="Cerrar Sesión">
    </form>
</body>
</html>