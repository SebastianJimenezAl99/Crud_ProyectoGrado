PAGINA PRINCIPAL DE ESTUDIANTE
<br>
<a href="{{ route('estudiante.create') }}" class="btn btn-primary">Crear Estudiante</a>

<table class="table table-light">
    <thead class="thead-light">
        <tr>
            <th>#</th>
            <th>Número de Identificación</th>
            <th>Tipo de Identificación</th>
            <th>Nombre</th>
            <th>Apellido</th>
            <th>Email</th>
            <th>Teléfono</th>
            <th>Semestre</th>
            <th>ID Carrera</th>
            <th>Accion</th>
        </tr>
    </thead>

    <tbody>
        @foreach( $estudiantes as $estudiante )
        <tr>
            <td>{{ $estudiante->id }}</td>
            <td>{{ $estudiante->nroIdentificacion }}</td>
            <td>{{ $estudiante->tipoIdentificacion }}</td>
            <td>{{ $estudiante->nombre }}</td>
            <td>{{ $estudiante->apellido }}</td>
            <td>{{ $estudiante->email }}</td>
            <td>{{ $estudiante->telefono }}</td>
            <td>{{ $estudiante->semestre }}</td>
            <td>{{ $estudiante->idCarrera }}</td>
            <td><a href="{{ url('/estudiante/'.$estudiante->id.'/edit') }}">Editar</a> | 

                <form action="{{ url('/estudiante/'.$estudiante->id) }}" method="POST">
                    @csrf
                    {{ @method_field('DELETE') }}
                    <input type="submit" onclick="return confirm('¿Quieres borrar al estudiante?')" value="Eliminar">
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>