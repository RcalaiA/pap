<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Literacy;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $financial_id = Literacy::where('slug', 'lf')->first()->id;        
        $digital_id = Literacy::where('slug', 'ld')->first()->id;        

        $document = Document::create([
            'title' => 'Referencial de Educação Financeira',
            'image' => 'referencial_lf.png',
            'description' => 'O Referencial de Educação Financeira para a Educação Pré-Escolar, o Ensino Básico, o Ensino Secundário e a Educação e Formação de Adultos é o documento orientador para a implementação da educação financeira em contexto educativo e formativo.',
            'url' => 'https://dge.mec.pt/sites/default/files/ficheiros/referencial_de_educacao_financeira_final_versao_port.pdf'
        ]);
        
        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $financial_id,
        ]);

        $document = Document::create([
            'title' => 'Estratégia de Literacia Financeira Digital para Portugal',
            'image' => 'estrategia_lf.png',
            'description' => 'Este documento apresenta uma Estratégia de Literacia Financeira Digital para Portugal (doravante
“a Estratégia”) e foi elaborado no âmbito do projeto Design of a digital financial literacy strategy for
Portugal (Conceção de uma estratégia de literacia financeira digital para Portugal), desenvolvido pela
OCDE para o Banco de Portugal com o apoio da Comissão Europeia. A Estratégia inclui um Plano de
Implementação para o período 2023-2028.',
            'url' => 'https://www.bportugal.pt/sites/default/files/anexos/pdf-boletim/estrategia_de_literacia_financeira_digital_para_portugal.pdf'
        ]);

        DB::table('document_literacy')->insertOrIgnore([
            ['document_id' => $document->id, 'literacy_id' => $financial_id],
            ['document_id' => $document->id, 'literacy_id' => $digital_id]
        ]);        
        
    }
}
