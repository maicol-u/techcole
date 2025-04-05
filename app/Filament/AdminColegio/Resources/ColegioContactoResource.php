<?php

namespace App\Filament\AdminColegio\Resources;

use App\Filament\AdminColegio\Resources\ColegioContactoResource\Pages;
use App\Filament\AdminColegio\Resources\ColegioContactoResource\RelationManagers;
use App\Models\ColegioContacto;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ColegioContactoResource extends Resource
{
    protected static ?string $model = ColegioContacto::class;

    protected static ?string $navigationIcon = 'heroicon-o-map-pin';

    protected static ?string $navigationGroup = 'Configuración';

    protected static ?string $navigationLabel = 'Información de Contacto';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('colegio_id')
                    ->relationship('colegio', 'nombre')
                    ->required()
                    ->searchable(),

                Forms\Components\TextInput::make('direccion')->required(),
                Forms\Components\TextInput::make('telefono'),
                Forms\Components\TextInput::make('telefono2'),
                Forms\Components\TextInput::make('email')->email(),
                Forms\Components\TextInput::make('ciudad'),
                Forms\Components\TextInput::make('departamento'),
                Forms\Components\TextInput::make('pais'),
                Forms\Components\TextInput::make('sitio_web')->url(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('colegio.nombre')->label('Colegio'),
                Tables\Columns\TextColumn::make('direccion')->sortable(),
                Tables\Columns\TextColumn::make('telefono'),
                Tables\Columns\TextColumn::make('email'),
                Tables\Columns\TextColumn::make('ciudad'),
                Tables\Columns\TextColumn::make('departamento'),
            ])
            ->filters([
                Tables\Filters\SelectFilter::make('colegio_id')
                    ->relationship('colegio', 'nombre')
                    ->label('Colegios'),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListColegioContactos::route('/'),
            'create' => Pages\CreateColegioContacto::route('/create'),
            'edit' => Pages\EditColegioContacto::route('/{record}/edit'),
        ];
    }
}
