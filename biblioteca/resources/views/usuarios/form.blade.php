@csrf
<div class="mb-3">
    <label class="form-label">Nombre</label>
    <input type="text" name="nombre" class="form-control"
           value="{{ old('nombre',$usuario->nombre ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Email</label>
    <input type="email" name="email" class="form-control"
           value="{{ old('email',$usuario->email ?? '') }}" required>
</div>
<div class="mb-3">
    <label class="form-label">Teléfono</label>
    <input type="text" name="telefono" class="form-control"
           value="{{ old('telefono',$usuario->telefono ?? '') }}">
</div>
<div class="mb-3">
    <label class="form-label">Dirección</label>
    <input type="text" name="direccion" class="form-control"
           value="{{ old('direccion',$usuario->direccion ?? '') }}">
</div>
<button class="btn btn-success">Guardar</button>
