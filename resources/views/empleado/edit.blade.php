@extends('layouts.app')

@section('content')
    <div class="container">

<form action="{{ url('/empleado/'.$empleados->id)}}" method="POST" enctype="multipart/form-data">
@csrf
{{ method_field ('PATCH') }}
    @include('empleado.form', ['modo' =>'Editar']);
</form>
    </div>
    @endsection