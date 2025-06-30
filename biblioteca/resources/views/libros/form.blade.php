{{-- resources/views/libros/form.blade.php --}}
@csrf
<div class="mb-3">
    <label class="form-label">Título</label>
    <input type="text" name="titulo" class="form-control" value="{{ old('titulo',$libro->titulo ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Autor</label>
    <input type="text" name="autor" class="form-control" value="{{ old('autor',$libro->autor ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">ISBN</label>
    <input type="text" name="isbn" class="form-control" value="{{ old('isbn',$libro->isbn ?? '') }}" required>
</div>
<div class="mb-3 row">
    <div class="col">
        <label class="form-label">Año pub.</label>
        <input type="number" name="anio_publicacion" class="form-control"
               value="{{ old('anio_publicacion',$libro->anio_publicacion ?? '') }}" required>
    </div>
    <div class="col">
        <label class="form-label">Ejemplares total</label>
        <input type="number" name="ejemplares_total" class="form-control"
               value="{{ old('ejemplares_total',$libro->ejemplares_total ?? 1) }}" required>
    </div>
    <div class="col">
        <label class="form-label">Ejemplares disponibles</label>
        <input type="number" name="ejemplares_disponibles" class="form-control"
               value="{{ old('ejemplares_disponibles',$libro->ejemplares_disponibles ?? 1) }}" required>
    </div>
</div>
<button class="btn btn-success">Guardar</button>
