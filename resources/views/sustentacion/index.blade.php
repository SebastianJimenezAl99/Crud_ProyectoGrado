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
                                {{ __('Sustentacion') }}
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
                        <div class="table-responsive">
                            <table class="table table-striped table-hover">
                                <thead class="thead">
                                    <tr>
                                        <th>No</th>
                                        
										<th>Fecha</th>
										<th>Hora</th>
										<th>Idproyecto</th>
										<th>Idjurado1</th>
										<th>Idjurado2</th>
										<th>Comentario</th>
										<th>Estado</th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($sustentacions as $sustentacion)
                                        <tr>
                                            <td>{{ ++$i }}</td>
                                            
											<td>{{ $sustentacion->fecha }}</td>
											<td>{{ $sustentacion->hora }}</td>
											<td>{{ $sustentacion->idProyecto }}</td>
											<td>{{ $sustentacion->idJurado1 }}</td>
											<td>{{ $sustentacion->idJurado2 }}</td>
											<td>{{ $sustentacion->comentario }}</td>
											<td>{{ $sustentacion->estado }}</td>

                                            <td>
                                                <form action="{{ route('sustentacions.destroy',$sustentacion->id) }}" method="POST">
                                                    <a class="btn btn-sm btn-primary " href="{{ route('sustentacions.show',$sustentacion->id) }}"><i class="fa fa-fw fa-eye"></i> {{ __('Show') }}</a>
                                                    <a class="btn btn-sm btn-success" href="{{ route('sustentacions.edit',$sustentacion->id) }}"><i class="fa fa-fw fa-edit"></i> {{ __('Edit') }}</a>
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
                {!! $sustentacions->links() !!}
            </div>
        </div>
    </div>
@endsection
