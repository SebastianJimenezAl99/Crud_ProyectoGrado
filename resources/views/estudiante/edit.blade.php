EDITOR DE ESTUDIANTE
<br>
<form action="{{ url('/estudiante/'.$estudiante->id ) }}" method="post">
   @csrf
   {{ method_field('PATCH')}}
    @include('estudiante.form')
    <input type="button" onclick="window.location='{{ route('estudiante.index') }}'" value="Volver al índice" class="btn btn-primary">
</form>
