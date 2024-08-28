<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AdherentResource\Pages;
use App\Filament\Resources\AdherentResource\RelationManagers;
use App\Models\Adherent;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class AdherentResource extends Resource
{
    protected static ?string $model = Adherent::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                TextInput::make('nom')->required(),
                TextInput::make('prenom')->required(),
                TextInput::make('adresse'),
                TextInput::make('contact'),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('nom')->searchable(),
                TextColumn::make('prenom')->searchable(),
                TextColumn::make('adresse'),
                TextColumn::make('contact'),

            ])->defaultSort('nom', 'asc')->searchPlaceholder('Rechercher (Nom, Prénom)')
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make()->modal(),
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
            'index' => Pages\ListAdherents::route('/'),
            'create' => Pages\CreateAdherent::route('/create'),
            'edit' => Pages\EditAdherent::route('/{record}/edit'),
        ];
    }
}
