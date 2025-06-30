<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use App\Models\{Prestamo, Libro, Usuario};

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $prestamos = Prestamo::with(['libro','usuario'])->orderByDesc('created_at')->paginate(10);
        return view('prestamos.index', compact('prestamos'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $libros   = Libro::where('ejemplares_disponibles','>',0)->orderBy('titulo')->get();
        $usuarios = Usuario::orderBy('nombre')->get();
        return view('prestamos.create', compact('libros','usuarios'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $r->validate([
            'libro_id'  => 'required|exists:libros,id',
            'usuario_id'=> 'required|exists:usuarios,id',
        ]);

        $libro = Libro::findOrFail($r->libro_id);
        abort_if($libro->ejemplares_disponibles < 1, 400, 'No hay ejemplares disponibles');

        // registrar préstamo
        Prestamo::create([
            'libro_id'                 => $libro->id,
            'usuario_id'               => $r->usuario_id,
            'fecha_prestamo'           => now(),
            'fecha_devolucion_prevista'=> now()->addDays(14),
        ]);

        // restar disponibilidad
        $libro->decrement('ejemplares_disponibles');

        return redirect()->route('prestamos.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Prestamo $prestamo)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        if ($prestamo->fecha_devolucion_real === null) {
            $prestamo->update(['fecha_devolucion_real' => now()]);
            $prestamo->libro->increment('ejemplares_disponibles');
        }
        return redirect()->route('prestamos.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        // sólo permitimos borrar registros cerrados
        abort_if(is_null($prestamo->fecha_devolucion_real), 400, 'Devuelve antes de eliminar');
        $prestamo->delete();
        return back();
    }
}
