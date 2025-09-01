<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Open+Sans&family=Montserrat&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/Registro/style.css') }}">

    <title>Registro de Usuarios</title>

</head>
<body>
  <div>  
    <header>
        <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">
                    <h2>REGISTRO DE USUARIOS</h2>

    </header>
    <div class="container">
        <div class="column-left">
            <form action="{{ route('Welcome') }}">
                    <input type="submit" value="WELCOME">
            </form>
        </div>
        <div class="column-right">
            {{-- Mensajes de validación --}}
            @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Mensaje de éxito --}}
            @if(session('success'))
                <div style="color: green;">
                    {{ session('success') }}
                </div>
            @endif

            <form id="registroForm" action="{{ route('NuevoUsuario') }}" method="POST">
                @csrf
                <div class="grid">
                <div class="field">
                <label class="label" for="Tipo_Documento">Tipo de documento</label>
                <select class="select" id="Tipo_Documento" name="Tipo_Documento">
                    <option value="">Seleccionar…</option>
                    <option>CI</option>
                    <option>Pasaporte</option>
                    <option>DNI</option>
                    <option>Otro</option>
                </select>
                </div>
                <br>
                <div class="field">
                <label class="label" for="Documento">Documento</label>
                <input class="input" type="text" id="Documento" name="Documento" placeholder="Ej: 4.123.456-7" />
                </div>
                <br>
                <div class="field">
                <label class="label" for="Primer_Nombre">Primer Nombre</label>
                <input class="input" type="text" id="Primer_Nombre" name="Primer_Nombre" placeholder="Primer Nombre" />
                </div>
                <br>
                <div class="field">
                <label class="label" for="Segundo_Nombre">Segundo Nombre</label>
                <input class="input" type="text" id="Segundo_Nombre" name="Segundo_Nombre" placeholder="Segundo Nombre" />
                </div>
                <br>
                <div class="field">
                <label class="label" for="Primer_Apellido">Primer Apellido</label>
                <input class="input" type="text" id="Primer_Apellido" name="Primer_Apellido" placeholder="Primer Apellido" />
                </div>
                <br>
                <div class="field">
                <label class="label" for="Segundo_Apellido">Segundo Apellido</label>
                <input class="input" type="text" id="Segundo_Apellido" name="Segundo_Apellido" placeholder="Segundo Apellido" />
                </div>
                <br>
                <div class="field">
                <label class="label" for="Edad">Edad</label>
                <input class="input" type="number" id="Edad" name="Edad" />
                </div>
                <br>
                <div class="field">
                <label class="label" for="Fecha_Nacimiento">Fecha de nacimiento</label>
                <input class="input" type="date" id="Fecha_Nacimiento" name="Fecha_Nacimiento" />
                </div>
                <br>
                <div class="field">
                <span class="label">Sexo</span>
                <div class="inline">
                    <label class="chip"><input type="radio" name="Sexo" value="Femenino" /> F</label>
                    <label class="chip"><input type="radio" name="Sexo" value="Masculino" /> M</label>
                    <label class="chip"><input type="radio" name="Sexo" value="X" /> X</label>
                </div>
                </div>
                <br>
                <div class="field">
                <label class="label" for="Celular">Celular</label>
                <input class="input" type="tel" id="Celular" name="Celular" placeholder="Ej: 091 234 567" />
                </div>
                <br>
                <div class="field row">
                <label class="label" for="Email">Email</label>
                <input class="input" type="email" id="Email" name="Email" placeholder="nombre@dominio.com" />
                </div>
                <br>
                <div class="field">
                <label class="label" for="Mutualista">Mutualista</label>
                <select class="select" id="Mutualista" name="Mutualista">
                    <option value="">Seleccionar…</option>
                    <option>ASSE</option>
                    <option>CRAMI</option>
                    <option>MEDICA URUGUAYA</option>
                    <option>Otro</option>
                </select>
                </div>
                <br>
                <div class="field">
                <label class="label" for="Rol">Tipo de Usuario</label>
                <select class="select" id="Rol" name="Rol">
                    <option value="">Seleccionar…</option>
                    <option>Administrativo</option>
                    <option>Cliente</option>
                    <option>Funcionario</option>
                </select>
                </div>
                <br>
            </div>
        <div class="actions">
            <button type="submit">Registrar</button>
        </div>
        </form>
        </div>
  </div>
    <script src="{{ asset('js/vacios.js') }}"></script>
</body>
</html>