
<div class="box-body">
        <div class="form-group">
            {{ Form::label('DNI') }}
            {{ Form::text('dni', $practicante->dni, [
                'class' => 'form-control' . ($errors->has('dni') ? ' is-invalid' : ''),
                'placeholder' => 'Dni',
                'maxlength' => 8, // Limita la longitud máxima del campo a 8 caracteres
                'pattern' => '\d{8}', // Requiere que el campo tenga exactamente 8 dígitos
                'required' => true, // Requiere que se ingrese un valor en el campo
                'autocomplete' => 'off' // Deshabilita el autocompletado del navegador en el campo
                
            ]) }}
            {!! $errors->first('dni', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">

 <div class="form-row">
    <div class="col">

        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $practicante->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre', 'autocomplete' => 'off']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('correo') }}
            {{ Form::email('correo', $practicante->correo, ['class' => 'form-control' . ($errors->has('correo') ? ' is-invalid' : ''), 'placeholder' => 'Correo', 'autocomplete' => 'off']) }}
            {!! $errors->first('correo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('procedencia') }}
            {{ Form::text('procedencia', $practicante->procedencia, ['class' => 'form-control' . ($errors->has('procedencia') ? ' is-invalid' : ''), 'placeholder' => 'Procedencia', 'autocomplete' => 'off']) }}
            {!! $errors->first('procedencia', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('oficina') }}
            {{ Form::select('oficina_id',$oficinas, $practicante->oficina_id, ['class' => 'form-control' . ($errors->has('oficina_id') ? ' is-invalid' : ''), 'placeholder' => 'Oficina Id', 'autocomplete' => 'off']) }}
            {!! $errors->first('oficina_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_fin') }}
            {{ Form::date('fecha_fin', $practicante->fecha_fin, ['class' => 'form-control' . ($errors->has('fecha_fin') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Fin']) }}
            {!! $errors->first('fecha_fin', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="col">
        <div class="form-group">
            {{ Form::label('Apellidos') }}
            {{ Form::text('Apellidos', $practicante->Apellidos, ['class' => 'form-control' . ($errors->has('Apellidos') ? ' is-invalid' : ''), 'placeholder' => 'Apellidos', 'autocomplete' => 'off']) }}
            {!! $errors->first('Apellidos', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $practicante->telefono, [
                'class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 
                'placeholder' => 'Telefono', 
                'maxlength' => '9', // máximo 9 caracteres
                'pattern' => '[0-9]{9}', // sólo se permiten números
                'title' => 'El teléfono debe tener 9 dígitos', // mensaje al pasar el mouse sobre el campo
                'required' => 'required' // campo requerido
            ]) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('carrera') }}
            {{ Form::text('carrera', $practicante->carrera, ['class' => 'form-control' . ($errors->has('carrera') ? ' is-invalid' : ''), 'placeholder' => 'Carrera', 'autocomplete' => 'off']) }}
            {!! $errors->first('carrera', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('fecha_inicio') }}
            {{ Form::date('fecha_inicio', $practicante->fecha_inicio, ['class' => 'form-control' . ($errors->has('fecha_inicio') ? ' is-invalid' : ''), 'placeholder' => 'Fecha Inicio']) }}
            {!! $errors->first('fecha_inicio', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
  </div>
  <div class="box box-info padding-1">
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">GUARDAR</button>
        <a class="btn btn-danger" href="{{ route('practicantes.index') }}">CANCELAR</a>
    </div>
 </div>
 </div>
