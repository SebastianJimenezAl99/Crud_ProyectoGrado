<div class="box box-info padding-1">
    <div class="box-body">
        
        <div class="form-group">
            <label for="cedula">Cedula</label>
            <input type="number" name="cedula" value="{{ $coordinadore->cedula }}" class="form-control{{ $errors->has('cedula') ? ' is-invalid' : '' }}" placeholder="Cedula" min="1000000" max="9999999999">
            {!! $errors->first('cedula', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="nombre">Nombre</label>
            <input type="text" name="nombre" value="{{ $coordinadore->nombre }}" class="form-control{{ $errors->has('nombre') ? ' is-invalid' : '' }}" placeholder="Nombre"maxlength="100">
            {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="apellido">Apellido</label>
            <input type="text" name="apellido" value="{{ $coordinadore->apellido }}" class="form-control{{ $errors->has('apellido') ? ' is-invalid' : '' }}" placeholder="Apellido"maxlength="100">
            {!! $errors->first('apellido', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="text" name="email" value="{{ $coordinadore->email }}" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="Email"maxlength="100">
            {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="telefono">Telefono</label>
            <input type="number" name="telefono" value="{{ $coordinadore->telefono }}" class="form-control{{ $errors->has('telefono') ? ' is-invalid' : '' }}" placeholder="Telefono" min="3000000000" max="3999999999">
            {!! $errors->first('telefono', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="idCarrera">Carrera</label>
            <select name="idCarrera" class="form-control{{ $errors->has('idCarrera') ? ' is-invalid' : '' }}">
                <option value="">Seleccionar Carrera</option>
                @foreach ($carreras as $carrera)
                    <option value="{{ $carrera->id }}" {{ $coordinadore->idCarrera == $carrera->id ? 'selected' : '' }}>
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
        <a href="{{ route('coordinadores.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
