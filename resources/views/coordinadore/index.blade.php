@extends('layouts.app')

@section('template_title')
    Coordinadores
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                {{ __('Coordinadores') }}
                                (Total: {{ $coordinadores->total() }})
                            </span>

                            <div class="float-right">
                                <a href="{{ route('coordinadores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            
                            @foreach ($coordinadores as $coordinadore)
                            
                                <div class="col-md-4 mb-4">
                                    <div class="card">
                                        <div class="card-body">
                                            <h5 class="card-title">Coordinador {{ $coordinadore->id }}</h5>
                                            <p class="card-text"><strong>Cedula:</strong> {{ $coordinadore->cedula }}</p>
                                            <p class="card-text"><strong>Nombre:</strong> {{ $coordinadore->nombre }}</p>
                                            <p class="card-text"><strong>Apellido:</strong> {{ $coordinadore->apellido }}</p>
                                            <p class="card-text"><strong>Email:</strong> {{ $coordinadore->email }}</p>
                                            <p class="card-text"><strong>Telefono:</strong> {{ $coordinadore->telefono }}</p>
                                            <p class="card-text"><strong>Carrera:</strong> {{ $coordinadore->carrera }}</p>
                                            <div class="d-flex justify-content-end">
                                                <form action="{{ route('coordinadores.destroy', $coordinadore->id) }}" method="POST">
                                                    <a class="btn btn-primary btn-sm mr-2" href="{{ route('coordinadores.show', $coordinadore->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-success btn-sm mr-2" href="{{ route('coordinadores.edit', $coordinadore->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>

                    </div>
                </div>
                {!! $coordinadores->links() !!}
            </div>
        </div>
    </div>
@endsection

