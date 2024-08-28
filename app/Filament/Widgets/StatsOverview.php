<?php

namespace App\Filament\Widgets;

use App\Models\Adherent;
use App\Models\Ouvrage;
use App\Models\Pret;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;

class StatsOverview extends BaseWidget
{
    protected function getStats(): array
    {
        return [
            Stat::make("Nombre d'ouvrages", Ouvrage::count()),
            Stat::make("Nombre d'adhérents", Adherent::count()),
            Stat::make("Nombre de prêts en cours", Pret::where('status', 'Non rendu')->count()),
        ];
    }
}
