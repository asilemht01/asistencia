@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <h1>Practicantes</h1>
@stop

@section('content')
<section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Practicante</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('practicantes.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>dni:</strong>
                            {{ $practicante->dni }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $practicante->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellidos:</strong>
                            {{ $practicante->Apellidos }}
                        </div>
                        <div class="form-group">
                            <strong>Correo:</strong>
                            {{ $practicante->correo }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $practicante->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Procedencia:</strong>
                            {{ $practicante->procedencia }}
                        </div>
                        <div class="form-group">
                            <strong>Carrera:</strong>
                            {{ $practicante->carrera }}
                        </div>
                        <div class="form-group">
                            <strong>Oficina Id:</strong>
                            {{ $practicante->oficina_id }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Inicio:</strong>
                            {{ $practicante->fecha_inicio }}
                        </div>
                        <div class="form-group">
                            <strong>Fecha Fin:</strong>
                            {{ $practicante->fecha_fin }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop
