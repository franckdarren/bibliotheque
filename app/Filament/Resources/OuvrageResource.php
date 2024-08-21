<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OuvrageResource\Pages;
use App\Filament\Resources\OuvrageResource\RelationManagers;
use App\Models\Ouvrage;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class OuvrageResource extends Resource
{
    protected static ?string $model = Ouvrage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                //
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                //
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
            'index' => Pages\ListOuvrages::route('/'),
            'create' => Pages\CreateOuvrage::route('/create'),
            'edit' => Pages\EditOuvrage::route('/{record}/edit'),
        ];
    }
}
