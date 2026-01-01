<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ConferenceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('conferences')->insert([
            [
                'title' => 'TechForward – ateities technologijos: AI, kvantinė kompiuterija, Web3, XR',
                'lecturer' => 'Dr. Arnas Brown',
                'address' => 'Vilnius, Lietuva',
                'date_time' => now()->addDays(30),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'Women in Tech Conference – moterų stiprinimas IT sektoriuje',
                'lecturer' => 'Monika Giedrė',
                'address' => 'Vilnius, Lietuva',
                'date_time' => now()->addDays(90),
                'is_active' => true,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'CyberShield – kibernetinis saugumas, grėsmės, prevencija',
                'lecturer' => 'Marius Saugus',
                'address' => 'Kaunas, Lietuva',
                'date_time' => now()->subDays(5),
                'is_active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'title' => 'UX & Tech Experience – naudotojų patirtis skaitmeniniuose produktuose',
                'lecturer' => 'Lina Dizainė',
                'address' => 'Kaunas, Lietuva',
                'date_time' => now()->subDays(10),
                'is_active' => false,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
