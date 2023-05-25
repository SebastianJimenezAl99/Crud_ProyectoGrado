<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('fecha') }}
            {{ Form::text('fecha', $sustentacion->fecha, ['class' => 'form-control' . ($errors->has('fecha') ? ' is-invalid' : ''), 'placeholder' => 'Fecha']) }}
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('hora') }}
            {{ Form::text('hora', $sustentacion->hora, ['class' => 'form-control' . ($errors->has('hora') ? ' is-invalid' : ''), 'placeholder' => 'Hora']) }}
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idProyecto') }}
            {{ Form::text('idProyecto', $sustentacion->idProyecto, ['class' => 'form-control' . ($errors->has('idProyecto') ? ' is-invalid' : ''), 'placeholder' => 'Idproyecto']) }}
            {!! $errors->first('idProyecto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idJurado1') }}
            {{ Form::text('idJurado1', $sustentacion->idJurado1, ['class' => 'form-control' . ($errors->has('idJurado1') ? ' is-invalid' : ''), 'placeholder' => 'Idjurado1']) }}
            {!! $errors->first('idJurado1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idJurado2') }}
            {{ Form::text('idJurado2', $sustentacion->idJurado2, ['class' => 'form-control' . ($errors->has('idJurado2') ? ' is-invalid' : ''), 'placeholder' => 'Idjurado2']) }}
            {!! $errors->first('idJurado2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('comentario') }}
            {{ Form::text('comentario', $sustentacion->comentario, ['class' => 'form-control' . ($errors->has('comentario') ? ' is-invalid' : ''), 'placeholder' => 'Comentario']) }}
            {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('estado') }}
            {{ Form::text('estado', $sustentacion->estado, ['class' => 'form-control' . ($errors->has('estado') ? ' is-invalid' : ''), 'placeholder' => 'Estado']) }}
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>