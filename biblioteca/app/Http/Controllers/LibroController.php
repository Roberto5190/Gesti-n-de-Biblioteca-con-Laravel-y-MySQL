<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
	    $libros = Libro::query()
	        ->when($request->filled('q'), function ($q) use ($request) {
	            $q->where(function ($sub) use ($request) {
	                $sub->where('titulo', 'LIKE', "%{$request->q}%")
	                    ->orWhere('autor', 'LIKE', "%{$request->q}%");
	            });
	        })
	        ->when($request->filled('anio'), fn($q) => $q->where('anio_publicacion', $request->anio))
	        ->when($request->disp==='1',     fn($q) => $q->disponibles())
	        ->orderBy('titulo')
	        ->paginate(10)
	        ->withQueryString();   // mantiene parámetros en la paginación

	    return view('libros.index', compact('libros'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('libros.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Libro::create($request->all());
	return redirect()->route('libros.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Libro $libro)
    {
        return view('libros.show', compact('libro'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        return view('libros.edit', compact('libro'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Libro $libro)
    {
        $libro->update($request->all());
    	return redirect()->route('libros.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Libro $libro)
    {
        $libro->delete();
        return redirect()->route('libros.index');
    }
}
