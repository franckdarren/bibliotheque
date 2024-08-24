<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;
use App\Models\Ouvrage;
use App\Models\Adherent;
use App\Models\Pret;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Pret>
 */
class PretFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */

    protected $model = Pret::class;
    public function definition(): array
    {
        $dateRetour = $this->faker->dateTimeBetween('+1 week', '+1 month');

        $status = $dateRetour < now() ? 'Non rendu' : 'Rendu';

        return [
            'date_retour' => $dateRetour,
            'status' => $status,
            'ouvrage_id' => Ouvrage::factory(),
            'adherent_id' => Adherent::factory(),
        ];
    }
}
