@extends('layouts.app')

@section('template_title')
    Tutoria
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Tutoria') }} (Total: {{ $tutorias->total() }})
                        </span>
                        <div class="float-right">
                            <a href="{{ route('tutorias.create') }}" class="btn btn-primary btn-sm float-right" data-placement="left">
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
                        @foreach ($tutorias as $tutoria)
                            <div class="col-md-4 mb-4">
                                <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $tutoria->tema }}</h5>
                                        <p class="card-text">
                                            Fecha: {{ $tutoria->fecha }} <br>
                                            Hora: {{ $tutoria->hora }} <br>
                                            Proyecto: {{ $tutoria->proyecto->titulo }} <br>
                                            Estado: {{ $tutoria->estado }}
                                        </p>
                                        <div class="text-right">
                                            <a class="btn btn-primary btn-sm" href="{{ route('tutorias.show',$tutoria->id) }}">
                                                <i class="fa fa-fw fa-eye"></i> {{ __('Show') }}
                                            </a>
                                            <a class="btn btn-success btn-sm" href="{{ route('tutorias.edit',$tutoria->id) }}">
                                                <i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}
                                            </a>
                                            <form action="{{ route('tutorias.destroy',$tutoria->id) }}" method="POST" style="display: inline">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">
                                                    <i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
                {!! $tutorias->links() !!}
            </div>
        </div>
    </div>
</div>

@endsection
