@extends('layouts.app')
@section('title','Préstamos')
@section('content')
<a href="{{ route('prestamos.create') }}" class="btn btn-primary mb-3">Nuevo préstamo</a>
<table class="table table-bordered">
  <thead>
    <tr><th>ID</th><th>Libro</th><th>Usuario</th><th>Prestado</th><th>Dev. prevista</th><th>Dev. real</th><th>Acciones</th></tr>
  </thead>
  <tbody>
  @foreach($prestamos as $p)
    <tr>
      <td>{{ $p->id }}</td>
      <td>{{ $p->libro->titulo }}</td>
      <td>{{ $p->usuario->nombre }}</td>
      <td>{{ $p->fecha_prestamo->format('d/m/Y') }}</td>
      <td>{{ $p->fecha_devolucion_prevista->format('d/m/Y') }}</td>
      <td>{{ $p->fecha_devolucion_real? $p->fecha_devolucion_real->format('d/m/Y') : '—' }}</td>
      <td>
        @if(is_null($p->fecha_devolucion_real))
          <form action="{{ route('prestamos.update',$p) }}" method="POST" class="d-inline">
            @csrf @method('PUT')
            <button class="btn btn-sm btn-success">Marcar devuelto</button>
          </form>
        @endif
      </td>
    </tr>
  @endforeach
  </tbody>
</table>
{{ $prestamos->links() }}
@endsection
