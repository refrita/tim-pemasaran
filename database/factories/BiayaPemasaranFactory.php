<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

class BiayaPemasaranFactory extends Factory
{
    public function definition(): array
    {
        return [
            'total_anggaran' => $this->faker->numberBetween(5000000, 20000000),
            'anggaran_tersedia' => $this->faker->numberBetween(1000000, 5000000),
            'bulan_berlaku' => $this->faker->date('Y-m-d'),
            'status' => $this->faker->randomElement(['Aktif', 'Pending', 'Selesai']),
        ];
    }
}
