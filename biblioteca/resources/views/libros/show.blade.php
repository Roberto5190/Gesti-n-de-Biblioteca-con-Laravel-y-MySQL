@extends('layouts.app')
@section('title','Detalle Libro')
@section('content')
<h2>{{ $libro->titulo }}</h2>
<ul class="list-group mb-3">
    <li class="list-group-item"><strong>Autor:</strong> {{ $libro->autor }}</li>
    <li class="list-group-item"><strong>ISBN:</strong> {{ $libro->isbn }}</li>
    <li class="list-group-item"><strong>Año:</strong> {{ $libro->anio_publicacion }}</li>
    <li class="list-group-item"><strong>Disponibles:</strong> {{ $libro->ejemplares_disponibles }} / {{ $libro->ejemplares_total }}</li>
</ul>
<a href="{{ route('libros.edit',$libro) }}" class="btn btn-warning">Editar</a>
<a href="{{ route('libros.index') }}" class="btn btn-secondary">Volver</a>
@endsection
