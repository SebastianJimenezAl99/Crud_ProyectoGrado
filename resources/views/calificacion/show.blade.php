@extends('layouts.app')

@section('template_title')
    {{ $calificacion->name ?? "{{ __('Show') Calificacion" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Calificacion</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('calificacions.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        <div class="form-group">
                            <strong>Código de Calificación:</strong>
                            {{ $calificacion->id }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto:</strong>
                            {{ $calificacion->proyecto }}
                        </div>
                        <div class="form-group">
                            <strong>Comentario:</strong>
                            {{ $calificacion->comentario }}
                        </div>
                        <div class="form-group">
                            <strong>Nota:</strong>
                            {{ $calificacion->nota }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
