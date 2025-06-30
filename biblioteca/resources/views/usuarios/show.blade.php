@extends('layouts.app')
@section('title','Detalle Usuario')
@section('content')
<h2>{{ $usuario->nombre }}</h2>
<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Email:</strong> {{ $usuario->email }}</li>
    <li class="list-group-item"><strong>Teléfono:</strong> {{ $usuario->telefono }}</li>
    <li class="list-group-item"><strong>Dirección:</strong> {{ $usuario->direccion }}</li>
</ul>
<a href="{{ route('usuarios.edit',$usuario) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('usuarios.index') }}" class="btn btn-secondary">Volver</a>
@endsection
