<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/agenda/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/tables/table.css') }}">

</head>
<body>
    <header>
        <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">
        <h2>Agenda</h2>
    </header>
    <div class="container">
        <div class="column-left">
            <form action="{{ route('Welcome') }}">
                <input type="submit" value="WELCOME">
            </form>

        </div>
        <div class="column-right">
            {{-- Tabla de agendas --}}
            <table id="agendas">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Documento</th>
                                <th>Nombre</th>
                                <th>Apellido</th>
                                <th>Mutualista</th>
                                <th>Celular</th>
                                <th>Email</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Duracion Aprox (min)</th>
                                <th>Estado</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($agendas as $agenda)
                                <tr data-documento="{{ $agenda->id }}">
                                    <td>{{ $agenda->id }}</td>
                                    <td>{{ $agenda->Doc_Cliente }}</td>
                                    <td>{{ $agenda->usuario?->Primer_Nombre }}</td>
                                    <td>{{ $agenda->usuario?->Primer_Apellido }}</td>
                                    <td>{{ $agenda->usuario?->Mutualista }}</td>
                                    <td>{{ $agenda->usuario?->Celular }}</td>
                                    <td>{{ $agenda->usuario?->Email }}</td>
                                    <td>{{ $agenda->Fecha }}</td>
                                    <td>{{ $agenda->Hora }}</td>
                                    <td>{{ $agenda->Duracion }}</td>
                                    <td>{{ $agenda->Estado_Cita }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="13">No se encontraron agendas registradas.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>


        </div>
    </div>
</body>
</html>