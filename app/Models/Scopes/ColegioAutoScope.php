<?php

namespace App\Models\Scopes;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Scope;
use Illuminate\Support\Facades\Auth;

class ColegioAutoScope implements Scope
{
    /**
     * Apply the scope to a given Eloquent query builder.
     */
    public function apply(Builder $builder, Model $model): void
    {
        $user = Auth::user();   

        if (!$user) {
            return;
        }

        if ($user->hasRole('superadmin')) {
            return;
        }

        if ($user->colegio_id) {
            
            $builder->where('id', $user->colegio_id);
        }
    }
}
