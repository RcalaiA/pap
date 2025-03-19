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
        $rights_id = Literacy::where('slug', 'ldh')->first()->id;
        $environment_id = Literacy::where('slug', 'la')->first()->id;
        $health_id = Literacy::where('slug', 'ls')->first()->id;
        $media_id = Literacy::where('slug', 'lm')->first()->id;

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
            'description' => 'Este documento apresenta uma Estratégia de Literacia Financeira Digital para Portugal (doravante “a Estratégia”) e foi elaborado no âmbito do projeto Design of a digital financial literacy strategy for Portugal (Conceção de uma estratégia de literacia financeira digital para Portugal), desenvolvido pela OCDE para o Banco de Portugal com o apoio da Comissão Europeia. A Estratégia inclui um Plano de Implementação para o período 2023-2028.',
            'url' => 'https://www.bportugal.pt/sites/default/files/anexos/pdf-boletim/estrategia_de_literacia_financeira_digital_para_portugal.pdf'
        ]);

        DB::table('document_literacy')->insert([
            ['document_id' => $document->id, 'literacy_id' => $financial_id],
            ['document_id' => $document->id, 'literacy_id' => $digital_id]
        ]);        
        
        $document = Document::create([
            'title' => 'Core Competencies for Financial Education',
            'image' => 'Core Competencies for Financial Education.png',
            'description' => 'According to the Organisation for Economic Co-operation and Development (OECD) (2006), Financial Education is the process by which financial consumers improve their understanding of financial products and concepts and develop the skills and confidence to become more aware of financial risks and opportunities, make informed choices, know where to go for help and adopt behaviour that improves their financial well-being.',
            'url' => 'https://dge.mec.pt/sites/default/files/DSPE/core_competencies_for_financial_education.pdf'
        ]);

        DB::table('document_literacy')->insert([
            ['document_id' => $document->id, 'literacy_id' => $financial_id],
        ]);

        // Documentos adicionais de literacia
        $document = Document::create([
            'title' => 'Literacia de Direitos Humanos - Guia de Implementação',
            'image' => 'direitos_humanos.png',
            'description' => 'Este guia orienta sobre como promover a literacia de direitos humanos, sensibilizando as populações para a importância dos direitos fundamentais e a sua implementação.',
            'url' => 'https://dge.mec.pt/sites/default/files/ficheiros/literacia_de_direitos_humanos_guia.pdf'
        ]);
        
        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $rights_id,
        ]);

        $document = Document::create([
            'title' => 'Estratégia Nacional de Educação Ambiental',
            'image' => 'estrategia_ambiental.png',
            'description' => 'Este documento detalha as diretrizes da estratégia nacional para promover a literacia ambiental, com foco na educação e sensibilização para a sustentabilidade.',
            'url' => 'https://dge.mec.pt/sites/default/files/ficheiros/estrategia_nacional_educacao_ambiental.pdf'
        ]);
        
        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $environment_id,
        ]);

        $document = Document::create([
            'title' => 'Promoção da Literacia em Saúde',
            'image' => 'literacia_saude.png',
            'description' => 'Este documento aborda estratégias para a promoção da literacia em saúde, capacitando as populações a tomarem decisões informadas sobre questões relacionadas com a saúde.',
            'url' => 'https://dge.mec.pt/sites/default/files/ficheiros/literacia_em_saude.pdf'
        ]);
        
        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $health_id,
        ]);

        $document = Document::create([
            'title' => 'Literacia em Media: Uma Introdução Crítica',
            'image' => 'literacia_media.png',
            'description' => 'Este documento discute a importância da literacia em media, ajudando os cidadãos a desenvolver competências críticas para lidar com a informação nos meios de comunicação.',
            'url' => 'https://dge.mec.pt/sites/default/files/ficheiros/literacia_em_media.pdf'
        ]);
        
        $document = Document::create([
            'title' => 'Salve o Ralph',
            'image' => 'ralph.png',
            'description' => 'Um vídeo que aborda o teste em animais na área da cosmética.',
            'url' => 'https://www.youtube.com/watch?v=AjdMtLF0Z6w'
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $environment_id,
        ]);
    }
}
