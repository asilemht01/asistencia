@extends('adminlte::page')

@section('title', 'ASISTENCIA')

@section('content_header')
    <h1>Control de Asistencia</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form class="row" action="{{ route('asistencias.index1') }}" method="GET">
                <div class="col-md-3 form-group">
                    <label for="fechaInicio" class="mr-2">Fecha Inicio:</label>
                    <input type="date" name="fechaInicio" id="fechaInicio" class="form-control mr-2" value="{{ $fechaInicio }}">
                </div>
                <div class="col-md-3 form-group">
                    <label for="fechaFin" class="mr-2">Fecha Fin:</label>
                    <input type="date" name="fechaFin" id="fechaFin" class="form-control mr-2" value="{{ $fechaFin }}">
                </div>
                <div class="col-md-3 col-xl-2 form-group">
                    <label for="dni" class="mr-2">DNI: </label>
                    <input type="text" name="dni" id="dni" class="form-control mr-1" require=" "
                        pattern="[0-9]+" value="{{ $dni }}">
                </div>
                <div class="col-md-3 col-xl-2 form-group">
                    <label for="">&nbsp;</label>
                    <button type="button" onclick="generarReporte()" class="btn btn-danger btn-block">
                        Exportar pdf
                    </button>
                </div>
                <div class="col-md-3 col-xl-2 form-group">
                    <label for="">&nbsp;</label>
                    <button type="submit" class="btn btn-primary btn-block">Buscar</button>
                </div>
            </form>
            <hr>
            <div class="table-responsive">
                <table class="table table-striped" id="tablereporte">
                    <thead>
                        <tr>
                            <th>DNI</th>
                            <th>Practicante</th>
                            <th>oficina</th>
                            <th>Entrada</th>
                            <th>Salida</th>
                            <th>Horas</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($asistencias as $asistencia)
                            @php
                                $entrada = new DateTime($asistencia->entrada);
                                $salida = new DateTime($asistencia->salida);
                                $duracion = $asistencia->entrada && $asistencia->salida ? $salida->diff($entrada)->format('%h h %i mn') : 'Registro incompleto';
                            @endphp
                            <tr>
                                <td>{{ $asistencia->practicante->dni }}</td>
                                <td>{{ $asistencia->practicante->nombre . ' ' . $asistencia->practicante->Apellidos }}</td>
                                <td>{{ $asistencia->practicante->oficina->nombreoficina }}</td>
                                <td>{{ $asistencia->entrada }}</td>
                                <td>{{ $asistencia->salida }}</td>
                                <td>{{ $duracion }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop

@section('css')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/2.3.4/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.print.min.js"></script>

    <script>
        $(document).ready(function() {
            $('#tablereporte').DataTable({
                dom: 'Brtip',
                buttons: [{
                        extend: 'excelHtml5',
                        titleAttr: 'Excel',
                        text: '<button class="btn btn-success"><i class="fas fa-file-excel"></i></button>'
                    },
                ]
            });
        });

        function generarReporte() {
            var fechaInicio = document.getElementById('fechaInicio').value;
            var fechaFin = document.getElementById('fechaFin').value;
            var dni = document.getElementById('dni').value;
            if (fechaInicio == '' || fechaFin == '' || dni == '') {
                alert('Debe ingresar todos los campos');
                return;
            }
            let route= "{{ route('asistencias.generarreporte') }}";
            route = route+"?fechaInicio="+fechaInicio+"&fechaFin="+fechaFin+"&dni="+dni;

            window.open(route, '_blank');
        }
    </script>
@stop
