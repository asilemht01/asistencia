@extends('adminlte::page')

@section('title', 'Inicio')

@section('content_header')
<center>
  <h1>CONTROL DE ASISTENCIA</h1>
  <p>Dirección Regional de Educación Apurímac</p>
</center>
@stop

@section('content')

<div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-lime o-hidden h-100">
            <div class="card-body">
              <div class="row">
                <div class="col-xl-4">
                   <i class="fa fa-child" style='font-size:48px;color:black' aria-hidden="true"></i>
                </div>
                <div class="col-xl-6">
                    <h1>{{$asistencias}}</h1> 
                    <p>Asistencias Marcadas</p>   
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-warning o-hidden h-100">
            <div class="card-body">
            <div class="row">
                <div class="col-xl-4">
                  <i class="fa fa-users" style='font-size:48px;color:black' aria-hidden="true"></i>
                </div>
                <div class="col-xl-6">
                    <h1>{{$practicantes}}</h1> 
                    <p>Practicantes Activos</p>   
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-teal o-hidden h-100">
            <div class="card-body">
            <div class="row">
                <div class="col-xl-4">
                   <i class='fas fa-laptop-house' style='font-size:48px;color:black' aria-hidden="true"></i>
                </div>
                <div class="col-xl-6">
                    <h1>{{$oficina}}</h1> 
                    <p>Oficias</p>   
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white  bg-purple o-hidden h-100">
            <div class="card-body">
            <div class="row">
                <div class="col-xl-4">
                   <i class="fa fa-building" style='font-size:48px;color:black' aria-hidden="true"></i>
                </div>
                <div class="col-xl-6">
                    <h1>{{$area}}</h1> 
                    <p>Areas</p>   
                </div>
              </div>
            </div>
          </div>
        </div>
  </div>

@stop

@section('css')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style>
  h1{
    color: #0a0412;
    font-weight: normal;
    font-size: 50px;
    font-family:Arial;
    text-transform: uppercase;
  }
  
</style>
@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop