<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Platform;

class PlatformSeeder extends Seeder
{
    public function run(): void
    {
        // Generate 10 data dummy
        Platform::factory()->count(10)->create();
    }
}
