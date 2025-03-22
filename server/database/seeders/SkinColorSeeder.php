<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkinColorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $skinColors = [
            ['skin_color_name' => 'Claro', 'skin_color_hex' => '#F1C27D'],
            ['skin_color_name' => 'Médio', 'skin_color_hex' => '#D39B6A'],
            ['skin_color_name' => 'Oliva', 'skin_color_hex' => '#6B4F35'],
            ['skin_color_name' => 'Escuro', 'skin_color_hex' => '#3E1F14'],
            ['skin_color_name' => 'Negro', 'skin_color_hex' => '#2A1B18'],
        ];

        DB::table('skin_colors')->insert($skinColors);
    }
}
