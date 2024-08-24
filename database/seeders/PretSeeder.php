<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Ouvrage;
use App\Models\Adherent;
use App\Models\Pret;
use Illuminate\Support\Arr;

class PretSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Assurez-vous qu'il y a des ouvrages et des adhérents dans la base de données
        $ouvrages = Ouvrage::all();
        $adherents = Adherent::all();

        // Créez 20 prêts en utilisant les ouvrages et adhérents existants
        Pret::factory()->count(20)->make()->each(function ($pret) use ($ouvrages, $adherents) {
            $pret->ouvrage_id = $ouvrages->random()->id;
            $pret->adherent_id = $adherents->random()->id;

            $pret->status = Arr::random(['Non rendu', 'Rendu']);
            $pret->save();
        });
    }
}
