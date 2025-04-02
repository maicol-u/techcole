<?php

namespace App\Filament\AdminColegio\Resources;

use App\Filament\AdminColegio\Resources\PeriodoAcademicoResource\Pages;
use App\Filament\AdminColegio\Resources\PeriodoAcademicoResource\RelationManagers;
use App\Models\PeriodoAcademico;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PeriodoAcademicoResource extends Resource
{
    protected static ?string $model = PeriodoAcademico::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    protected static ?string $navigationGroup = 'Configuración';

    protected static ?string $navigationLabel = 'Periodos Académicos';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('anio')
                    ->label('Año Académico')
                    ->options(array_combine(range(date('Y'), date('Y') + 5), range(date('Y'), date('Y') + 5)))
                    ->required(),

                Forms\Components\Select::make('semestre')
                    ->label('Semestre')
                    ->options([
                        1 => 'Primer Semestre (A)',
                        2 => 'Segundo Semestre (B)',
                    ])
                    ->required(),

                Forms\Components\DatePicker::make('inicio')
                    ->label('Fecha de Inicio')
                    ->required(),

                Forms\Components\DatePicker::make('fin')
                    ->label('Fecha de Finalización')
                    ->required(),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('anio')
                    ->label('Año')
                    ->sortable(),

                Tables\Columns\TextColumn::make('semestre')
                    ->label('Semestre / Trimestre')
                    ->formatStateUsing(fn($state) => match ($state) {
                        1 => 'Primer Semestre (A)',
                        2 => 'Segundo Semestre (B)',
                        default => 'Desconocido',
                    })
                    ->sortable(),

                Tables\Columns\TextColumn::make('inicio')
                    ->label('Fecha de Inicio')
                    ->date(),

                Tables\Columns\TextColumn::make('fin')
                    ->label('Fecha de Fin')
                    ->date(),
            ])
            ->filters([
                //
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
            'index' => Pages\ListPeriodoAcademicos::route('/'),
            'create' => Pages\CreatePeriodoAcademico::route('/create'),
            'edit' => Pages\EditPeriodoAcademico::route('/{record}/edit'),
        ];
    }
}
