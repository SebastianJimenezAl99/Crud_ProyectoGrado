@extends('layouts.app')

@section('template_title')
    Calificacion
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Calificacion') }} (Total: {{$calificacions->Total()}})
                        </span>
                        <div class="float-right">
                            <a href="{{ route('calificacions.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                        @foreach ($calificacions as $calificacion)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Código: {{ $calificacion->id }}</h5>
                                        <p class="card-text"><strong>Proyecto:</strong> {{ $calificacion->proyecto }}</p>
                                        <p class="card-text"><strong>Nota:</strong> {{ $calificacion->nota }}</p>
                                        <form action="{{ route('calificacions.destroy', $calificacion->id) }}" method="POST">
                                            <a class="btn btn-primary btn-sm" href="{{ route('calificacions.show', $calificacion->id) }}">
                                                <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                            </a>
                                            <a class="btn btn-success btn-sm" href="{{ route('calificacions.edit', $calificacion->id) }}">
                                                <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                            </a>
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm">
                                                <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            {!! $calificacions->links() !!}
        </div>
    </div>
</div>


@endsection
