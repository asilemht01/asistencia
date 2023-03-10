@extends('adminlte::page')

@section('title', 'Oficina')

@section('content_header')
    <h1>OFICINAS</h1>
@stop

@section('content')
 <div class="card">
    <div class = "card-body">
        <div class="card-header">
            <div style="display: flex; justify-content: space-between; align-items: center;">
             <span id="card_title">
             </span>
              <div class="float-right">
                <a href="{{ route('oficinas.create') }}" class="btn btn-success btn-sm float-right"  data-placement="left">
                    {{ __('Crear Nuevo') }}
                </a>
              </div>
            </div>
        </div>
        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
         @endif
         @if ($message = Session::get('danger'))
            <div class="alert alert-danger">
                <p>{{ $message }}</p>
            </div>
         @endif
        <table id="tableoficina" class="table table-striped table-hover">
            <thead class="thead">
                 <tr>
                 <th>No</th>            
				 <th>Nombreoficina</th>
				 <th>Areas</th>
                 <th></th>
                </tr>
            </thead>
            <tbody>
            @foreach ($oficinas as $oficina)
            <tr>
               <td>{{ ++$i }}</td>
                                            
				<td>
                {{ $oficina->nombreoficina }}
                </td>
				<td>
                    {{ $oficina->area->nombrearea}}
                </td>
                <td>
                    <form action="{{ route('oficinas.destroy',$oficina->id) }}" method="POST"  id="deleteForm{{$oficina->id}}" onsubmit="return eliminar(event, {{$oficina->id}})">
                    <a class="btn btn-sm btn-success" href="{{ route('oficinas.edit',$oficina->id) }}"><i class="fa fa-fw fa-edit"></i></a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i></button>
                    </form>
                </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
 </div>

@stop

@section('css')
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/dataTables.bootstrap4.min.css">
     <link rel="stylesheet" href="https://cdn.datatables.net/buttons/2.3.4/css/buttons.dataTables.min.css">
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
     <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.min.css">
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
    <!-- Include the SweetAlert2 JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10.16.6/dist/sweetalert2.all.min.js"></script>
    <script>
        function eliminar(event, id){
            event.preventDefault();
                Swal.fire({
                    title: 'Estas seguro de eliminars?',
                    text: '??No podr??s deshacer esta acci??n!',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, eliminar!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        // The user confirmed the action, perform the delete operation here
                       const form = document.getElementById("deleteForm"+ id);
                        form.submit();
                    }
        });
        }

        $(document).ready(function() {
            $('#tableoficina').DataTable( {
                "language": {
                    "decimal": "",
                    "emptyTable": "No hay informaci??n",
                    "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                    "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                    "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                    "infoPostFix": "",
                    "thousands": ",",
                    "lengthMenu": "Mostrar _MENU_ Entradas",
                    "loadingRecords": "Cargando...",
                    "processing": "Procesando...",
                    "search": "Buscar:",
                    "zeroRecords": "Sin resultados encontrados",
                    "paginate": {
                        "first": "Primero",
                        "last": "Ultimo",
                        "next": "Siguiente",
                        "previous": "Anterior"
                    }
                },
                dom: 'Bfrtip',
                buttons: [
                        {
                            extend:   'excelHtml5',
                            titleAttr: 'Excel',
                            text: '<button class="btn btn-success"><i class="fas fa-file-excel"></i></button>'
                        },
                        {
                            extend:    'pdfHtml5',
                            titleAttr: 'PDF',
                            text: '<button class="btn btn-danger"><i class="fa fa-file-pdf-o"></i></button>'
                        }
                ]
            } );
        } );
    </script> 
@stop