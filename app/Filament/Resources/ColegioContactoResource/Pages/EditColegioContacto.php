<?php

namespace App\Filament\Resources\ColegioContactoResource\Pages;

use App\Filament\Resources\ColegioContactoResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditColegioContacto extends EditRecord
{
    protected static string $resource = ColegioContactoResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
