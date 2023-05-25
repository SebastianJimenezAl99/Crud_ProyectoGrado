<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" value="{{ $sustentacion->fecha }}" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" placeholder="Fecha" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+6 months')) }}">
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>        
        <div class="form-group">
            <label for="hora">Hora</label>
            <input type="time" name="hora" value="{{ $sustentacion->hora }}" class="form-control{{ $errors->has('hora') ? ' is-invalid' : '' }}" placeholder="Hora" min="08:00" max="20:00">
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
        </div>        
        <div class="form-group">
            <label for="idProyecto">Proyecto</label>
            <select name="idProyecto" class="form-control{{ $errors->has('idProyecto') ? ' is-invalid' : '' }}">
                <option value="">Selecciona un proyecto</option>
                @foreach ($proyectos as $proyecto)
                    <option value="{{ $proyecto->id }}" {{ $sustentacion->idProyecto === $proyecto->id ? 'selected' : '' }}>
                        {{ $proyecto->id }} - {{ $proyecto->titulo }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('idProyecto', '<div class="invalid-feedback">:message</div>') !!}
        </div>        
        <div class="form-group">
            <label for="idJurado1">Jurado 1</label>
            <select class="form-control {{ $errors->has('idJurado1') ? 'is-invalid' : '' }}" name="idJurado1" id="idJurado1">
                <option value="">Seleccione un jurado</option>
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->id }}" {{ $sustentacion->idJurado1 == $profesor->id ? 'selected' : '' }}>
                        {{ $profesor->apellido }} {{ $profesor->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('idJurado1', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="idJurado2">Jurado 2</label>
            <select class="form-control {{ $errors->has('idJurado2') ? 'is-invalid' : '' }}" name="idJurado2" id="idJurado2">
                <option value="">Seleccione un jurado</option>
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->id }}" {{ $sustentacion->idJurado2 == $profesor->id ? 'selected' : '' }}>
                        {{ $profesor->apellido }} {{ $profesor->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('idJurado2', '<div class="invalid-feedback">:message</div>') !!}
        </div>        
        <div class="form-group">
            <label for="comentario">Comentario</label>
            <textarea name="comentario" class="form-control{{ $errors->has('comentario') ? ' is-invalid' : '' }}" placeholder="Comentario" rows="5" maxlength="500">{{ $sustentacion->comentario }}</textarea>
            {!! $errors->first('comentario', '<div class="invalid-feedback">:message</div>') !!}
        </div>               
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                <option value="">Selecciona un estado</option>
                <option value="Pendiente" {{ $sustentacion->estado === 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="En progreso" {{ $sustentacion->estado === 'En progreso' ? 'selected' : '' }}>En progreso</option>
                <option value="Aprobada" {{ $sustentacion->estado === 'Aprobada' ? 'selected' : '' }}>Aprobada</option>
                <option value="Rechazada" {{ $sustentacion->estado === 'Rechazada' ? 'selected' : '' }}>Rechazada</option>
                <option value="En espera de revisión" {{ $sustentacion->estado === 'En espera de revisión' ? 'selected' : '' }}>En espera de revisión</option>
                <option value="Finalizada" {{ $sustentacion->estado === 'Finalizada' ? 'selected' : '' }}>Finalizada</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            <small><a href="#" class="btn btn-link" data-toggle="modal" data-target="#estadoModal">Ver descripciones de estados</a></small>
            <!-- Modal -->
            <div class="modal fade" id="estadoModal" tabindex="-1" role="dialog" aria-labelledby="estadoModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="estadoModalLabel">Descripciones de estados de la sustentación</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <ul>
                                <li><strong>Pendiente:</strong> La sustentación aún no ha tenido lugar y está programada para una fecha futura.</li>
                                <li><strong>En progreso:</strong> La sustentación está en curso y actualmente se está llevando a cabo.</li>
                                <li><strong>Aprobada:</strong> La sustentación ha sido exitosa y se ha aprobado el proyecto presentado.</li>
                                <li><strong>Rechazada:</strong> La sustentación no ha cumplido con los requisitos o expectativas y se ha rechazado el proyecto.</li>
                                <li><strong>En espera de revisión:</strong> La sustentación ha finalizado, pero aún está en proceso de revisión y evaluación.</li>
                                <li><strong>Finalizada:</strong> La sustentación ha concluido, se han tomado todas las decisiones pertinentes y se ha cerrado el proceso de evaluación.</li>
                            </ul>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a class="btn btn-secondary" href="{{ route('sustentacions.index') }}">Volver</a>

    </div>
</div>
