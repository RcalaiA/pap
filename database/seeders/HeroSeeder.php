<?php

namespace Database\Seeders;

use App\Models\Hero;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HeroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {           
        Hero::create([
            'image' => 'hero1.jpg',
        ]);

        Hero::create([
            'image' => 'hero2.png',
        ]);

        Hero::create([
            'image' => 'hero3.jpg',
            'title' => 'Hero 3'
        ]);

        Hero::create([
            'image' => 'hero2.png',
        ]);

        Hero::create([
            'image' => 'hero5.png',
            'title' => 'Estádio do Dragão',
            'subtitle' => 'Estádio do Dragão',
        ]);
    }
}
