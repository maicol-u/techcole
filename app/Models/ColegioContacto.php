<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ColegioContacto extends Model
{
    protected $fillable = [
        'colegio_id', 'direccion', 'telefono', 'telefono2', 'email', 
        'ciudad', 'departamento', 'pais', 'sitio_web'
    ];

    public function colegio(): BelongsTo
    {
        return $this->belongsTo(Colegio::class);
    }
}
