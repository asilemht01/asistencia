@extends('adminlte::page')

@section('title', 'Area')

@section('content_header')
    <h1>CREAR NUEVA AREA</h1>
@stop

@section('content')
<section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">

                @includeif('partials.errors')

                <div class="card card-default" style="width: 50rem;">
                    <div class="card-body">
                        <form method="POST" action="{{ route('areas.store') }}"  role="form" enctype="multipart/form-data">
                            @csrf

                            @include('area.form')

                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>

@stop

@section('css')

@stop

@section('js')
    <script> console.log('Hi!'); </script>
@stop