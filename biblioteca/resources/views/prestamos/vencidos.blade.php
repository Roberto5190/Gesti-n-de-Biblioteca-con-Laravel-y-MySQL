@extends('layouts.app')
@section('title','Préstamos vencidos')
@section('content')
<h2>Préstamos vencidos</h2>
<table class="table table-bordered">
    <thead>
      <tr><th>Libro</th><th>Usuario</th><th>Devolución prevista</th><th>Días de retraso</th></tr>
    </thead>
    <tbody>
    @foreach($prestamos as $p)
      <tr class="table-danger">
        <td>{{ $p->libro->titulo }}</td>
        <td>{{ $p->usuario->nombre }}</td>
        <td>{{ $p->fecha_devolucion_prevista->format('d/m/Y') }}</td>
        <td>{{ $p->fecha_devolucion_prevista->diffInDays(now()) }}</td>
      </tr>
    @endforeach
    </tbody>
</table>
{{ $prestamos->links() }}
@endsection
