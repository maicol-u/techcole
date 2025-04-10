<?php

namespace App\Filament\AdminColegio\Resources\ColegioContactoResource\Pages;

use App\Filament\AdminColegio\Resources\ColegioContactoResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateColegioContacto extends CreateRecord
{
    protected static string $resource = ColegioContactoResource::class;

    protected static ?string $title = 'Información de Contacto';

    protected static bool $canCreateAnother = false;
}
