<?php

namespace Database\Factories;

use App\Models\Literacy;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class LiteracyFactory extends Factory {
    protected $model = Literacy::class;

    public function definition(): array {
        return [
            'name' => $this->faker->sentence(3), // Gera um nome aleatório
            'description' => $this->faker->paragraph(), // Gera uma descrição aleatória
            'slug' => Str::slug($this->faker->sentence(3)), // Slug gerado a partir do nome
            'image' => 'default.jpg', // Nome da imagem padrão
            'image_high_res' => 'default_high_res.jpg',
        ];
    }
}
