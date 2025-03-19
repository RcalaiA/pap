<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Manuais',
            'slug' => 'manuais',  
            'image' => 'manuais.jpg'          
        ]);
      
        Category::create([
            'name' => 'Cidadania e Desenvolvimento',
            'slug' => 'ced',
            'description' => 'Nesta categoria poderá encontrar informações sobre os domínios da área curricular de Cidadania e Desenvolvimento'            
        ]);

        Category::create([
            'name' => 'Bem-Estar Animal',
            'slug' => 'animal',              
        ]);
    }
}
