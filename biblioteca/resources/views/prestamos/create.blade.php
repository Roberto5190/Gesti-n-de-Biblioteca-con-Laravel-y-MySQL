@extends('layouts.app')
@section('title','Nuevo Préstamo')
@section('content')
<h2>Registrar préstamo</h2>
<form action="{{ route('prestamos.store') }}" method="POST">
  @csrf
  <div class="mb-3">
    <label class="form-label">Libro</label>
    <select name="libro_id" class="form-select" required>
      <option value="">Seleccione…</option>
      @foreach($libros as $l)
        <option value="{{ $l->id }}">{{ $l->titulo }} (Disp: {{ $l->ejemplares_disponibles }})</option>
      @endforeach
    </select>
  </div>
  <div class="mb-3">
    <label class="form-label">Usuario</label>
    <select name="usuario_id" class="form-select" required>
      <option value="">Seleccione…</option>
      @foreach($usuarios as $u)
        <option value="{{ $u->id }}">{{ $u->nombre }}</option>
      @endforeach
    </select>
  </div>
  <button class="btn btn-success">Guardar</button>
</form>
@endsection
