<div class="box box-info padding-1">
    <div class="box-body">

        <div class="form-group">
            <label for="idProyecto">Proyecto</label>
            <select name="idProyecto" class="form-control{{ $errors->has('idProyecto') ? ' is-invalid' : '' }}">
                <option value="">Selecciona un proyecto</option>
                @foreach ($proyectos as $proyecto)
                    <option value="{{ $proyecto->id }}" {{ $calificacion->idProyecto === $proyecto->id ? 'selected' : '' }}>
                        {{ $proyecto->id }} - {{ $proyecto->titulo }}
                    </option>
                @endforeach
            </select>
            @if ($errors->has('idProyecto'))
                <div class="invalid-feedback">{{ $errors->first('idProyecto') }}</div>
            @endif
        </div>        
        <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea name="comentario" class="form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" placeholder="Comentario" rows="5" maxlength="500">{{ $calificacion->comentario }}</textarea>
            @if ($errors->has('comentario'))
                <div class="invalid-feedback">{{ $errors->first('comentario') }}</div>
            @endif
        </div>        
        <div class="form-group">
            <label for="nota">Nota</label>
            <input type="number" step="0.01" min="0" max="5" name="nota" value="{{ $calificacion->nota }}" class="form-control{{ $errors->has('nota') ? ' is-invalid' : '' }}" placeholder="Nota" pattern="^(?:[0-5](?:\.[0-9]{1,2})?)$">
            @if ($errors->has('nota'))
                <div class="invalid-feedback">{{ $errors->first('nota') }}</div>
            @endif
        </div>        
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a class="btn btn-secondary" href="{{ route('calificacions.index') }}">Volver</a>
    </div>
</div>
