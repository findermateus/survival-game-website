<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class GenderSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('genders')->insert([
            [
                'gender_name' => 'Masculino'
            ],
            [
                'gender_name' => 'Feminino'
            ],
            [
                'gender_name' => 'Outros'
            ]
        ]);
    }
}
