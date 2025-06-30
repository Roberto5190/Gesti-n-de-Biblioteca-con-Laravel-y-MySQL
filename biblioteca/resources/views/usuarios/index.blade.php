@extends('layouts.app')
@section('title','Listado de Usuarios')
@section('content')
<a href="{{ route('usuarios.create') }}" class="btn btn-primary mb-3">Nuevo usuario</a>
<table class="table table-bordered">
    <thead><tr><th>ID</th><th>Nombre</th><th>Email</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->email }}</td>
                <td>
                    <a href="{{ route('usuarios.show',$usuario) }}"  class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('usuarios.edit',$usuario) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('usuarios.destroy',$usuario) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
