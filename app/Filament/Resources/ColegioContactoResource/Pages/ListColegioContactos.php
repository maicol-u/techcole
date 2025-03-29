<?php

namespace App\Filament\Resources\ColegioContactoResource\Pages;

use App\Filament\Resources\ColegioContactoResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColegioContactos extends ListRecords
{
    protected static string $resource = ColegioContactoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
