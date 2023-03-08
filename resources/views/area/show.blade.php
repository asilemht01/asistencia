@extends('adminlte::page')

@section('title', 'Area')

@section('content_header')
    <h1>AREAS</h1>
@stop

@section('content')
<section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Show Area</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('areas.index') }}"> Back</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Nombrearea:</strong>
                            {{ $area->nombrearea }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@stop

@section('css')
    <link rel="stylesheet" href="/css/admin_custom.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css" rel="styles">
    <link href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css" rel="styles">
@stop

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.13.2/js/dataTables.bootstrap4.min.js"></script>

    <script src="https://cdn.datatables.net/buttons/1.6.5/js/dataTables.buttons.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.flash.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js" ></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.html5.min.js"></script>
    <script src="https://cdn.datatables.net/buttons/1.6.5/js/buttons.print.min.js"></script>
  
    <script> 
      $(document).ready(function() {
            $('#tablearea').DataTable({
                dom: "Blfrtip",
                buttons: [
                    {
                        text: 'csv',
                        extend: 'csvHtml5',
                    },
                    {
                        text: 'excel',
                        extend: 'excelHtml5',
                    },
                    {
                        text: 'pdf',
                        extend: 'pdfHtml5',
                    }, 
                ],
                columnDefs: [{
                    orderable: false,
                    targets: -1
                }] 
            });
        });
        
    </script> 
@stop