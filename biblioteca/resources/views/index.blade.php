@extends('layouts.app')
@section('title','Dashboard')
@section('content')
<h2 class="mb-4">Resumen general</h2>

<div class="row row-cols-1 row-cols-md-4 g-3 mb-4">
    <div class="col"><div class="card text-center"><div class="card-body">
        <h5>Total libros</h5><h3>{{ $stats['total_libros'] }}</h3>
    </div></div></div>
    <div class="col"><div class="card text-center"><div class="card-body">
        <h5>Ejemplares prestados</h5><h3>{{ $stats['ejemplares_prestados'] }}</h3>
    </div></div></div>
    <div class="col"><div class="card text-center"><div class="card-body">
        <h5>Usuarios</h5><h3>{{ $stats['usuarios_registrados'] }}</h3>
    </div></div></div>
    <div class="col"><div class="card text-center"><div class="card-body">
        <h5>Préstamos hoy</h5><h3>{{ $stats['prestamos_hoy'] }}</h3>
    </div></div></div>
</div>

<h2 class="mb-3">Top 5 libros más prestados</h2>
<canvas id="chartTop"></canvas>

@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
  const data = {
    labels: {!! $topLibros->pluck('titulo')->toJson() !!},
    datasets: [{
      label: 'Cantidad de préstamos',
      data : {!! $topLibros->pluck('total_prestamos')->toJson() !!},
      borderWidth: 1
    }]
  };
  new Chart(document.getElementById('chartTop'), {
    type: 'bar',
    data,
    options: { responsive:true, plugins:{legend:{display:false}} }
  });
</script>
@endpush
@endsection
