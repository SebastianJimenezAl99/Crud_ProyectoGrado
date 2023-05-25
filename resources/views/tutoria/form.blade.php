<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="fecha">Fecha</label>
            <input type="date" name="fecha" value="{{ $tutoria->fecha }}" class="form-control{{ $errors->has('fecha') ? ' is-invalid' : '' }}" placeholder="Fecha" min="{{ date('Y-m-d') }}" max="{{ date('Y-m-d', strtotime('+6 months')) }}">
            {!! $errors->first('fecha', '<div class="invalid-feedback">:message</div>') !!}
        </div>        
        <div class="form-group">
            <label for="hora">Hora</label>
            <input type="time" name="hora" value="{{ $tutoria->hora }}" class="form-control{{ $errors->has('hora') ? ' is-invalid' : '' }}" placeholder="Hora" min="08:00" max="20:00">
            {!! $errors->first('hora', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            <label for="idProyecto">Proyecto</label>
            <select name="idProyecto" class="form-control{{ $errors->has('idProyecto') ? ' is-invalid' : '' }}">
                <option value="">Selecciona un proyecto</option>
                @foreach ($proyectos as $proyecto)
                    <option value="{{ $proyecto->id }}" {{ $tutoria->idProyecto === $proyecto->id ? 'selected' : '' }}>
                        {{ $proyecto->id }} - {{ $proyecto->titulo }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('idProyecto', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="tema">Tema</label>
            <input type="text" name="tema" value="{{ $tutoria->tema }}" class="form-control{{ $errors->has('tema') ? ' is-invalid' : '' }}" placeholder="Tema">
            {!! $errors->first('tema', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="observacion">Observacion</label>
            <textarea name="observacion" class="form-control{{ $errors->has('observacion') ? ' is-invalid' : '' }}" placeholder="Observacion" maxlength="500" rows="5">{{ $tutoria->observacion }}</textarea>
            {!! $errors->first('observacion', '<div class="invalid-feedback">:message</div>') !!}
        </div>        
        <div class="form-group">
            <label for="estado">Estado</label>
            <select name="estado" class="form-control{{ $errors->has('estado') ? ' is-invalid' : '' }}">
                <option value="">Seleccionar estado</option>
                <option value="Pendiente" {{ $tutoria->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="En progreso" {{ $tutoria->estado == 'En progreso' ? 'selected' : '' }}>En progreso</option>
                <option value="Completada" {{ $tutoria->estado == 'Completada' ? 'selected' : '' }}>Completada</option>
                <option value="Cancelada" {{ $tutoria->estado == 'Cancelada' ? 'selected' : '' }}>Cancelada</option>
                <option value="Aplazada" {{ $tutoria->estado == 'Aplazada' ? 'selected' : '' }}>Aplazada</option>
                <option value="No asistió" {{ $tutoria->estado == 'No asistió' ? 'selected' : '' }}>No asistió</option>
                <option value="En espera" {{ $tutoria->estado == 'En espera' ? 'selected' : '' }}>En espera</option>
                <option value="Evaluación pendiente" {{ $tutoria->estado == 'Evaluación pendiente' ? 'selected' : '' }}>Evaluación pendiente</option>
                <option value="Reagendada" {{ $tutoria->estado == 'Reagendada' ? 'selected' : '' }}>Reagendada</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            <small><a href="#" data-toggle="modal" data-target="#estadoModal">Ver descripciones de estados</a></small>
        </div>
        
        
        <!-- Modal -->
        <div class="modal fade" id="estadoModal" tabindex="-1" role="dialog" aria-labelledby="estadoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="estadoModalLabel">Descripciones de Estados de Tutoría</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li><strong>Pendiente:</strong> La tutoría está programada pero aún no ha ocurrido.</li>
                            <li><strong>En progreso:</strong> La tutoría está en curso actualmente.</li>
                            <li><strong>Completada:</strong> La tutoría ha finalizado exitosamente.</li>
                            <li><strong>Cancelada:</strong> La tutoría ha sido cancelada antes de su realización.</li>
                            <li><strong>Aplazada:</strong> La tutoría ha sido pospuesta para una fecha o hora posterior.</li>
                            <li><strong>No asistió:</strong> El estudiante o tutor no se presentó a la tutoría programada.</li>
                            <li><strong>En espera:</strong> La tutoría está en espera debido a alguna razón, como la disponibilidad de recursos o la confirmación de participantes.</li>
                            <li><strong>Evaluación pendiente:</strong> La tutoría ha finalizado, pero aún no se ha realizado la evaluación o retroalimentación correspondiente.</li>
                            <li><strong>Reagendada:</strong> La tutoría ha sido reprogramada para una nueva fecha o hora.</li>
                        </ul>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
    <div class="box-footer mt20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ route('tutorias.index') }}" class="btn btn-secondary">Volver</a>
    </div>
</div>
