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
                                {{ __('Estudiante') }} (Total: {{ $estudiantes->total() }})
                            </span>

                             <div class="float-right">
                                <a href="{{ route('estudiantes.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                    
                    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3">
                        @foreach ($estudiantes as $estudiante)
                            <div class="col mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Estudiante {{ $estudiante->id }}</h5>
                                        <p class="card-text"><strong>Código:</strong> {{ $estudiante->id }}</p>
                                        <p class="card-text"><strong>Nro. Identificación:</strong> {{ $estudiante->nroIdentificacion }}</p>
                                        <p class="card-text"><strong>Tipo Identificación:</strong> {{ $estudiante->tipoIdentificacion }}</p>
                                        <p class="card-text"><strong>Nombre:</strong> {{ $estudiante->nombre }}</p>
                                        <p class="card-text"><strong>Apellido:</strong> {{ $estudiante->apellido }}</p>
                                        <p class="card-text"><strong>Email:</strong> {{ $estudiante->email }}</p>
                                        <p class="card-text"><strong>Teléfono:</strong> {{ $estudiante->telefono }}</p>
                                        <p class="card-text"><strong>Semestre:</strong> {{ $estudiante->semestre }}</p>
                                        <p class="card-text"><strong>Id Carrera:</strong> {{ $estudiante->idCarrera }}</p>
                                        <form action="{{ route('estudiantes.destroy', $estudiante->id) }}" method="POST">
                                            <a class="btn btn-primary" href="{{ route('estudiantes.show', $estudiante->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                            <a class="btn btn-success" href="{{ route('estudiantes.edit', $estudiante->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    
                    

                </div>
                {!! $estudiantes->links() !!}
            </div>
        </div>
    </div>
@endsection
