formulario para crear empleado

<form action="{{ url('/empleado') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @include('empleado.form')
</form>
