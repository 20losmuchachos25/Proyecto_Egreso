<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/gestor/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/Gestor/table.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Gestor</title>
</head>
<body>
    <div>  
        <header>
            <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">
            <h2>GESTOR DE USUARIOS</h2>
        </header>
        <div class="container">
            <div class="column-left">
                <form action="{{ route('Welcome') }}">
                    <input type="submit" value="WELCOME">
                </form>
            </div>
            <div class="column-right">
                {{-- Tabla de usuarios --}}
                    <table id="usuarios">
                        <thead>
                            <tr>
                                <th>Tipo Documento</th>
                                <th>Documento</th>
                                <th>Primer Nombre</th>
                                <th>Segundo Nombre</th>
                                <th>Primer Apellido</th>
                                <th>Segundo Apellido</th>
                                <th>Edad</th>
                                <th>Fecha de Nacimiento</th>
                                <th>Sexo</th>
                                <th>Mutualista</th>
                                <th>Estado</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Tipo de Usuario</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($usuarios as $usuario)
                                <tr data-documento="{{ $usuario->Documento }}">
                                    <td>{{ $usuario->Tipo_Documento }}</td>
                                    <td>{{ $usuario->Documento }}</td>
                                    <td>{{ $usuario->Primer_Nombre }}</td>
                                    <td>{{ $usuario->Segundo_Nombre }}</td>
                                    <td>{{ $usuario->Primer_Apellido }}</td>
                                    <td>{{ $usuario->Segundo_Apellido }}</td>
                                    <td>{{ $usuario->Edad }}</td>
                                    <td>{{ $usuario->Fecha_Nacimiento }}</td>
                                    <td>{{ $usuario->Sexo }}</td>
                                    <td>{{ $usuario->Mutualista }}</td>
                                    <td>{{ $usuario->Estado }}</td>
                                    <td>{{ $usuario->Celular }}</td>
                                    <td>{{ $usuario->Email }}</td>
                                    <td>{{ $usuario->tipo_usuario }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="13">No se encontraron usuarios registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div id="GestorModal" class="modal">
                        <div class="modal-content">
                            <span class="close">&times;</span>
                                <h2>Datos</h2>
                                <form action ="" method ="post">

                                    <section id="tipodocumento">  
                                        <label id="tipodocumento">Tipo Documento </label>   
                                        <select class="select" id="Tipo_Documento" name="Tipo_Documento" disabled>
                                            <option value="">Seleccionar…</option>
                                            <option>CI</option>
                                            <option>Pasaporte</option>
                                            <option>DNI</option>
                                            <option>Otro</option>
                                        </select>
                                        <button type="button" onclick="habilitarInput(document.getElementById('Tipo_Documento'))"><i class="fas fa-pen"></i></button>
                                        <button type="button" onclick="ModificarInput(document.getElementById('Tipo_Documento'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Tipo_Documento'))"><i class="fas fa-times"></i></button>
                                    </section>

                                    <section id="documento">  
                                        <label id="documento">Documento </label>   
                                        <input id="Documento" type="text" name="Documento" readonly>
                                        <input type="hidden" id="documentooculto" name="documentooculto">
                                        <button type="button" onclick="habilitarInput(document.getElementById('Documento'))"><i class="fas fa-pen"></i></button>
                                        <button type="button" onclick="ModificarInput(document.getElementById('Documento'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Documento'))"><i class="fas fa-times"></i></button>
                                    </section>
                            
                                    <section id="primnombre">  
                                        <label id="primnombre">Primer Nombre </label>   
                                        <input id="Primer_Nombre" type="text" name="Primer_Nombre" readonly>
                                        <button type="button" onclick="habilitarInput(document.getElementById('Primer_Nombre'))"><i class="fas fa-pen"></i></button>
                                        <button type="button" onclick="ModificarInput(document.getElementById('Primer_Nombre'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Primer_Nombre'))"><i class="fas fa-times"></i></button>
                                    </section>

                                    <section id="segnombre">  
                                        <label id="segnombre">Segundo Nombre </label>   
                                        <input id="Segundo_Nombre" type="text" name="Segundo_Nombre" readonly>
                                        <button type="button" onclick="habilitarInput(document.getElementById('Segundo_Nombre'))"><i class="fas fa-pen"></i></button>
                                        <button type="button" onclick="ModificarInput(document.getElementById('Segundo_Nombre'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Segundo_Nombre'))"><i class="fas fa-times"></i></button>
                                    </section>

                                    <section id="primapellido">  
                                        <label id="primapellido">Primer Apellido </label>   
                                        <input id="Primer_Apellido" type="text" name="Primer_Apellido" readonly>
                                        <button type="button" onclick="habilitarInput(document.getElementById('Primer_Apellido'))"><i class="fas fa-pen"></i></button>
                                        <button type="button" onclick="ModificarInput(document.getElementById('Primer_Apellido'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Primer_Apellido'))"><i class="fas fa-times"></i></button>
                                    </section>

                                    <section id="segapellido">  
                                        <label id="segapellido">Segundo Apellido </label>   
                                        <input id="Segundo_Apellido" type="text" name="Segundo_Apellido" readonly>
                                        <button type="button" onclick="habilitarInput(document.getElementById('Segundo_Apellido'))"><i class="fas fa-pen"></i></button>
                                        <button type="button" onclick="ModificarInput(document.getElementById('Segundo_Apellido'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Segundo_Apellido'))"><i class="fas fa-times"></i></button>
                                    </section>
                            
                                    <section id="edad">
                                        <label id="edad">Edad </label>
                                        <input id="Edad" type="text" name="Edad" readonly>
                                        <button type="button" onclick="habilitarInput(document.getElementById('Edad'))"><i class="fas fa-pen"></i></button>
                                        <button type="button"  onclick="ModificarInput(document.getElementById('Edad'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Edad'))"><i class="fas fa-times"></i></button>
                                    </section>

                                    <section id="fechanac">
                                        <label id="fechanac">Fecha de Nacimiento </label>
                                        <input id="Fecha_Nacimiento" type="date" name="Fecha_Nacimiento" readonly>
                                        <button type="button" onclick="habilitarInput(document.getElementById('Fecha_Nacimiento'))"><i class="fas fa-pen"></i></button>
                                        <button type="button"  onclick="ModificarInput(document.getElementById('Fecha_Nacimiento'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Fecha_Nacimiento'))"><i class="fas fa-times"></i></button>
                                    </section>

                                    <section id="sexo">  
                                        <label id="sexo">Sexo </label>   
                                        <input id="Sexo" type="text" name="Sexo" readonly>
                                        <button type="button" onclick="habilitarInput(document.getElementById('Sexo'))"><i class="fas fa-pen"></i></button>
                                        <button type="button" onclick="ModificarInput(document.getElementById('Sexo'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Sexo'))"><i class="fas fa-times"></i></button>
                                    </section>

                                    <section id="celular">
                                        <label id="celular">Celular </label>
                                        <input id="Celular" type="text" name="Celular" readonly>
                                        <button type="button" onclick="habilitarInput(document.getElementById('Celular'))"><i class="fas fa-pen"></i></button>
                                        <button type="button"  onclick="ModificarInput(document.getElementById('Celular'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Celular'))"><i class="fas fa-times"></i></button>
                                    </section>

                                    <section id="mutualista">
                                        <label id="mutualista">Mutualista </label>
                                        <input id="Mutualista" type="text" name="Mutualista" readonly>
                                        <button type="button" onclick="habilitarInput(document.getElementById('Mutualista'))"><i class="fas fa-pen"></i></button>
                                        <button type="button" onclick="ModificarInput(document.getElementById('Mutualista'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Mutualista'))"><i class="fas fa-times"></i></button>
                                    </section>

                                    <section id="estado">
                                        <label id="estado">Estado </label>
                                        <select class="select" id="Estado" name="Estado" disabled>
                                            <option value="">Seleccionar…</option>
                                            <option>Activo</option>
                                            <option>Inactivo</option>
                                        </select>                                        
                                        <button type="button" onclick="habilitarInput(document.getElementById('Estado'))"><i class="fas fa-pen"></i></button>
                                        <button type="button" onclick="ModificarInput(document.getElementById('Estado'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Estado'))"><i class="fas fa-times"></i></button>
                                    </section>

                                    <section id="email">
                                        <label id="email">Email </label>
                                        <input id ="Email" type="text" name="Email" readonly>
                                        <button type="button" onclick="habilitarInput(document.getElementById('Email'))"><i class="fas fa-pen"></i></button>
                                        <button type="button" onclick="ModificarInput(document.getElementById('Email'))"><i class="fas fa-check"></i></button>
                                        <button type="button" onclick="deshabilitarInput(document.getElementById('Email'))"><i class="fas fa-times"></i></button>
                                    </section>
                            

                                        <button type="button" id="Cliente" value="Cliente" onclick="CambiarRol(this)">Cliente</button>
                                        <button type="button" id="Funcionario" value="Funcionario" onclick="CambiarRol(this)">Funcionario</button>
                                        <button type="button" id="Administrativo" value="Administrativo" onclick="CambiarRol(this)">Administrativo</button>

                                </form> 
                                <br>
                                <button type="button" onclick="solicitarNuevaPass()">
                                    Restablecer Contraseña
                                </button>
                        
                        </div>
                    </div>
            </div>

        </div>
    
    </div>
        <script>const consultaDatoUrl = "{{ route('ConsultaDato') }}";</script>
        <script>const modificarDatoUrl = "{{ route('ModificarDato') }}";</script>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script> 
        <script src="{{ asset('js/abrirgestor.js') }}"></script>
        <script src="{{ asset('js/ReactionsButtons/habilitar.js') }}"></script>
        <script src="{{ asset('js/ReactionsButtons/deshabilitar.js') }}"></script>
        <script src="{{ asset('js/ReactionsButtons/apply.js') }}"></script>
        <script src="{{ asset('js/Reactions/actualizarTabla.js') }}"></script>



</body>
</html>
