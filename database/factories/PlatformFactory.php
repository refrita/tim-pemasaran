<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class PlatformFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->company(),
            'jenis' => $this->faker->randomElement(['Sosial Media', 'Marketplace', 'Website', 'Mobile App']),
        ];
    }
}
