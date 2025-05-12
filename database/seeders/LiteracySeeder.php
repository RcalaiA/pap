<?php

namespace Database\Seeders;

use App\Models\Literacy;
use Illuminate\Database\Seeder;

class LiteracySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Literacy::create([
            'name' => 'Literacia Digital',
            'slug' => 'ld',
            'description' => 'A literacia digital refere-se à capacidade de utilizar a tecnologia com sucesso e eficácia, em diversas formas e para diversos fins.',
            'image' => 'digital.png',
        ]);

        Literacy::create([
            'name' => 'Literacia de Computação',
            'slug' => 'lc',
            'description' => 'A literacia informática é definida como o conhecimento e a capacidade de utilizar computadores e tecnologias relacionadas de forma eficiente, com níveis de competências que vão desde a utilização elementar até à programação de computadores e à resolução avançada de problemas.',
            'image' => 'computer.png',
        ]);

        Literacy::create([
            'name' => 'Literacia Financeira',
            'slug' => 'lf',
            'description' => 'A literacia financeira é a capacidade de compreender e gerenciar com eficácia as finanças pessoais, incluindo conceitos como orçamento, poupança, investimento e gerenciamento de dívidas.',
            'image' => 'hand.png',
        ]);

        Literacy::create([
            'name' => 'Literacia de Direitos Humanos',
            'slug' => 'ldh',
            'description' => 'A literacia de direitos humanos implica compreender, respeitar e defender os direitos fundamentais dos seres humanos, promovendo uma cultura de paz e igualdade.',
            'image' => 'rights.png',
        ]);

        Literacy::create([
            'name' => 'Literacia Ambiental',
            'slug' => 'la',
            'description' => 'A literacia ambiental envolve o entendimento das questões ecológicas e a capacidade de agir de forma sustentável, promovendo o respeito pelo meio ambiente.',
            'image' => 'environment.png',
        ]);

        Literacy::create([
            'name' => 'Literacia em Saúde',
            'slug' => 'ls',
            'description' => 'A literacia em saúde refere-se à capacidade de entender informações relacionadas com a saúde e tomar decisões informadas sobre o bem-estar pessoal.',
            'image' => 'health.png',
        ]);

        Literacy::create([
            'name' => 'Literacia em Media',
            'slug' => 'lm',
            'description' => 'A literacia em media envolve a compreensão crítica dos media, suas influências e o desenvolvimento de competências para consumir, produzir e analisar conteúdos mediáticos.',
            'image' => 'media.png',
        ]);
    }
}
