@extends('layouts.app')
@section('title','Listado de Libros')
@section('content')
<a href="{{ route('libros.create') }}" class="btn btn-primary mb-3">Nuevo libro</a>



<form method="GET" action="{{ route('libros.index') }}" class="row g-2 mb-3">
    <div class="col">
        <input type="text" name="q"  value="{{ request('q')  }}" class="form-control" placeholder="Título o autor">
    </div>
    <div class="col">
        <input type="number" name="anio" value="{{ request('anio') }}" class="form-control" placeholder="Año">
    </div>
    <div class="col">
        <select name="disp" class="form-select">
            <option value="">Todos</option>
            <option value="1" {{ request('disp')==='1' ? 'selected' : '' }}>Solo disponibles</option>
        </select>
    </div>
    <div class="col-auto">
        <button class="btn btn-secondary">Buscar</button>
    </div>
</form>






<table class="table table-bordered">
    <thead><tr><th>ID</th><th>Título</th><th>Autor</th><th>Ejemplares</th><th>Acciones</th></tr></thead>
    <tbody>
        @foreach($libros as $libro)
            <tr>
                <td>{{ $libro->id }}</td>
                <td>{{ $libro->titulo }}</td>
                <td>{{ $libro->autor }}</td>
                <td>{{ $libro->ejemplares_disponibles }}/{{ $libro->ejemplares_total }}</td>
                <td>
                    <a href="{{ route('libros.show',$libro) }}" class="btn btn-sm btn-info">Ver</a>
                    <a href="{{ route('libros.edit',$libro) }}" class="btn btn-sm btn-warning">Editar</a>
                    <form action="{{ route('libros.destroy',$libro) }}" method="POST" class="d-inline">
                        @csrf @method('DELETE')
                        <button class="btn btn-sm btn-danger" onclick="return confirm('¿Eliminar?')">Borrar</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
@endsection
