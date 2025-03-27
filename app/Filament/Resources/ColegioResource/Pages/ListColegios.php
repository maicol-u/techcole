<?php

namespace App\Filament\Resources\ColegioResource\Pages;

use App\Filament\Resources\ColegioResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListColegios extends ListRecords
{
    protected static string $resource = ColegioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
