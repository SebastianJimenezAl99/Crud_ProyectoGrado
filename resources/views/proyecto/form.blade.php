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
            <textarea class="form-control {{ $errors->has('evidencia') ? 'is-invalid' : '' }}" name="evidencia" id="evidencia" rows="5" style="resize: none;" placeholder="Evidencia">
                @if (empty($proyecto->evidencia))
                    Link de la carpeta de Drive:
                    Nombre de Carpeta:
                    Correos para comunicación:
                @else
                    {{ $proyecto->evidencia }}
                @endif
            </textarea>
            {!! $errors->first('evidencia', '<div class="invalid-feedback">:message</div>') !!}
            
            <label class="text-primary" style="color: #003366;">
                <strong>Importante:</strong> Recuerda que todas las evidencias se deben subir al drive en una carpeta compartida con el tutor y que el nombre tenga la siguiente estructura: título - código_estudiantil - código_estudiantil (Segundo estudiante si aplica)
            </label>
        </div>
       
        
        <div class="form-group">
            <label for="idEstudiante_p">Idestudiante P</label>
            <input type="text" class="form-control {{ $errors->has('idEstudiante_p') ? 'is-invalid' : '' }}" name="idEstudiante_p" id="idEstudiante_p" value="{{ $proyecto->idEstudiante_p }}" placeholder="Idestudiante P">
            {!! $errors->first('idEstudiante_p', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="idEstudiante_p2">Idestudiante P2</label>
            <input type="text" class="form-control {{ $errors->has('idEstudiante_p2') ? 'is-invalid' : '' }}" name="idEstudiante_p2" id="idEstudiante_p2" value="{{ $proyecto->idEstudiante_p2 }}" placeholder="Idestudiante P2">
            {!! $errors->first('idEstudiante_p2', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="idTutor">Idtutor</label>
            <input type="text" class="form-control {{ $errors->has('idTutor') ? 'is-invalid' : '' }}" name="idTutor" id="idTutor" value="{{ $proyecto->idTutor }}" placeholder="Idtutor">
            {!! $errors->first('idTutor', '<div class="invalid-feedback">:message</div>') !!}
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <input type="text" class="form-control {{ $errors->has('estado') ? 'is-invalid' : '' }}" name="estado" id="estado" value="{{ $proyecto->estado }}" placeholder="Estado">
            {!! $errors->first('estado', '<div class="invalid-feedback">:message</div>') !!}
        </div>
    </div>
    
    <div class="box-footer mt-20">
        <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
        <a href="{{ route('proyectos.index') }}" class="btn btn-secondary">{{ __('Back') }}</a>
    </div>
    
</div>
