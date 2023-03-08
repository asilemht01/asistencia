@extends('adminlte::page')

@section('title', 'user')

@section('content_header')
    <h1>Usuarios</h1>
@stop

@section('content')
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table  class="table table-striped" id="tabluser">
                <thead>
                    <tr>
                        <th>nombre</th>
                        <th>Gmil</th>
                        <th>username</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{$user->name}}</td>
                        <td>{{$user->email}}</td>
                        <td>{{$user->username}}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
       </div>
    </div>
</div>

@stop

@section('css')

@stop

@section('js')

@stop