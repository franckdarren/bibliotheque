<?php

namespace App\Filament\Resources\PretResource\Pages;

use App\Filament\Resources\PretResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListPrets extends ListRecords
{
    protected static string $resource = PretResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }
}
