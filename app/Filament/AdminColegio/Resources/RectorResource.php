<?php

namespace App\Filament\AdminColegio\Resources;

use App\Filament\AdminColegio\Resources\RectorResource\Pages;
use App\Filament\AdminColegio\Resources\RectorResource\RelationManagers;
use App\Models\Rector;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class RectorResource extends Resource
{
    protected static ?string $model = Rector::class;

    protected static ?string $navigationIcon = 'heroicon-o-user';

    protected static ?string $navigationGroup = 'Configuración';

    protected static ?string $navigationLabel = 'Rectores';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\TextInput::make('nombre')
                    ->label('Nombre del Rector')
                    ->required()
                    ->maxLength(255),

                Forms\Components\Select::make('tipo_documento')
                    ->label('Tipo Documento')
                    ->required()
                    ->options([
                        'C.C' => 'C.C',
                        'C.E' => 'C.E',
                        'N.U.I' => 'N.U.I',
                    ]),

                Forms\Components\TextInput::make('documento')
                    ->label('No. Documento')
                    ->required()
                    ->maxLength(100),

                Forms\Components\TextInput::make('celular')
                    ->label('Celular')
                    ->nullable()
                    ->maxLength(20)
                    ->tel(),

                Forms\Components\Select::make('colegio_id')
                    ->label('Colegio')
                    ->relationship('colegio', 'nombre')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('nombre')->searchable(),
                Tables\Columns\TextColumn::make('tipo_documento'),
                Tables\Columns\TextColumn::make('documento'),
                Tables\Columns\TextColumn::make('celular'),
                Tables\Columns\TextColumn::make('colegio.nombre')->label('Colegio'),
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->label('Editar'),
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
            'index' => Pages\ListRectors::route('/'),
            'create' => Pages\CreateRector::route('/create'),
            'edit' => Pages\EditRector::route('/{record}/edit'),
        ];
    }
}
