<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Open+Sans&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/principal/style.css') }}">
</head>
<body>
    <header>
        <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">

        <nav>
            <ul class="menu">
                <li><a href="#Inicio">Inicio</a></li>
                <li><a href="">Sobre Nosotros</a></li>
                <li><a href="">Servicios</a></li>
                <li><a href="">Contacto</a></li>
                <li><a href="">Agendar Consulta</a></li>
                <li><a href="{{ route('verLogin') }}">Login</a></li>
            </ul>
        </nav> 
    </header>
    <div class="barra"></div>
    <div id="Inicio" class="Inicio">

        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Eligendi, neque consectetur minus id necessitatibus, dolores rerum eaque maiores nobis aliquid corrupti provident magni reiciendis possimus voluptate laborum unde! Delectus, nemo.</p>    

    </div>
    <div class="Agenda">
        <form action="">
            <div class="contenedor">
                <div class="left">
                    <div class="field">
                        <label for="Nombre">Nombre</label>
                        <input type="text" id="Nombre" require>
                    </div>
                    <br>
                    <div class="field">
                        <label for="Apellido">Apellido</label>
                        <input type="text" id="Apellido" require>
                    </div>
                    <br>
                    <div class="field">
                        <label for="TipoDocumento">Tipo Documento</label>
                            <select name="TipoDocumento" id="TipoDocumento">
                                <option value="">Seleccionar…</option>
                                <option>CI</option>
                                <option>Pasaporte</option>
                                <option>DNI</option>
                                <option>Otro</option>
                            </select>
                    </div>
                    <br>
                    <div class="field">
                        <label for="Documento">Documento</label>
                        <input type="number" id="Documento" require>
                    </div>
                    <br>
                    <div class="field">
                        <label for="Email">Email</label>
                        <input type="text" id="Email" require>
                    </div>
                    <br>
                    <div class="field">
                        <label for="Celular">Celular</label>
                        <input type="number" id="Celular">
                    </div>
                    <br>
                </div>
                <div class="right">
                    <label for="Observaciones">Observaciones</label><br>
                    <textarea name="Observaciones" id="Observaciones" placeholder="Escriba su disponibilidad para la agenda ..."></textarea>
                </div>
            </div>
        </form>


    </div>
</body>
</html>