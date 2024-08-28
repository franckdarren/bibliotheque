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
use Filament\Tables\Filters\Filter;
use Filament\Forms\Components\Select;


class PretResource extends Resource
{
    protected static ?string $model = Pret::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Forms\Components\Select::make('adherent_id')
                    ->label('Adherent')
                    ->options(function () {
                        return \App\Models\Adherent::all()->pluck('full_name', 'id');
                    })
                    ->required(),
                Forms\Components\Select::make('ouvrage_id')
                    ->relationship('ouvrage', 'titre')
                    ->required(),
                Forms\Components\DatePicker::make('date_retour')
                    ->required(),
                Select::make('status')
                    ->label('Statut')
                    ->options([
                        'Non rendu' => 'Non rendu',
                        'Rendu' => 'Rendu',
                    ])
                    ->native(false),

            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Tables\Columns\TextColumn::make('adherent.full_name')->searchable(),
                Tables\Columns\TextColumn::make('ouvrage.titre')->searchable(),
                Tables\Columns\TextColumn::make('created_at')->date('d/m/Y')->label("Date d'emprunt"),
                Tables\Columns\TextColumn::make('date_retour')->date('d/m/Y')->searchable(),
                Tables\Columns\TextColumn::make('status')->searchable()->label('Statut'),


            ])
            ->filters([])
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
