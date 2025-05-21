<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Rui Calaia',
            'email' => 'rui@gmail.com',
        ]);

        $this->call([
            CategorySeeder::class,
            LiteracySeeder::class,
            DocumentSeeder::class,
            StorySeeder::class,
            HeroSeeder::class,
        ]);
    }
}
