<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/detalle_agenda/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tables/table.css') }}">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    
</head>
<body>
    <header>
        <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">
        <h2>Detalle de Agenda</h2>
    </header>
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
    <br>
    <div class="cuerpo">
        <table id="agenda_detalle">
                <thead>
                    <tr>
                        <th colspan="2" style="text-align: center;">Datos</th>
                    </tr>
                    <tr>
                        <th>Documento</th>
                        <td>{{$agenda->Doc_Cliente}}</td>
                    </tr>
                    <tr>
                        <th>Nombre</th>
                        <td>{{$agenda->usuario->Primer_Nombre}}</td>
                    </tr>
                    <tr>
                        <th>Apellido</th>
                        <td>{{$agenda->usuario->Primer_Apellido}}</td>
                    </tr>
                    <tr>
                        <th>Mutualista</th>
                        <td>{{$agenda->usuario->Mutualista}}</td>
                    </tr>
                    <tr>
                        <th>Celular</th>
                        <td>{{$agenda->usuario->Celular}}</td>
                    </tr>
                    <tr>
                        <th>Email</th>
                        <td>{{$agenda->usuario->Email}}</td>
                    </tr>
                    <tr>
                        <th>Motivo</th>
                        <td>{{ $agenda->Motivo }}</td>
                    </tr>
                    <tr>
                        <th>Tratamiento</th>
                        <td>{{ $agenda->Tratamiento }}</td>
                    </tr>
                    <tr>
                        <th colspan="2"></th>
                    </tr>
                </thead>
            </table>
        <br>
        <form action="{{ route('ModificarAgenda') }}" method="post">
            @csrf
            <input type="hidden" id="id" name="id" value="{{ $agenda->id }}">
            <input type="hidden" id="Motivo" name="Motivo" value="{{ $agenda->Motivo }}">
            <input type="hidden" id="Tratamiento" name="Tratamiento">
            <input type="hidden" id="Duracion" name="Duracion">


            <input type="hidden" id="ClinicaSeleccionada" name="ID_Clinica">


            <label for="Fecha">Fecha</label>
            <input type="date" id="Fecha" name="Fecha" value="{{ $agenda->Fecha }}">

            <label for="Hora">Hora</label>
            <input type="time" id="Hora" name="Hora" value="{{ $agenda->Hora }}">
            <br><br>
            
            <label for="Tratamientos">Tratamientos</label>
            <select class="select" id="Tratamientos" name="Tratamientos">
                <option value="">Seleccionar...</option>
            @forelse($tratamientos as $tratamiento)
                <option value="{{ $tratamiento->Nombre }}" data-duracion="{{ $tratamiento->Duracion }}">{{ $tratamiento->Nombre }} </option>
            @empty
                <option disabled>No hay tratamientos</option>
            @endforelse

            </select>
            <br><br>
            <table id="clinicas">
                <thead>
                    <tr>
                        <th>Clinica</th>
                        <th>Dirección</th>
                        <th>Horario</th>
                        <th>Seleccionar</th>
                    </tr>
                </thead>
                <tbody>
                </tbody>
            </table>
            <br><br>
            <label for="Estado">Estado</label>
            <select class="select" id="Estado" name="Estado_Cita">
                <option>{{ $agenda->Estado_Cita }}</option>
                <option>Confirmado</option>
                <option>Declinado</option>
                <option>Cancelado</option>
            </select>
            <br><br>
            <input type="submit" value="Confirmar">
        </form>
        <br>
        <form action="{{ route('Agenda') }}">
            <input type="submit" value="Volver">
        </form>

    </div>
    <script src="{{ asset('js/especialidad_clinica.js') }}"></script>
    <script>
        document.addEventListener('click', function (e) {
            if (e.target.classList.contains('btnSeleccionarClinica')) {
                const idClinica = e.target.dataset.id;

                document.getElementById('ClinicaSeleccionada').value = idClinica;

                alert("Clínica seleccionada: " + idClinica);
            }
        });

    </script>
    <script>
        document.getElementById('Tratamientos').addEventListener('change', function () {

            const opcion = this.options[this.selectedIndex];
            const tratamiento = opcion.value;
            const duracion = opcion.dataset.duracion;

            document.getElementById('Tratamiento').value = tratamiento;
            document.getElementById('Duracion').value = duracion;

        });
    </script>

    

</body>
</html>