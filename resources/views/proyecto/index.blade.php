@extends('layouts.app')

@section('template_title')
    Proyecto
@endsection

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span id="card_title">
                            {{ __('Proyecto') }} 
                            (Total: {{$proyectos->Total()}})
                        </span>

                        <div class="float-right">
                            <a href="{{ route('proyectos.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                        @foreach ($proyectos as $proyecto)
                            <div class="col-md-4 mb-3">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Codigo: {{$proyecto->id}}</h4>
                                        <h5>Titulo: {{ $proyecto->titulo }}</h5>
                                        <p class="card-text">{{ $proyecto->estado }}</p>
                                        <a href="{{ route('proyectos.show',$proyecto->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                        <a href="{{ route('proyectos.edit',$proyecto->id) }}" class="btn btn-success btn-sm"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                        <form action="{{ route('proyectos.destroy',$proyecto->id) }}" method="POST" style="display: inline-block;">
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
                <div class="card-footer">
                    {!! $proyectos->links() !!}
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
