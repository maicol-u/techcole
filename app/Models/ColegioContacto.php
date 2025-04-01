<?php

namespace App\Models;

use App\Models\Scopes\ColegioScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ScopedBy([ColegioScope::class])]
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
