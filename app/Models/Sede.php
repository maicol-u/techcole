<?php

namespace App\Models;

use App\Models\Scopes\ColegioScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([ColegioScope::class])]
class Sede extends Model
{
    protected $fillable = [
        'nombre',
        'colegio_id',
    ];

    public function colegio()
    {
        return $this->belongsTo(Colegio::class);
    }

    public function jornadas()
    {
        return $this->belongsToMany(Jornada::class);
    }
}
