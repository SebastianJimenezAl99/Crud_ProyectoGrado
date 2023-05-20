@extends('layouts.app')

@section('template_title')
    {{ $profesore->name ?? "{{ __('Show') Profesore" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">{{ __('Show') }} Profesor</span>
                        </div>
                        
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $profesore->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $profesore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $profesore->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $profesore->email }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $profesore->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Carrera:</strong>
                            {{ $profesore->carrera }}
                        </div>

                    </div>
                </div>
                <br>
                <div class="float-right">
                    <a class="btn btn-secondary" href="{{ route('profesores.index') }}"> {{ __('Volver') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
