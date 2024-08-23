<?php

namespace App\Filament\Resources;

use App\Filament\Resources\PretResource\Pages;
use App\Filament\Resources\PretResource\RelationManagers;
use App\Models\Pret;
use Filament\Forms;
use Filament\Forms\Form;
use Filament\Forms\FormsComponent;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class PretResource extends Resource
{
    protected static ?string $model = Pret::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('adherent_id')
                    ->relationship('adherent', 'nom')
                    ->required(),
                Forms\Components\Select::make('ouvrage_id')
                    ->relationship('ouvrage', 'titre')
                    ->required(),
                Forms\Components\DatePicker::make('date_retour')
                    ->required(),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('adherent.nom'),
                Tables\Columns\TextColumn::make('ouvrage.titre'),
                Tables\Columns\TextColumn::make('date_retour')->date(),

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
            'index' => Pages\ListPrets::route('/'),
            'create' => Pages\CreatePret::route('/create'),
            'edit' => Pages\EditPret::route('/{record}/edit'),
        ];
    }
}
