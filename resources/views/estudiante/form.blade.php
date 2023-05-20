<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label for="nroIdentificacion">Nro Identificacion</label>
            <input type="number" name="nroIdentificacion" value="{{ $estudiante->nroIdentificacion }}" class="form-control{{ $errors->has('nroIdentificacion') ? ' is-invalid' : '' }}" placeholder="Nro Identificacion" min="1000000" max="9999999999">
            {!! $errors->first('nroIdentificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="tipoIdentificacion">Tipo Identificacion</label>
            <select name="tipoIdentificacion" class="form-control{{ $errors->has('tipoIdentificacion') ? ' is-invalid' : '' }}">
                <option value="">Seleccione una opción</option>
                <option value="Cedula de Ciudadania" {{ $estudiante->tipoIdentificacion == 'Cedula de Ciudadania' ? 'selected' : '' }}>Cedula de Ciudadania</option>
                <option value="Tarjeta de Identidad" {{ $estudiante->tipoIdentificacion == 'Tarjeta de Identidad' ? 'selected' : '' }}>Tarjeta de Identidad</option>
            </select>
            {!! $errors->first('tipoIdentificacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="{{ $estudiante->nombre }}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="Nombre" maxlength="100">
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" value="{{ $estudiante->apellido }}" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" placeholder="Apellido" maxlength="100">
            {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ $estudiante->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email" maxlength="100">
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="number" name="telefono" value="{{ $estudiante->telefono }}" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" placeholder="Telefono" min="3000000000" max="3999999999">
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="semestre">Semestre</label>
            <select name="semestre" class="form-control{{ $errors->has('semestre') ? ' is-invalid' : '' }}">
                <option value="">Seleccione una opción</option>
                <option value="06" {{ $estudiante->semestre == '06' ? 'selected' : '' }}>06</option>
                <option value="07" {{ $estudiante->semestre == '07' ? 'selected' : '' }}>07</option>
                <option value="08" {{ $estudiante->semestre == '08' ? 'selected' : '' }}>08</option>
                <option value="09" {{ $estudiante->semestre == '09' ? 'selected' : '' }}>09</option>
                <option value="10" {{ $estudiante->semestre == '10' ? 'selected' : '' }}>10</option>
            </select>
            {!! $errors->first('semestre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="idCarrera">Carrera</label>
            <select name="idCarrera" class="form-control{{ $errors->has('idCarrera') ? ' is-invalid' : '' }}">
                <option value="">Seleccionar Carrera</option>
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ $estudiante->idCarrera == $carrera->id ? 'selected' : '' }}>
                        {{ $carrera->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('idCarrera', '<div class="invalid-feedback">:message</div>') !!}
        </div>

    </div>
    <br>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">Guardar</button>
        <a class="btn btn-secondary" href="{{ route('estudiantes.index') }}">Volver</a>
    </div>
    
</div>