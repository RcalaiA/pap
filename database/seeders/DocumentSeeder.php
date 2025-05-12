<?php

namespace Database\Seeders;

use App\Models\Document;
use App\Models\Literacy;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DocumentSeeder extends Seeder
{
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
            'url' => 'https://dge.mec.pt/sites/default/files/ficheiros/referencial_de_educacao_financeira_final_versao_port.pdf',
            'format' => 'PDF',
            'age_group' => '11-18',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'DGE',
            'published_at' => '2024-09-20',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $financial_id,
        ]);

        $document = Document::create([
            'title' => 'Estratégia de Literacia Financeira Digital para Portugal',
            'image' => 'estrategia_lf.png',
            'description' => 'Este documento apresenta uma Estratégia de Literacia Financeira Digital para Portugal...',
            'url' => 'https://www.bportugal.pt/sites/default/files/anexos/pdf-boletim/estrategia_de_literacia_financeira_digital_para_portugal.pdf',
            'format' => 'PDF',
            'age_group' => 'Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'Banco de Portugal',
            'published_at' => '2024-10-15',
        ]);

        DB::table('document_literacy')->insert([
            ['document_id' => $document->id, 'literacy_id' => $financial_id],
            ['document_id' => $document->id, 'literacy_id' => $digital_id],
        ]);

        $document = Document::create([
            'title' => 'Core Competencies for Financial Education',
            'image' => 'Core Competencies for Financial Education.png',
            'description' => 'According to the OECD...',
            'url' => 'https://dge.mec.pt/sites/default/files/DSPE/core_competencies_for_financial_education.pdf',
            'format' => 'PDF',
            'age_group' => '15-Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Inglês',
            'font' => 'OECD',
            'published_at' => '2025-01-12',
        ]);

        DB::table('document_literacy')->insert([
            ['document_id' => $document->id, 'literacy_id' => $financial_id],
        ]);

        $document = Document::create([
            'title' => 'Literacia de Direitos Humanos - Guia de Implementação',
            'image' => 'direitos_humanos.png',
            'description' => 'Este guia orienta sobre como promover a literacia de direitos humanos...',
            'url' => 'https://dge.mec.pt/sites/default/files/ficheiros/literacia_de_direitos_humanos_guia.pdf',
            'format' => 'PDF',
            'age_group' => '11-14',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'DGE',
            'published_at' => '2024-11-05',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $rights_id,
        ]);

        $document = Document::create([
            'title' => 'Estratégia Nacional de Educação Ambiental',
            'image' => 'estrategia_ambiental.png',
            'description' => 'Este documento detalha as diretrizes da estratégia nacional para promover a literacia ambiental...',
            'url' => 'https://dge.mec.pt/sites/default/files/ficheiros/estrategia_nacional_educacao_ambiental.pdf',
            'format' => 'PDF',
            'age_group' => '15-Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'APA / DGE',
            'published_at' => '2025-02-10',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $environment_id,
        ]);

        $document = Document::create([
            'title' => 'Promoção da Literacia em Saúde',
            'image' => 'literacia_saude.png',
            'description' => 'Este documento aborda estratégias para a promoção da literacia em saúde...',
            'url' => 'https://dge.mec.pt/sites/default/files/ficheiros/literacia_em_saude.pdf',
            'format' => 'PDF',
            'age_group' => 'Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'DGS / DGE',
            'published_at' => '2024-12-18',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $health_id,
        ]);

        $document = Document::create([
            'title' => 'Literacia em Media: Uma Introdução Crítica',
            'image' => 'literacia_media.png',
            'description' => 'Este documento discute a importância da literacia em media...',
            'url' => 'https://dge.mec.pt/sites/default/files/ficheiros/literacia_em_media.pdf',
            'format' => 'PDF',
            'age_group' => '15-Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'DGE / ERC',
            'published_at' => '2025-03-22',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $media_id,
        ]);

        $document = Document::create([
            'title' => 'Salve o Ralph',
            'image' => 'ralph.png',
            'description' => 'Um vídeo que aborda o teste em animais na área da cosmética.',
            'url' => 'https://www.youtube.com/watch?v=AjdMtLF0Z6w',
            'format' => 'Vídeo',
            'age_group' => '11-14',
            'is_interactive' => false,
            'has_download' => false,
            'duration' => 4,
            'language' => 'Inglês',
            'font' => 'Humane Society International',
            'published_at' => '2021-04-16',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $environment_id,
        ]);
    }
}
