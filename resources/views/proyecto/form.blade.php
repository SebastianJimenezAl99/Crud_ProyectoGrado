<div class="box box-info padding-1">
    <div class="box-body">
        <div class="form-group">
            <label for="titulo">Titulo</label>
            <input type="text" class="form-control {{ $errors->has('titulo') ? 'is-invalid' : '' }}" name="titulo" id="titulo" value="{{ $proyecto->titulo }}" placeholder="Titulo">
            {!! $errors->first('titulo', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="descripcion">Descripcion</label>
            <textarea class="form-control {{ $errors->has('descripcion') ? 'is-invalid' : '' }}" name="descripcion" id="descripcion" placeholder="Descripcion">{{ $proyecto->descripcion }}</textarea>
            {!! $errors->first('descripcion', '<div class="invalid-feedback">:message</div>') !!}
        </div>        
        <div class="form-group">
            <label for="evidencia">Evidencia</label>
            <textarea class="form-control {{ $errors->has('evidencia') ? 'is-invalid' : '' }}" name="evidencia" id="evidencia" rows="5" style="resize: none;" placeholder="Evidencia">{{ $proyecto->evidencia }}</textarea>
            {!! $errors->first('evidencia', '<div class="invalid-feedback">:message</div>') !!}
            <small><a href="#" data-toggle="modal" data-target="#importanteModal">Ver información importante</a></small>
        </div>
        
  
  <!-- Modal -->
  <div class="modal fade" id="importanteModal" tabindex="-1" role="dialog" aria-labelledby="importanteModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="importanteModalLabel">Información Importante</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          
          <p><strong>Recomendación:</strong> Para su recomendación, le invitamos a tener la siguiente estructura en su descripción:</p>
          <ul>
            <li><strong>Link de la carpeta de Drive:</strong>ENLACE_DE_LA_CARPETA</li>
            <li><strong>Nombre de Carpeta:</strong> NOMBRE_DE_LA_CARPETA</li>
            <li><strong>Correos para comunicación:</strong> CORREOS_PARA_COMUNICACION</li>
            <li><strong>Título del proyecto:</strong> Ejemplo de título</li>
            <li><strong>Código estudiantil:</strong> Ejemplo de código estudiantil</li>
            <li><strong>Código estudiantil (segundo estudiante si aplica):</strong> Ejemplo de código estudiantil del segundo estudiante</li>
            <li><strong>Ejemplo de nombre de carpeta:</strong> Proyecto Casa - Luis Rodriguez - Andres Lorenzo</li>
          </ul>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
  
       
        
        <div class="form-group">
            <label for="idEstudiante_p">Estudiante 1</label>
            <select class="form-control {{ $errors->has('idEstudiante_p') ? 'is-invalid' : '' }}" name="idEstudiante_p" id="idEstudiante_p">
                <option value="">Seleccione un estudiante</option>
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}" {{ $proyecto->idEstudiante_p == $estudiante->id ? 'selected' : '' }}>
                        {{ $estudiante->nroIdentificacion }} - {{ $estudiante->apellido }} {{ $estudiante->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('idEstudiante_p', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            <label for="idEstudiante_p2">Estudiante 2</label>
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="enable_idEstudiante_p2" id="enable_idEstudiante_p2" {{ $proyecto->idEstudiante_p2 ? 'checked' : '' }} onchange="toggleEstudianteP2(this.checked)">
                <label class="form-check-label" for="enable_idEstudiante_p2">
                    Activar campo
                </label>
            </div>
            <select class="form-control {{ $errors->has('idEstudiante_p2') ? 'is-invalid' : '' }}" name="idEstudiante_p2" id="idEstudiante_p2" {{ $proyecto->idEstudiante_p2 ? '' : 'disabled' }}>
                <option value="">Seleccione un estudiante</option>
                @foreach($estudiantes as $estudiante)
                    <option value="{{ $estudiante->id }}" {{ $proyecto->idEstudiante_p2 == $estudiante->id ? 'selected' : '' }}>
                        {{ $estudiante->nroIdentificacion }} - {{ $estudiante->apellido }} {{ $estudiante->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('idEstudiante_p2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            <label for="idTutor">Tutor</label>
            <select class="form-control {{ $errors->has('idTutor') ? 'is-invalid' : '' }}" name="idTutor" id="idTutor">
                <option value="">Seleccione un tutor</option>
                @foreach($profesores as $profesor)
                    <option value="{{ $profesor->id }}" {{ $proyecto->idTutor == $profesor->id ? 'selected' : '' }}>
                        {{ $profesor->apellido }} {{ $profesor->nombre }}
                    </option>
                @endforeach
            </select>
            {!! $errors->first('idTutor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        
        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado" id="estado">
                <option value="">Seleccione un estado</option>
                <option value="Pendiente" {{ $proyecto->estado == 'Pendiente' ? 'selected' : '' }}>Pendiente</option>
                <option value="En proceso" {{ $proyecto->estado == 'En proceso' ? 'selected' : '' }}>En proceso</option>
                <option value="Sustentación programada" {{ $proyecto->estado == 'Sustentación programada' ? 'selected' : '' }}>Sustentación programada</option>
                <option value="Sustentado" {{ $proyecto->estado == 'Sustentado' ? 'selected' : '' }}>Sustentado</option>
                <option value="Aprobado" {{ $proyecto->estado == 'Aprobado' ? 'selected' : '' }}>Aprobado</option>
                <option value="Rechazado" {{ $proyecto->estado == 'Rechazado' ? 'selected' : '' }}>Rechazado</option>
                <option value="En revisión" {{ $proyecto->estado == 'En revisión' ? 'selected' : '' }}>En revisión</option>
                <option value="Finalizado" {{ $proyecto->estado == 'Finalizado' ? 'selected' : '' }}>Finalizado</option>
                <option value="Archivado" {{ $proyecto->estado == 'Archivado' ? 'selected' : '' }}>Archivado</option>
            </select>
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
            <small><a href="#" data-toggle="modal" data-target="#estadoModal">Ver descripciones de estados</a></small>
        </div>
        <!-- Modal -->
        <div class="modal fade" id="estadoModal" tabindex="-1" role="dialog" aria-labelledby="estadoModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="estadoModalLabel">Descripciones de Estados de Proyecto</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <ul>
                            <li><strong>Pendiente:</strong> El proyecto está en etapa inicial y aún no ha sido revisado o evaluado.</li>
                            <li><strong>En proceso:</strong> El proyecto se encuentra en desarrollo y se están realizando actividades relacionadas con la investigación, recopilación de datos, análisis, etc.</li>
                            <li><strong>Sustentación programada:</strong> Se ha programado la fecha de la sustentación del proyecto ante el comité evaluador.</li>
                            <li><strong>Sustentado:</strong> El proyecto ha sido presentado y defendido ante el comité evaluador.</li>
                            <li><strong>Aprobado:</strong> El proyecto ha sido evaluado y aprobado satisfactoriamente.</li>
                            <li><strong>Rechazado:</strong> El proyecto no ha cumplido con los requisitos o estándares establecidos y ha sido rechazado.</li>
                            <li><strong>En revisión:</strong> El proyecto ha sido enviado para revisión o corrección adicional antes de la evaluación final.</li>
                            <li><strong>Finalizado:</strong> El proyecto ha sido completado y todas las actividades relacionadas han sido concluidas.</li>
                            <li><strong>Archivado:</strong> El proyecto se ha archivado después de haber sido finalizado y evaluado.</li>
                        </ul>
                    </div>                    
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <div class="box-footer mt-20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
    </div>
    
</div>
