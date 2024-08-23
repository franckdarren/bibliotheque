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
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;


class OuvrageResource extends Resource
{
    protected static ?string $model = Ouvrage::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Select::make('type')
                    ->options([
                        'Livre' => 'Livre',
                        'Rapport' => 'Rapport',
                    ])
                    ->native(false),
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
                TextColumn::make('titre')->searchable(),
                TextColumn::make('type'),
                TextColumn::make('thematique')->searchable(),
                TextColumn::make('nb_page'),
                TextColumn::make('date_parution')->searchable(),
                TextColumn::make('auteur')->searchable(),
            ])
            ->filters([
                Filter::make('rapport')
                    ->query(fn(Builder $query): Builder => $query->where('type', 'Rapport')),
                Filter::make('livre')
                    ->query(fn(Builder $query): Builder => $query->where('type', 'Rapport'))
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
