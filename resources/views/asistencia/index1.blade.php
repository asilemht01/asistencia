<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width= device-width, initial-scale = 1" />
    <link href="https://fonts.bunny.net/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct" crossorigin="anonymous"></script>
     <style>
        body{
            background-image: url("imges/abcy.png");
            background-repeat: no-repeat;
            background-size: cover;
            min-height: 100vh;
            max-width: 400px;
                margin: 0 auto;
        }
        .p-5{
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-49%, -49%);
        }
        a{
            color:#fff;
            top: 10%;
            left: 10%;
            background-color:transparent;
            color:inherit;
            text-decoration:inherit
        }
        #gradien{
            background-image: linear-gradient(to right,Violet,rgba(255,0,0,0),Violet);
        }
     </style>
    <title>INICIO</title>
</head>
<body  class="antialiased">
 <center>
 <div class="relative flex items-top justify-center min-h-screen bg-gray-100 dark:bg-gray-900 sm:items-center py-4 sm:pt-0">
        <div class="max-w-6xl mx-auto sm:px-6 lg:px-8">
          <img style="width:100%; height:100%" src="imges/logo-drea.png" class="img-fluid" alt="Eniun">
        <div class="p-5" id="gradien">   <!-- <p class="h2">Direccion Regional de Eduaccion Apurimac</p> -->
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                        <a class="btn btn-info mb-5" href="{{ url('/inicio') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">Inicio</a>
                    @else
                        <a class="btn btn-info mb-5" href="{{ route('login') }}" >Log in</a>
                    @endauth
                    <a class="btn btn-danger mb-5" href="{{url('/logout')}}">Logout</a>
                </div>
            @endif
            <form method="post" id="asistencia-form" onsubmit="return handleSubmit(event)" autocomplete="off">
               @csrf
                  <div class="form-group">
                    <label for="dni">DNI</label>
                     <input type="text" class="form-control" id="dni" name="dni">
                  </div>
	                 <button type="submit" class="btn btn-success btn-lg" id="entrada">ENTRADA</button>
	                 <button type="submit" class="btn btn-danger btn-lg" id="salida">SALIDA</button>
             </form>
             <script>
                function handleSubmit(event) {
                    event.preventDefault();

                    const form = document.getElementById('asistencia-form');
                    const dni = document.getElementById('dni').value;

                    // Determinar la ruta según el botón presionado
                    if (event.submitter && event.submitter.id === 'salida') {
                        form.action = '/marcarsalida';
                    } else {
                        form.action = '/marcarentrada';
                    }

                    // Envío del formulario
                    form.submit();
                }
            </script>
                  @if(isset($mensaje))
                     <div class="alert alert-danger" role="alert">
                     {{ $mensaje }}
                      </div>
                      @endif
                      @if(isset($mensaje))
                      <script>
                            $(document).ready(function(){
                               setTimeout(function(){
                               $(".alert").alert('close');
                            }, 3000);
                            });
                        </script>
                    @endif
        </div>
  </div>
 </center>
 </body>
</html>