<?php

namespace App\Filament\AdminColegio\Resources\PeriodoAcademicoResource\Pages;

use App\Filament\AdminColegio\Resources\PeriodoAcademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Facades\Auth;

class CreatePeriodoAcademico extends CreateRecord
{
    protected static string $resource = PeriodoAcademicoResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['colegio_id'] = Auth::user()->colegio_id;

        return $data;
    }
}
