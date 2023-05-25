@extends('layouts.app')

@section('template_title')
    {{ $tutoria->name ?? "{{ __('Show') Tutoria" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Tutoria</span>
                        </div>
                        <div class="float-right">
                            <a class="btn btn-primary" href="{{ route('tutorias.index') }}"> {{ __('Back') }}</a>
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Fecha:</strong>
                            {{ $tutoria->fecha }}
                        </div>
                        <div class="form-group">
                            <strong>Hora:</strong>
                            {{ $tutoria->hora }}
                        </div>
                        <div class="form-group">
                            <strong>Proyecto:</strong>
                            {{ $tutoria->proyecto }}
                        </div>
                        <div class="form-group">
                            <strong>Tema:</strong>
                            {{ $tutoria->tema }}
                        </div>
                        <div class="form-group">
                            <strong>Observacion:</strong>
                            {{ $tutoria->observacion }}
                        </div>
                        <div class="form-group">
                            <strong>Estado:</strong>
                            {{ $tutoria->estado }}
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
