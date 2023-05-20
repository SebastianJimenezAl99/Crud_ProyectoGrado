@extends('layouts.app')

@section('template_title')
    Estudiante
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Estudiantes') }}
                            (Total: {{ $estudiantes->total()}})
                        </span>

                        <div class="float-right">
                            <a href="{{ route('estudiantes.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
                                {{ __('Create New') }}
                            </a>
                        </div>
                    </div>
                </div>
                @if ($message = Session::get('success'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif

                <div class="card-body">
                    <div class="row">
                        @foreach ($estudiantes as $estudiante)
                        <div class="col-md-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">{{ $estudiante->nombre }} {{ $estudiante->apellido }}</h5>
                                    <p class="card-text">
                                        <strong>Nro Identificación:</strong> {{ $estudiante->nroIdentificacion }}<br>
                                        <strong>Tipo Identificación:</strong> {{ $estudiante->tipoIdentificacion }}<br>
                                        <strong>Email:</strong> {{ $estudiante->email }}<br>
                                        <strong>Teléfono:</strong> {{ $estudiante->telefono }}<br>
                                        <strong>Carrera:</strong> {{ $estudiante->carrera }}<br>
                                        <strong>Semestre:</strong> {{ $estudiante->semestre }}<br>
                                    </p>
                                </div>
                                <div class="card-footer">
                                    <form action="{{ route('estudiantes.destroy',$estudiante->id) }}" method="POST">
                                        <a class="btn btn-sm btn-primary" href="{{ route('estudiantes.show',$estudiante->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                        <a class="btn btn-sm btn-success" href="{{ route('estudiantes.edit',$estudiante->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {!! $estudiantes->links() !!}
        </div>
    </div>
</div>

@endsection
