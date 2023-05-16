<label for="nroIdentificacion">Número de Identificación:</label>
<input type="number" id="nroIdentificacion" name="nroIdentificacion" value="{{ $estudiante->nroIdentificacion ?? '' }}"><br>

<label for="tipoIdentificacion">Tipo de Identificación:</label>
<input type="text" id="tipoIdentificacion" name="tipoIdentificacion" value="{{ $estudiante->tipoIdentificacion ?? '' }}"><br>

<label for="nombre">Nombre:</label>
<input type="text" id="nombre" name="nombre" value="{{ $estudiante->nombre ?? '' }}"><br>

<label for="apellido">Apellido:</label>
<input type="text" id="apellido" name="apellido" value="{{ $estudiante->apellido ?? '' }}"><br>

<label for="email">Correo Electrónico:</label>
<input type="email" id="email" name="email" value="{{ $estudiante->email ?? '' }}"><br>

<label for="telefono">Celular:</label>
<input type="number" id="telefono" name="telefono" value="{{ $estudiante->telefono ?? '' }}"><br>

<label for="semestre">Semestre:</label>
<input type="number" id="semestre" name="semestre" value="{{ $estudiante->semestre ?? '' }}"><br>

<label for="idCarrera">ID Carrera:</label>
<input type="number" id="idCarrera" name="idCarrera" value="{{ $estudiante->idCarrera ?? '' }}"><br>


</label><input type="submit" value="Guardar Datos">