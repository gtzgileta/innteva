@extends('layouts.layout')

@section('title')Editar Usuario @endsection

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
<form action="{{ URL::route('post-edit',$user->username) }}" method="post">
    <input type="text" name="username" value="{{ $user->username }}" placeholder="Usuario">
    <input type="text" name="names" value="{{ $user->names }}" placeholder="Nombres">
    <div class="row">
    	<div class="col-md-6">
    		<input type="text" name="paternal_surname" value="{{ $user->paternal_surname }}" placeholder="Apellido Paterno">
    	</div>
    	<div class="col-md-6">
    		<input type="text" name="maternal_surname" value="{{ $user->maternal_surname }}" placeholder="Apellido Materno">
    	</div>
    </div>
    <div class="row">
    	<div class="col-md-6">
    	<input type="email" name="email" placeholder="Correo" value="{{ $user->email }}" pattern="^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$)">
    	</div>
    	<div class="col-md-6">
    	<input type="password" name="password" value="" placeholder="Contraseña">
    	</div>
    </div>
    <button type="submit" class="btn-lg btn-primary">Actualizar Usuario</button>
{{ csrf_field() }}
</form>
@endsection