@extends('layouts.app')

@section('template_title')
    Carrera
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Carrera') }}
                            (Total: {{ $carreras->total() }})
                        </span>
                        <div class="float-right">
                            <a href="{{ route('carreras.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                    <div class="row ">
                        @foreach ($carreras as $carrera)
                        <div class="col-md-4 mb-4">
                            <div class="card">
                                <div class="card-body">
                                    <h5 class="card-title">Carrera {{ $carrera->id }}</h5>
                                    <p class="card-text"><strong>Código:</strong> {{ $carrera->id }}</p>
                                    <p class="card-text"><strong>Nombre:</strong> {{ $carrera->nombre }}</p>
                                    <form action="{{ route('carreras.destroy', $carrera->id) }}" method="POST">
                                        <a class="btn btn-primary" href="{{ route('carreras.show', $carrera->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                        <a class="btn btn-success" href="{{ route('carreras.edit', $carrera->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
            </div>
            {!! $carreras->links() !!}
        </div>
    </div>
</div>

@endsection
