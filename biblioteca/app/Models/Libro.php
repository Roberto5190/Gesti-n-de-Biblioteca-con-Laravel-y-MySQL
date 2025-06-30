<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Libro extends Model
{
    use HasFactory;

    protected $table = 'libros';
    protected $fillable = [
        'titulo', 'autor', 'isbn', 'anio_publicacion',
        'ejemplares_total', 'ejemplares_disponibles',
    ];

    /** Relaciones */
    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }


    //Helper disponibilidad
    public function disponible(): bool
    {
    return $this->ejemplares_disponibles > 0;
    }
}
