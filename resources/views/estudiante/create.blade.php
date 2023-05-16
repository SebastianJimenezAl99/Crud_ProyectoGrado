FORMULARIO DE CREACION DE ESTUDIANTE
<form action="{{ url('/estudiante')}}" method="post">
    @csrf
    @include('estudiante.form')
    <input type="button" onclick="window.location='{{ route('estudiante.index') }}'" value="Volver al índice" class="btn btn-primary">
</form>