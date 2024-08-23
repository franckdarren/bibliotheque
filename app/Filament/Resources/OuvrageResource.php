<?php

namespace App\Filament\Resources;

use App\Filament\Resources\OuvrageResource\Pages;
use App\Filament\Resources\OuvrageResource\RelationManagers;
use App\Models\Ouvrage;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\TextColumn;
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
                TextInput::make('type'),
                TextInput::make('titre'),
                TextInput::make('thematique'),
                TextInput::make('nb_page'),
                TextInput::make('date_parution'),
                TextInput::make('auteur'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('titre'),
                TextColumn::make('type'),
                TextColumn::make('thematique'),
                TextColumn::make('nb_page'),
                TextColumn::make('date_parution'),
                TextColumn::make('auteur'),
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
