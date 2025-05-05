<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Platform>
 */
class PlatformFactory extends Factory
{
    public function definition(): array
    {
        return [
            'nama' => $this->faker->word(),
            'jenis' => $this->faker->randomElement([
                'Sosial Media',
                'Search Engine',
                'Video Sharing',
                'Professional Networking',
                'Audio Streaming',
                'Ad Mediation',
                'Game Development',
            ]),
        ];
    }
}
