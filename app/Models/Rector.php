<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Rector extends Model
{
    protected $table = 'rectores';

    protected $fillable = [
        'nombre', 'tipo_documento', 'documento', 'celular', 'colegio_id'
    ];

    // Relación uno a uno con la tabla colegios
    public function colegio()
    {
        return $this->belongsTo(Colegio::class); // Relación inversa
    }
}
