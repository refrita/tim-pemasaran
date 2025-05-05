<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Iklan>
 */
class IklanFactory extends Factory
{
    public function definition(): array
    {
        return [
            'id_biaya_pemasaran' => $this->faker->numberBetween(1, 100),
            'id_platform' => $this->faker->numberBetween(1, 50),
            'nama' => $this->faker->words(3, true),
            'kategori' => $this->faker->randomElement([
                'Produk',
                'Layanan',
                'Brand Awareness',
                'Event',
                'Kampanye Sosial',
                'Rekrutmen',
            ]),
            'tanggal_peluncuran' => $this->faker->date(),
            'tanggal_selesai' => $this->faker->date(),
        ];
    }
}
