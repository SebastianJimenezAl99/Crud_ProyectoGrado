@extends('layouts.app')

@section('template_title')
    Sustentacion
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Sustentación') }} (Total: {{ count($sustentacions) }})
                        </span>
                        <div class="float-right">
                            <a href="{{ route('sustentacions.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                            @foreach ($sustentacions as $sustentacion)
                                <div class="col-md-4 mb-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <p>Código: {{$sustentacion->id}}</p>
                                            <p>Fecha: {{ $sustentacion->fecha }}</p>
                                            <p>Hora: {{ $sustentacion->hora }}</p>
                                            <p>Proyecto: {{ $sustentacion->proyecto->titulo }}</p>
                                            <p>Estado: {{ $sustentacion->estado }}</p>
                                            <form action="{{ route('sustentacions.destroy',$sustentacion->id) }}" method="POST">
                                                <a class="btn btn-sm btn-primary " href="{{ route('sustentacions.show',$sustentacion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                <a class="btn btn-sm btn-success" href="{{ route('sustentacions.edit',$sustentacion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
            {!! $sustentacions->links() !!}
        </div>
    </div>
</div>
@endsection
