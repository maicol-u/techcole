<?php

namespace App\Filament\Resources\ColegioResource\Pages;

use App\Filament\Resources\ColegioResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditColegio extends EditRecord
{
    protected static string $resource = ColegioResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
