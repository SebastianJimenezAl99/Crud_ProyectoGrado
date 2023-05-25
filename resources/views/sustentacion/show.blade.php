@extends('layouts.app')

@section('template_title')
    {{ $sustentacion->name ?? "{{ __('Show') Sustentacion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Sustentacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('sustentacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $sustentacion->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $sustentacion->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Idproyecto:</strong>
                            {{ $sustentacion->idProyecto }}
                        </div>
                        <div class="form-group">
                            <strong>Idjurado1:</strong>
                            {{ $sustentacion->idJurado1 }}
                        </div>
                        <div class="form-group">
                            <strong>Idjurado2:</strong>
                            {{ $sustentacion->idJurado2 }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $sustentacion->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $sustentacion->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
