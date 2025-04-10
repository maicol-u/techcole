<?php

namespace App\Filament\AdminColegio\Resources\ColegioContactoResource\Pages;

use App\Filament\AdminColegio\Resources\ColegioContactoResource;
use App\Models\ColegioContacto;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Support\Facades\Auth;

class ListColegioContactos extends ListRecords
{
    protected static string $resource = ColegioContactoResource::class;

    public function mount(): void
    {
        if (Auth::user()->hasRole('superadmin')) {
            $this->superAdminMount();
        } else {
            $this->noSuperAdminMount();
        }
    }

    private function superAdminMount(){
        $this->authorizeAccess();

        $this->loadDefaultActiveTab();
    }

    private function noSuperAdminMount(): void {
        $colegioId = Auth::user()->colegio_id;

        $config = ColegioContacto::where('colegio_id', $colegioId)->first();

        if ($config) {
            redirect()->route('filament.admin-colegio.resources.colegio-contactos.edit', ['record' => $config->id]);
        } else {
            redirect()->route('filament.admin-colegio.resources.colegio-contactos.create');
        }
    }

}
