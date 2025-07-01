<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prestamo extends Model
{
    use HasFactory;

    protected $table = 'prestamos';
    protected $fillable = [
        'libro_id', 'usuario_id',
        'fecha_prestamo', 'fecha_devolucion_prevista', 'fecha_devolucion_real',
    ];

    /* <<< NUEVO: convierte las columnas en objetos Carbon >>> */
    protected $casts = [
        'fecha_prestamo'            => 'date',     // o 'datetime'
        'fecha_devolucion_prevista' => 'date',
        'fecha_devolucion_real'     => 'date',
    ];



    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }


    //Prestamos vencidos
    public function scopeVencidos($q)
    {
	return $q->whereNull('fecha_devolucion_real')
		 ->where('fecha_devolucion_prevista', '<', now());
    }

}
