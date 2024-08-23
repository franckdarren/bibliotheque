<?php

namespace App\Filament\Resources\AdherentResource\Pages;

use App\Filament\Resources\AdherentResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListAdherents extends ListRecords
{
    protected static string $resource = AdherentResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    protected function getCreateActions(): array
    {
        return [
            Actions\CreateAction::make()->modal(),
        ];
    }


}
