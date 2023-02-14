formulario para todas las vistas
<label for="Nombre" id="nombre">Nombre</label>
<input type="text" name="Nombre" value="{{ $empleados->Nombre }}"/>
<br />
<label for="ApellidoPaterno" id="apellidoPaterno">ApellidoPaterno</label>
<input type="text" name="ApellidoPaterno" value="{{ $empleados->ApellidoPaterno }}"/>
<br />
<label for="ApellidoMaterno">ApellidoMaterno</label>
<input type="text" name="ApellidoMaterno" value="{{ $empleados->ApellidoMaterno }}"/>
<br />
<label for="Correo">Correo</label>
<input type="text" name="Correo" value="{{ $empleados->Correo }}"/>
<br />
<label for="Foto">Foto</label>
<img src="{{asset('storage').'/'. $empleados->Foto }}">
{{ $empleados->Foto }}
<input type="file" value= ""name="Foto"/>
<br />
<input type="submit" value="Guardar" />