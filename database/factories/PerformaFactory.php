<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Performa>
 */
class PerformaFactory extends Factory
{
    public function definition(): array
    {
        return [
            'jumlah_tayang' => $this->faker->numberBetween(100, 10000),
            'jumlah_klik' => $this->faker->numberBetween(10, 5000),
            'konversi' => $this->faker->randomElement(['Leads', 'Sales', 'Signup', 'None']),
            'tanggal' => $this->faker->date(),
        ];
    }
}
