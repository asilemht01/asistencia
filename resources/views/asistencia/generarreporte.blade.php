<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reporte de asistencia</title>
    <style>
        table {
            border-collapse: collapse;
            border: 1px solid black;
            width: 100%;
        }

        th, td {
            border: 1px solid black;
            padding: 5px;
        }
        
    </style>
</head>
<body>
    <div>
        <img src="imges/enbezado.jpg"  >
    </div>
    <div style="margin-bottom: 1rem;">
        <table>
            <tr>
                <td colspan="4" style="background-color: #8a9dff"><p style="text-align: center;"><b>DATOS GENERALES DEL PRACTICANTE</b></p></td>
            </tr>
            <tr>
                <td colspan="2" style="background-color: #d0d6f5"><b>Practicante</b></td>
                <td colspan="2">{{ $practicante->nombre.' '.$practicante->Apellidos }}</td>
            </tr>
            <tr>
                <td style="background-color: #d0d6f5"><b>Correo</b></td>
                <td>{{ $practicante->correo }}</td>
                <td style="background-color: #d0d6f5"><b>Telefono</b></td>
                <td>{{ $practicante->telefono }}</td>
            </tr>
            <tr>
                <td style="background-color: #d0d6f5"><b>Procedencia</b></td>
                <td>{{ $practicante->procedencia }}</td>
                <td style="background-color: #d0d6f5"><b>Carrera</b></td>
                <td>{{ $practicante->carrera }}</td>
            </tr>
            <tr>
                <td colspan="2" style="background-color: #d0d6f5"><b>Oficina</b></td>
                <td colspan="2">{{ $practicante->oficina->nombreoficina }}</td>
            </tr>
            <tr>
                <td colspan="2" style="background-color: #d0d6f5"><b>Fecha de Inicio</b></td>
                <td colspan="2">{{ $practicante->fecha_inicio }}</td>
            </tr>
        </table>
    </div>
    <div>
        @foreach ($asistencias as $año=>$mesess)
            @foreach ($mesess as $mes=>$item)
                <br>
                <table>
                    <thead>
                        <tr align="center" style="background-color: #8a9dff"><td colspan="3"><b>Año: </b>{{ $año }} - <b>Mes: </b>{{ $meses[$mes] }}</td></tr>
                        <tr>
                            <th>Día</th>
                            <th>Hora de Entrada</th>
                            <th>Hora de Salida</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($item as $asistencia)
                            <tr>
                                <td>
                                    @php
                                        $fecha = strftime('%A %d de %B de %Y', strtotime($asistencia->entrada));
                                        $diaSemana = $daynames[date('w', strtotime($asistencia->entrada))];
                                    @endphp
                                    {{ $diaSemana }}, {{ date_format(date_create($asistencia->entrada), 'd') }}
                                </td>
                                <td>{{ date_format(date_create($asistencia->entrada), 'h:i A') }}</td>
                                <td>{{ date_format(date_create($asistencia->salida), 'h:i A') }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            @endforeach
        @endforeach
    </div>
</body>
</html>