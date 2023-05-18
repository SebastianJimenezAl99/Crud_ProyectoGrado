@extends('layouts.app')

@section('template_title')
    Profesore
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">

                            <span id="card_title">
                                {{ __('Profesore') }}
                            </span>

                             <div class="float-right">
                                <a href="{{ route('profesores.create') }}" class="btn btn-primary btn-sm float-right"  data-placement="left">
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Nroidentificacion</th>
										<th>Tipoidentificacion</th>
										<th>Nombre</th>
										<th>Apellido</th>
										<th>Email</th>
										<th>Telefono</th>
										<th>Semestre</th>
										<th>Idcarrera</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($profesores as $profesore)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $profesore->nroIdentificacion }}</td>
											<td>{{ $profesore->tipoIdentificacion }}</td>
											<td>{{ $profesore->nombre }}</td>
											<td>{{ $profesore->apellido }}</td>
											<td>{{ $profesore->email }}</td>
											<td>{{ $profesore->telefono }}</td>
											<td>{{ $profesore->semestre }}</td>
											<td>{{ $profesore->idCarrera }}</td>

                                            <td>
                                                <form action="{{ route('profesores.destroy',$profesore->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('profesores.show',$profesore->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('profesores.edit',$profesore->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-fw fa-trash"></i> {{ __('Delete') }}</button>
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                {!! $profesores->links() !!}
            </div>
        </div>
    </div>
@endsection
