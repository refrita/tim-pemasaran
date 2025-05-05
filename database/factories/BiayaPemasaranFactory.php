<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BiayaPemasaran>
 */
class BiayaPemasaranFactory extends Factory
{
    public function definition(): array
    {
        return [
            'total_anggaran' => $this->faker->numberBetween(1000000, 100000000),
            'anggaran_tersedia' => $this->faker->numberBetween(100000, 50000000),
            'bulan_berlaku' => $this->faker->date('Y-m-d'),
            'status' => $this->faker->randomElement(['Aktif', 'Tidak Aktif', 'Menunggu']),
        ];
    }
}
