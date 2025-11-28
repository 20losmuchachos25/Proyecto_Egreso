<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('css/tables/table.css') }}">
        <link rel="stylesheet" href="{{ asset('css/gestor/style.css') }}">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<body>
    <div>  
        <header>
            <img src="{{ asset('img/dental_sense.png') }}" alt="" class="logo">
            <h2>AGENDAS - CLINICAS</h2>
        </header>
        <div class="container">
            <div class="column-left">
                <form action="{{ route('WelcomeMED') }}">
                    <input type="submit" value="WELCOME">
                </form>
            </div>
            <div class="column-right">
                {{-- Tabla de Agendas --}}
                    <table id="agendas">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Documento Cliente</th>
                                <th>Fecha</th>
                                <th>Hora</th>
                                <th>Duración</th>
                                <th>Estado</th>
                                <th>Motivo</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($agendas as $agenda)
                                <tr data-documento="{{ $agenda->Documento }}">
                                    <td>{{ $agenda->id }}</td>
                                    <td>{{ $agenda->Doc_Cliente }}</td>
                                    <td>{{ $agenda->Fecha }}</td>
                                    <td>{{ $agenda->Hora }}</td>
                                    <td>{{ $agenda->Duracion }}</td>
                                    <td>{{ $agenda->Estado_Cita }}</td>
                                    <td>{{ $agenda->Motivo }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="14">No se encontraron agendas registrados.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
</body>
</html>
