@extends('layouts.app')

@section('template_title')
    {{ $proyecto->name ?? "{{ __('Show') Proyecto" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Proyecto</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('proyectos.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Titulo:</strong>
                            {{ $proyecto->titulo }}
                        </div>
                        <div class="form-group">
                            <strong>Descripcion:</strong>
                            {{ $proyecto->descripcion }}
                        </div>
                        <div class="form-group">
                            <strong>Evidencia:</strong>
                            {{ $proyecto->evidencia }}
                        </div>
                        <div class="form-group">
                            <strong>Idestudiante P:</strong>
                            {{ $proyecto->idEstudiante_p }}
                        </div>
                        <div class="form-group">
                            <strong>Idestudiante P2:</strong>
                            {{ $proyecto->idEstudiante_p2 }}
                        </div>
                        <div class="form-group">
                            <strong>Idtutor:</strong>
                            {{ $proyecto->idTutor }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $proyecto->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
