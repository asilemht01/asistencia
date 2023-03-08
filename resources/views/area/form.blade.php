<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombrearea') }}
            {{ Form::text('nombrearea', $area->nombrearea, ['class' => 'form-control' . ($errors->has('nombrearea') ? ' is-invalid' : ''), 'placeholder' => 'Nombrearea','autocomplete' => 'off']) }}
            {!! $errors->first('nombrearea', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">GUARDAR</button>
        <a class="btn  btn-danger" href="{{ route('areas.index') }}">CANCELAR</a>
    </div>
</div>



