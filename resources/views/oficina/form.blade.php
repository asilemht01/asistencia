<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nombreoficina') }}
            {{ Form::text('nombreoficina', $oficina->nombreoficina, ['class' => 'form-control' . ($errors->has('nombreoficina') ? ' is-invalid' : ''), 'placeholder' => 'Nombreoficina','autocomplete' => 'off']) }}
            {!! $errors->first('nombreoficina', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('area_id') }}
            {{ Form::select('area_id', $areas ,$oficina->area_id, ['class' => 'form-control' . ($errors->has('area_id') ? ' is-invalid' : ''), 'placeholder' => 'Area']) }}
            {!! $errors->first('area_id', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-success">GUARDAR</button>
        <a class="btn btn-danger" href="{{ route('oficinas.index') }}">CANCELAR</a>
    </div>
</div>