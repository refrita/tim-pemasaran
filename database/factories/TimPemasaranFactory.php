<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\TimPemasaran>
 */
class TimPemasaranFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_biaya_pemasaran' => $this->faker->numberBetween(1, 100),
            'id_platform' => $this->faker->numberBetween(1, 50),
            'nama_anggota' => $this->faker->name(),
            'jabatan_anggota' => $this->faker->randomElement([
                'Manager',
                'Spesialis Iklan',
                'Content Creator',
                'Analis Data',
                'SEO Expert',
            ]),
            'nama_pengguna' => $this->faker->userName(),
            'kata_sandi' => bcrypt('password123'), // atau bisa plain $this->faker->password()
        ];
    }
}
