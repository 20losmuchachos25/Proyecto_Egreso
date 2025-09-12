<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/detalle_agenda/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tables/table.css') }}">


</head>
<body>
    <header>
        <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">
        <h2>Detalle de Agenda</h2>
    </header>
    <div class="cuerpo">

        <label for="Documento">Documento</label>
        <input type="number" id="Documento" name="Documento" value="{{ $agenda->Doc_Cliente }}" readonly>
        <br>
        <br>
        <label for="Nombre">Nombre</label>
        <input type="text" id="Nombre" name="Nombre" value="{{ $agenda->usuario->Primer_Nombre }}" readonly>

        <label for="Apellido">Apellido</label>
        <input type="text" id="Apellido" name="Apellido" value="{{ $agenda->usuario->Primer_Apellido }}" readonly>
        <br><br>
        <label for="Mutualista">Mutualista</label>
        <input type="text" id="Mutualista" name="Mutualista" value="{{ $agenda->usuario->Mutualista }}" readonly>

        <label for="Celular">Celular</label>
        <input type="tel" id="Celular" name="Celular" value="{{ $agenda->usuario->Celular }}" readonly>

        <label for="Email">Email</label>
        <input type="email" id="Email" name="Email" value="{{ $agenda->usuario->Email }}" readonly>
        <br>
        <br>

        <form action="" method="post">
            <input type="hidden" id="id" name="id" value="{{ $agenda->id }}">

            <label for="Fecha">Fecha</label>
            <input type="date" id="Fecha" name="Fecha" value="{{ $agenda->Fecha }}">

            <label for="Hora">Hora</label>
            <input type="time" id="Hora" name="Hora" value="{{ $agenda->Hora }}">
            <br><br>
            <label for="Motivo">Motivo</label>
            <textarea name="Motivo" id="Motivo" > {{ $agenda->Motivo }}</textarea>
            <br><br>
            <label for="Tratamientos">Tratamientos</label>
            <select class="select" id="Tratamientos" name="Tratamientos">
                <option value="">Seleccionar…</option>
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
                    <tr data-documento="">
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <input type="checkbox">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="4">No se encontraron clinicas registradas para este tratamiento.</td>
                    </tr>
                </tbody>
            </table>
            <br><br>
            <label for="Estado">Estado</label>
            <select class="select" id="Estado" name="Estado">
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
</body>
</html>