<?php

namespace App\Filament\Resources\PretResource\Pages;

use App\Filament\Resources\PretResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditPret extends EditRecord
{
    protected static string $resource = PretResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
        ];
    }
}
