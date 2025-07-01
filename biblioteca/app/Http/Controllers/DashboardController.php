<?php

namespace App\Http\Controllers;

use App\Models\{Libro, Prestamo, Usuario};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_libros'         => Libro::count(),
            'ejemplares_prestados' => Prestamo::whereNull('fecha_devolucion_real')->count(),
            'usuarios_registrados' => Usuario::count(),
            'prestamos_hoy'        => Prestamo::whereDate('created_at', today())->count(),
        ];

        // Top 5 libros más prestados (para gráfico)
        $topLibros = DB::table('libros_mas_prestados')
            ->select('titulo', 'total_prestamos')
            ->limit(5)
            ->get();

        return view('dashboard.index', compact('stats', 'topLibros'));
    }
}
