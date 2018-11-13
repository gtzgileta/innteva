@extends('layouts.layout')

@section('title')Lista @endsection

@section('content')
    @if($users->count())
        <table class="table-striped">
            <thead>
                <tr>
                    <th>Nombre</th>
                    <th>Usuario</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                @foreach($users as $user)
                <tr>
                    <td>{{str_limit($user->names,22)}}</td>
                    <td>{{$user->username}}</td>
                    <td><a href="{{URL::route('edit',$user->username)}}" class="btn-sm btn-primary" title="Editar usuario">Editar</a> <a href="{{URL::route('delete',$user->username)}}" class="btn-sm btn-red confirm" title="Eliminar usuario">Eliminar</a></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>No hay usuarios qué mostrar.</p>
    @endif
@endsection