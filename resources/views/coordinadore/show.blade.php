@extends('layouts.app')

@section('template_title')
    {{ $coordinadore->name ?? "{{ __('Show') Coordinadore" }}
@endsection

@section('content')
    <section class="content container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <div class="float-left">
                            <span class="card-title">Coordinador</span>
                            <br>
                            <span class="card-title">Código:  {{ $coordinadore->id }}</span>
                           
                        </div>
                    </div>

                    <div class="card-body">
                        
                        <div class="form-group">
                            <strong>Cedula:</strong>
                            {{ $coordinadore->cedula }}
                        </div>
                        <div class="form-group">
                            <strong>Nombre:</strong>
                            {{ $coordinadore->nombre }}
                        </div>
                        <div class="form-group">
                            <strong>Apellido:</strong>
                            {{ $coordinadore->apellido }}
                        </div>
                        <div class="form-group">
                            <strong>Email:</strong>
                            {{ $coordinadore->email }}
                        </div>
                        <div class="form-group">
                            <strong>Telefono:</strong>
                            {{ $coordinadore->telefono }}
                        </div>
                        <div class="form-group">
                            <strong>Carrera:</strong>
                            {{ $coordinadore->carrera }}
                        </div>

                    </div>
                    
                </div>
                <br>

                <div class="float-right">
                        <a class="btn btn-secondary" href="{{ route('coordinadores.index') }}"> {{ __('Volver') }}</a>
                    </div>
            </div>
        </div>
    </section>
@endsection
