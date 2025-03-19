<?php

namespace Database\Seeders;

use App\Models\Story;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Story::create([
            'title' => 'Salve o Ralph',
            'image' => 'ralph.png',
            'summary' => 'Novo vídeo sobre o problema dos testes em animais.',
            'url' => 'https://www.youtube.com/watch?v=AjdMtLF0Z6w'
        ]);
    }
}
