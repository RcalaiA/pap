<?php

namespace Database\Seeders;

use App\Models\Literacy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class LiteracySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('literacies')->truncate();

        Literacy::create([
            'name' => 'Literacia Digital',
            'slug' => 'ld',
            'description' => 'A literacia digital refere-se à capacidade de utilizar a tecnologia com sucesso e eficácia, em diversas formas e para diversos fins.',
            'image' => 'digital.jpeg'          
        ]);

        Literacy::create([
            'name' => 'Literacia de Computação',
            'slug' => 'lc',
            'description' => 'A literacia informática é definida como o conhecimento e a capacidade de utilizar computadores e tecnologias relacionadas de forma eficiente, com níveis de competências que vão desde a utilização elementar até à programação de computadores e à resolução avançada de problemas.',
            'image' => 'computer.png'          
        ]);

        Literacy::create([
            'name' => 'Literacia Financeira',
            'slug' => 'lf',
            'description' => 'A literacia financeira é a capacidade de compreender e gerenciar com eficácia as finanças pessoais, incluindo conceitos como orçamento, poupança, investimento e gerenciamento de dívidas.',
            'image' => 'hand.png'          
        ]);
    }
}