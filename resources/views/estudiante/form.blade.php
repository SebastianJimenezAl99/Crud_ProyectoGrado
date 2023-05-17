<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            {{ Form::label('nroIdentificacion') }}
            {{ Form::text('nroIdentificacion', $estudiante->nroIdentificacion, ['class' => 'form-control' . ($errors->has('nroIdentificacion') ? ' is-invalid' : ''), 'placeholder' => 'Nroidentificacion']) }}
            {!! $errors->first('nroIdentificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('tipoIdentificacion') }}
            {{ Form::text('tipoIdentificacion', $estudiante->tipoIdentificacion, ['class' => 'form-control' . ($errors->has('tipoIdentificacion') ? ' is-invalid' : ''), 'placeholder' => 'Tipoidentificacion']) }}
            {!! $errors->first('tipoIdentificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('nombre') }}
            {{ Form::text('nombre', $estudiante->nombre, ['class' => 'form-control' . ($errors->has('nombre') ? ' is-invalid' : ''), 'placeholder' => 'Nombre']) }}
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('apellido') }}
            {{ Form::text('apellido', $estudiante->apellido, ['class' => 'form-control' . ($errors->has('apellido') ? ' is-invalid' : ''), 'placeholder' => 'Apellido']) }}
            {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('email') }}
            {{ Form::text('email', $estudiante->email, ['class' => 'form-control' . ($errors->has('email') ? ' is-invalid' : ''), 'placeholder' => 'Email']) }}
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('telefono') }}
            {{ Form::text('telefono', $estudiante->telefono, ['class' => 'form-control' . ($errors->has('telefono') ? ' is-invalid' : ''), 'placeholder' => 'Telefono']) }}
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('semestre') }}
            {{ Form::text('semestre', $estudiante->semestre, ['class' => 'form-control' . ($errors->has('semestre') ? ' is-invalid' : ''), 'placeholder' => 'Semestre']) }}
            {!! $errors->first('semestre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            {{ Form::label('idCarrera') }}
            {{ Form::text('idCarrera', $estudiante->idCarrera, ['class' => 'form-control' . ($errors->has('idCarrera') ? ' is-invalid' : ''), 'placeholder' => 'Idcarrera']) }}
            {!! $errors->first('idCarrera', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
    </div>
</div>