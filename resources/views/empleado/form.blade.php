<h1>{{ $modo }} empleado</h1>
@if (count($errors) > 1)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li> {{ $error }} </li>
            @endforeach
        </ul>
    </div>
@endif
<div class="form-group">
    <label for="Nombre" id="nombre">Nombre</label>
    <input class="form-control" type="text" name="Nombre"
        value="{{ isset($empleados->Nombre) ? $empleados->Nombre : '' }}" />
    <br />
</div>

<div class="form-group">
    <label for="ApellidoPaterno" id="apellidoPaterno">ApellidoPaterno</label>
    <input class="form-control" type="text" name="ApellidoPaterno"
        value="{{ isset($empleados->ApellidoPaterno) ? $empleados->ApellidoPaterno : '' }}" />
</div>
<div class="form-group">
    <label for="ApellidoMaterno">ApellidoMaterno</label>
    <input class="form-control" type="text" name="ApellidoMaterno"
        value="{{ isset($empleados->ApellidoMaterno) ? $empleados->ApellidoMaterno : '' }}" />
</div>
<div class="form-group">
    <label for="Correo">Correo</label>
    <input class="form-control" type="text" name="Correo"
        value="{{ isset($empleados->Correo) ? $empleados->Correo : '' }}" />
</div>
<div class="form-group">
    <label for="Foto"></label>
    @if (isset($empleados->Foto))
        <img class=" img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $empleados->Foto }}" width="90"
            height="90">
    @endif
    {{-- {{ $empleados->Foto }} --}}
    <input class="form-control" type="file" value="" name="Foto" />
</div>
<input class="btn btn-success" type="submit" value="{{ $modo }} datos" />
<a class="d-inline btn btn-primary" href="{{ url('empleado') }}">Regresar</a>
