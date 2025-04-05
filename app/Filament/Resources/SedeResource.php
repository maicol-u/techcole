<?php

namespace App\Filament\Resources;

use App\Filament\Resources\SedeResource\Pages;
use App\Filament\Resources\SedeResource\RelationManagers;
use App\Models\Sede;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use App\Models\Colegio;
use App\Models\Jornada;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;

class SedeResource extends Resource
{
    protected static ?string $model = Sede::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Colegios';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('colegio_id')
                    ->label('Colegio')
                    ->options(Colegio::pluck('nombre', 'id'))
                    ->searchable()
                    ->required(),

                TextInput::make('nombre')
                    ->label('Nombre de la sede')
                    ->required()
                    ->maxLength(255),

                Select::make('jornadas')
                    ->label('Jornadas')
                    ->multiple()
                    ->searchable()
                    ->preload()
                    ->relationship('jornadas', 'nombre', modifyQueryUsing: function ($query, callable $get) {
                        $colegioId = $get('colegio_id');
                
                        if ($colegioId) {
                            $query->where('colegio_id', $colegioId);
                        }
                    })
                    ->required()

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->label('Nombre'),
                Tables\Columns\TextColumn::make('colegio.nombre')->label('Colegio'),
                Tables\Columns\TextColumn::make('jornadas.nombre')
                    ->label('Jornadas')
                    ->badge()
                    ->separator(', '),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListSedes::route('/'),
            'create' => Pages\CreateSede::route('/create'),
            'edit' => Pages\EditSede::route('/{record}/edit'),
        ];
    }
}
