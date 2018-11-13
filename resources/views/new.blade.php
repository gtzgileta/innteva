@extends('layouts.layout')

@section('title')Nuevo Usuario @endsection

@section('content')
@if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action="{{ URL::route('post-new') }}" method="post">
    <input type="text" name="username" value="{{ old('username') }}" placeholder="Usuario">
    <input type="text" name="names" value="{{ old('names') }}" placeholder="Nombres">
    <div class="row">
    	<div class="col-md-6">
    		<input type="text" name="paternal_surname" value="{{ old('paternal_surname') }}" placeholder="Apellido Paterno">
    	</div>
    	<div class="col-md-6">
    		<input type="text" name="maternal_surname" value="{{ old('maternal_surname') }}" placeholder="Apellido Materno">
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-6">
    	<input type="email" name="email" placeholder="Correo" value="{{ old('email') }}" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$)">
    	</div>
    	<div class="col-md-6">
    	<input type="password" name="password" placeholder="Contraseña">
    	</div>
    </div>
    <button type="submit" class="btn-lg btn-primary">Crear Usuario</button>
{{ csrf_field() }}
</form>
@endsection