<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

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
    
}
