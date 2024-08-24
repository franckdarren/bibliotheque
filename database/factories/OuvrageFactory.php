<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Enums\TypeOuvrage;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Ouvrage>
 */
class OuvrageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'type' => $this->faker->randomElement(TypeOuvrage::values()),
            'titre' => $this->faker->sentence(3),
            'thematique' => $this->faker->word,
            'nb_page' => $this->faker->numberBetween(100, 500),
            'date_parution' => $this->faker->year,
            'auteur' => $this->faker->name,
        ];
    }
}
