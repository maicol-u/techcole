<?php

namespace App\Filament\AdminColegio\Resources\PeriodoAcademicoResource\Pages;

use App\Filament\AdminColegio\Resources\PeriodoAcademicoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPeriodoAcademicos extends ListRecords
{
    protected static string $resource = PeriodoAcademicoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
