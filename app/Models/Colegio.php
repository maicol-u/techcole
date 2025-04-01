<?php

namespace App\Models;

use App\Models\Scopes\ColegioAutoScope;
use Illuminate\Database\Eloquent\Attributes\ScopedBy;
use Illuminate\Database\Eloquent\Model;

#[ScopedBy([ColegioAutoScope::class])]
class Colegio extends Model
{
    protected $fillable = ['nombre'];

    /**
     * Obtener los usuarios asociados con el colegio.
     */
    public function usuarios()
    {
        return $this->hasMany(User::class);
    }

    public function contacto()
    {
        return $this->hasOne(ColegioContacto::class);
    }
    
}
