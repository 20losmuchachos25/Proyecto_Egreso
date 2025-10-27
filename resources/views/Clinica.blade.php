<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/clinica/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tables/table.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="ruta-alta-horario" content="{{ route('AltaHorario') }}">


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
                <button onclick="AbrirGestor()"><i class="fa-solid fa-plus"></i> Agregar</button>
                <button><i class="fa-solid fa-minus"></i> Desactivar</button>
                <button><i class="fa-solid fa-pen"></i> Editar</button>

                {{-- Mensajes de validación --}}
            @if ($errors->any())
                <div style="color: red;">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <p>{{ $error }}</p>
                        @endforeach
                    </ul>
                </div>
            @endif

            {{-- Mensaje de éxito --}}
            @if (session('success'))
                <div style="color: green;">{{ session('success') }}</div>
            @endif
            @if (session('abrir_modal'))
                <script>
                    window.addEventListener("DOMContentLoaded", () => {
                        const id = Number("{{ session('abrir_modal') }}");
                        if (!isNaN(id)) {
                            AbrirTelefonoModal(id);
                        }
                    });
                </script>
            @endif
            @if (session('abrir_modal_especializacion'))
                <script>
                    window.addEventListener("DOMContentLoaded", () => {
                        const id = Number("{{ session('abrir_modal_especializacion') }}");
                        if (!isNaN(id)) {
                            ListarEspecializaciones(id);
                        }
                    });
                </script>
            @endif

            
            <br>
            <br>
            <table id="clinicas">
                <thead>
                    <th>ID</th>
                    <th>Calle</th>
                    <th>Numero</th>
                    <th>Esquina</th>
                    <th>Referencia</th>
                    <th>Opciones</th>
                </thead>
                <tbody>
                    @forelse($clinicas as $clinica)
                    @php
                        $direccionCompleta = $clinica->Direccion ?? '';

                        $partes = explode(' esq ', $direccionCompleta);
                        $calleNumero = $partes[0] ?? '';

                        $callePartes = explode(' ', $calleNumero);
                        $numero = array_pop($callePartes); // último elemento (número)
                        $calle = implode(' ', $callePartes); // lo demás (calle)

                        $esquinaReferencia = $partes[1] ?? '';
                        $subPartes = explode(' Referencia: ', $esquinaReferencia);
                        $esquina = $subPartes[0] ?? '';
                        $referencia = $subPartes[1] ?? '';
                    @endphp
                        <tr data-documento="{{ $clinica->ID_Clinica }}">
                            <td>{{ $clinica->ID_Clinica }}</td>
                            <td>{{ $calle }}</td>
                            <td>{{ $numero }}</td>
                            <td>{{ $esquina }}</td>
                            <td>{{ $referencia }}</td>
                            <td>
                                <button class="horario-btn" onclick="event.stopPropagation(); ListarHorarios('{{ $clinica->ID_Clinica }}')"><i class="fa-solid fa-clock"></i> Horario</button>
                                <button class="especializacion-btn" onclick="event.stopPropagation(); ListarEspecializaciones('{{ $clinica->ID_Clinica }}')"><i class="fa-solid fa-flask"></i> Especialización</button>
                                <button class="telefono-btn" onclick="event.stopPropagation(); AbrirTelefonoModal('{{ $clinica->ID_Clinica }}')"><i class="fa-solid fa-phone"></i> Teléfono</button></td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5">No se encontraron clinicas registradas.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            </div>
        </div>

        <div id="RegistroModal" class="modal">
            <div class="modal-content">
                <span class="close">&times;</span>
                <h3>Clinica - Registro</h3>
                <form action="{{ route('AltaClinica') }}" method="post">
                    @csrf
                    <section id="Calle">
                        <label for="Calle">Calle: </label>
                        <input type="text" id="Calle" name="Calle" placeholder="Ingrese calle.">
                    </section>
                    <section id="Numero">
                        <label for="Numero">Numero de Puerta: </label>
                        <input type="number" id="Numero" name="Numero" placeholder="Ingrese numero.">
                    </section>
                    <section id="Esquina">
                        <label for="Esquina">Esquina: </label>
                        <input type="text" id="Esquina" name="Esquina" placeholder="Ingrese esquina.">
                    </section>
                    <section id="Referencia">
                        <label for="Referencia">Referencia: </label>
                        <input type="text" id="Referencia" name="Referencia" placeholder="Ingrese referencia.">
                    </section>

                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
        <div id="EditorModal" class="modal">
            <div class="modal-content">
                <span class="close2">&times;</span>
                <h3>Clinica - Editar</h3>
                <form action="{{ route('EditarClinica') }}" method="post">
                    @csrf
                    <section id="id">
                        <label for="ID">ID: </label>
                        <input type="number" id="ID" name="ID" readonly>
                    </section>
                    <section id="calle">
                        <label for="Calle">Calle: </label>
                        <input type="text" id="Calle2" name="Calle">
                    </section>
                    <section id="numero">
                        <label for="Numero">Numero de Puerta: </label>
                        <input type="number" id="Numero2" name="Numero">
                    </section>
                    <section id="esquina">
                        <label for="Esquina">Esquina: </label>
                        <input type="text" id="Esquina2" name="Esquina">
                    </section>
                    <section id="referencia">
                        <label for="Referencia">Referencia: </label>
                        <input type="text" id="Referencia2" name="Referencia">
                    </section>

                    <input type="submit" value="Enviar">
                </form>
            </div>
        </div>
        <div id="TelModal" class="modal">
            <div class="modal-content">
                <span class="close3">&times;</span>
                <h3>Clinica - Teléfono</h3>
                <form action="{{ route('AltaTelefono') }}" method="post">
                    @csrf
                    <input type="hidden" id="IDOculto" name="IDOculto">
                    <label for="Telefono">Telefono: </label>
                    <input type="text" id="Telefono" name="Telefono" required>

                    <input type="submit" value="Agregar">
                </form>
                <br>
                    <table id="telefonos">
                        <thead>
                            <th>Teléfonos</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        <div id="TelEditarModal" class="modal">
            <div class="modal-content">
                <span class="close4">&times;</span>
                <h3>Telefono - Editar</h3>
                <form action="{{ route('EditarTelefono') }}" method="post">
                    @csrf
                    <input type="hidden" id="IDOculto2" name="IDOculto2">
                    <input type="hidden" id="TelOculto" name="TelOculto">


                    <label for="TelefonoEdit">Telefono: </label>
                    <input type="text" id="TelefonoEdit" name="TelefonoEdit" required>
                    <br>
                    <br>
                    <input type="submit" value="Editar">
                </form>
                <br>
                <button onclick="CancelarEditar()">Cancelar</button>

            </div>
        </div>

        <div id="EspecializacionModal" class="modal">
            <div class="modal-content">
                <span class="close5">&times;</span>
                <h3>Clinica - Especialización</h3>
                <form action="{{ route('AltaEspecializacion') }}" method="post">
                    @csrf
                    <input type="hidden" id="IDOculto3" name="IDOculto3">
                    <select class="select" id="Especializacion" name="Especializacion">

                    </select>

                    <input type="submit" value="Agregar">
                </form>
                <br>
                    <table id="especializaciones">
                        <thead>
                            <th>Especialización</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

        <div id="HorarioModal" class="modal">
            <div class="modal-content">
                <span class="close6">&times;</span>
                <h3>Clinica - Horario</h3>
                <form action="{{ route('AltaHorario') }}" method="post">
                    @csrf
                    <input type="hidden" id="IDOculto4" name="IDOculto4">
                    <input type="checkbox" id="Lunes" name="dias[]" value="Lunes">
                    <label for="Lunes">Lunes</label>

                    <input type="checkbox" id="Martes" name="dias[]" value="Martes">
                    <label for="Martes">Martes</label>

                    <input type="checkbox" id="Miercoles" name="dias[]" value="Miércoles">
                    <label for="Miercoles">Miércoles</label>

                    <input type="checkbox" id="Jueves" name="dias[]" value="Jueves">
                    <label for="Jueves">Jueves</label>

                    <br>

                    <input type="checkbox" id="Viernes" name="dias[]" value="Viernes">
                    <label for="Viernes">Viernes</label>

                    <input type="checkbox" id="Sabado" name="dias[]" value="Sábado">
                    <label for="Sabado">Sábado</label>

                    <input type="checkbox" id="Domingo" name="dias[]" value="Domingo">
                    <label for="Domingo">Domingo</label>
                    <br>
                    <br>

                    <label for="Apertura">Apertura </label>
                    <input type="time" id="Apertura" name="Apertura"> 

                    <label for="Cierre">Cierre </label>
                    <input type="time" id="Cierre" name="Cierre"> 
                </form>
                <br>
                <button onclick="AgregarHorario()">Agregar</button>
                <br>
                <br>
                    <table id="horarios">
                        <thead>
                            <th>Día</th>
                            <th>Apertura</th>
                            <th>Cierre</th>
                            <th>Opciones</th>
                        </thead>
                        <tbody>
                            
                        </tbody>
                    </table>
            </div>
        </div>

    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('js/abrirregistroClinica.js') }}"></script>
    <script src="{{ asset('js/abrireditorClinica.js') }}"></script>
    <script src="{{ asset('js/abrirregistroTelefono.js') }}"></script>
    <script src="{{ asset('js/abrireditarTelefono.js') }}"></script>
    <script src="{{ asset('js/especializacion-panel.js') }}"></script>
    <script src="{{ asset('js/horario-panel.js') }}"></script>






</body>
</html>
