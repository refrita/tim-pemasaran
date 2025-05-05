<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('platform')->insert([
            [
                'id' => 10001,
                'nama' => 'Facebook Ads',
                'jenis' => 'Sosial Media',
            ],
            [
                'id' => 10002,
                'nama' => 'Google Ads',
                'jenis' => 'Search Engine',
            ],
            [
                'id' => 10003,
                'nama' => 'Instagram Ads',
                'jenis' => 'Sosial Media',
            ],
            [
                'id' => 10004,
                'nama' => 'TikTok Ads',
                'jenis' => 'Video Sharing',
            ],
            [
                'id' => 10005,
                'nama' => 'YouTube Ads',
                'jenis' => 'Video Sharing',
            ],
        ]);
    }
}
