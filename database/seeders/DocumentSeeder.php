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
        $computation_id = Literacy::where('slug', 'lc')->first()->id;

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

        $document = Document::create([ ///////////////////////////////////////
            'title' => 'Literacias Digitais',
            'image' => 'literacias_digitais_uab.png',
            'description' => 'Este texto orientador da Universidade Aberta explora os conceitos e práticas relacionadas com literacias digitais no contexto da aprendizagem ao longo da vida.',
            'url' => 'https://repositorioaberto.uab.pt/bitstream/10400.2/6017/1/Literacias%20Digitais_Texto_Orientador_VF.pdf',
            'format' => 'PDF',
            'age_group' => 'Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'Universidade Aberta',
            'published_at' => '2020-03-10',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $digital_id,
        ]);

        $document = Document::create([  
            'title' => 'Computer Literacy',
            'image' => 'computer_literacy_pcc.png',
            'description' => 'Manual introdutório para literacia em computação, cobrindo os conceitos básicos de hardware, software, internet e segurança digital.',
            'url' => 'https://pcc.palau.edu/wp-content/uploads/2021/01/IT100-Book-Revised-7.01.2020.pdf',
            'format' => 'PDF',
            'age_group' => '18+',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Inglês',
            'font' => 'Palau Community College',
            'published_at' => '2020-07-01',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $computation_id,
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $media_id,
        ]);

        $document = Document::create([
            'title' => 'COMPASS – Manual para a Educação para os Direitos Humanos com Jovens',
            'image' => 'compass_direitos_humanos.png',
            'description' => 'Recurso pedagógico do Conselho da Europa que oferece atividades práticas e conteúdos para trabalhar os Direitos Humanos com jovens.',
            'url' => 'https://gulbenkian.pt/wp-content/uploads/2017/01/compass_2016_pt.pdf',
            'format' => 'PDF',
            'age_group' => '15-25',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'Conselho da Europa',
            'published_at' => '2016-01-01',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $rights_id,
        ]);

        $document = Document::create([
            'title' => 'Literacia Ambiental: Um Desafio à Didática e à Matética',
            'image' => 'literacia_ambiental_uma.png',
            'description' => 'Estudo que aborda a importância da literacia ambiental na educação, destacando desafios e estratégias pedagógicas.',
            'url' => 'https://digituma.uma.pt/bitstream/10400.13/2088/1/LITERACIA%20AMBIENTAL.pdf',
            'format' => 'PDF',
            'age_group' => 'Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'Universidade da Madeira',
            'published_at' => '2010-01-01',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $environment_id,
        ]);

        $document = Document::create([
            'title' => 'Environmental Literacy: Setting the Stage',
            'image' => 'environmental_literacy_stanford.png',
            'description' => 'Relatório do Stanford Social Ecology Lab que estabelece as bases para a compreensão da literacia ambiental.',
            'url' => 'https://ed.stanford.edu/sites/default/files/news/images/stanfordsocialecologylab-brief-1.pdf',
            'format' => 'PDF',
            'age_group' => 'Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Inglês',
            'font' => 'Stanford University',
            'published_at' => '2018-08-01',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $environment_id,
        ]);

        $document = Document::create([
            'title' => 'Manual de Boas Práticas: Literacia em Saúde – Capacitação dos Profissionais de Saúde',
            'image' => 'manual_literacia_saude.png',
            'description' => 'Guia para profissionais de saúde com estratégias para melhorar a comunicação e promover a literacia em saúde.',
            'url' => 'https://splsportugal.com/wp-content/uploads/2023/07/2019-manual-de-boas-praticas-literacia-em-saude.pdf',
            'format' => 'PDF',
            'age_group' => 'Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'Direção-Geral da Saúde',
            'published_at' => '2019-01-01',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $health_id,
        ]);

        $document = Document::create([
            'title' => 'Health Literacy Insights for Health Crises',
            'image' => 'health_literacy_insights.png',
            'description' => 'Discussão sobre a importância da literacia em saúde durante crises de saúde pública, com recomendações para comunicação eficaz.',
            'url' => 'https://nam.edu/wp-content/uploads/2017/07/Health-Literacy-Insights-for-Health-Crises.pdf',
            'format' => 'PDF',
            'age_group' => 'Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Inglês',
            'font' => 'National Academy of Medicine',
            'published_at' => '2017-07-17',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $health_id,
        ]);

        $document = Document::create([
            'title' => 'Literacia para os Media – Horizontes Concetuais e Mapeamento de Atores e Iniciativas em Portugal e no Mundo',
            'image' => 'literacia_media_milobs.png',
            'description' => 'Estudo que analisa as abordagens e iniciativas de literacia para os media em Portugal e internacionalmente.',
            'url' => 'https://milobs.pt/wp-content/uploads/2023/04/Literacia-para-os-Media-%E2%80%93-Horizontes-concetuais-e-mapeamento-de-atores-e-iniciativas-em-Portugal-e-no-mundo.pdf',
            'format' => 'PDF',
            'age_group' => 'Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'MILObs',
            'published_at' => '2023-04-01',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $media_id,
        ]);

        $document = Document::create([
            'title' => 'Introduction to Media Literacy',
            'image' => 'intro_media_literacy_occ.png',
            'description' => 'Guia introdutório que define e explora os princípios da literacia para os media, com foco em análise crítica e criação de conteúdo.',
            'url' => 'https://media.ocean.edu/files/OCC_VIDEO/upload/Faculty_Resources/dbordelon2/dbordelon/151website/IntroMediaLiteracy.pdf',
            'format' => 'PDF',
            'age_group' => 'Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Inglês',
            'font' => 'Ocean County College',
            'published_at' => '2010-01-01',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $media_id,
        ]);

        // Vídeo: A importância da Literacia Digital
        $document = Document::create([
            'title' => 'A importância da Literacia Digital',
            'image' => 'Captura de ecrã 2025-05-25 170404.png',
            'description' => 'Vídeo educativo explicando o papel da literacia digital no mundo moderno.',
            'url' => 'https://www.youtube.com/watch?v=3uLLivFGlfE',
            'format' => 'Vídeo',
            'age_group' => 'Todos',
            'is_interactive' => false,
            'has_download' => false,
            'duration' => 8,
            'language' => 'Português',
            'font' => 'YouTube / ONU',
            'published_at' => '2024-10-01',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $digital_id,
        ]);

        // Relatório da União Internacional de Telecomunicações
        $document = Document::create([
            'title' => 'Relatório Mundial sobre Literacia Digital',
            'image' => 'Captura de ecrã 2025-05-25 170521.png',
            'description' => 'Publicação da UIT com dados e análises sobre inclusão digital global.',
            'url' => 'https://www.itu.int/ITU-D/ict/publications/wtdr_10/material/WTDR2010_e_v1.pdf',
            'format' => 'PDF',
            'age_group' => 'Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Inglês',
            'font' => 'União Internacional de Telecomunicações',
            'published_at' => '2010-05-15',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $digital_id,
        ]);

        // Documento da UNESCO sobre competências digitais
        $document = Document::create([
            'title' => 'Competências Digitais para a Vida',
            'image' => 'Captura de ecrã 2025-05-25 170645.png',
            'description' => 'Estudo da UNESCO sobre a importância das competências digitais no século XXI.',
            'url' => 'https://unesdoc.unesco.org/ark:/48223/pf0000265403.locale=en',
            'format' => 'PDF',
            'age_group' => 'Adultos',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Inglês',
            'font' => 'UNESCO',
            'published_at' => '2018-04-03',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $digital_id,
        ]);

        // Definição simples de literacia digital
        $document = Document::create([
            'title' => 'O que é Literacia Digital? (Twinkl)',
            'image' => 'Captura de ecrã 2025-05-25 170943.png',
            'description' => 'Explicação clara e acessível sobre literacia digital, voltada para educadores.',
            'url' => 'https://www.twinkl.pt/teaching-wiki/digital-literacy',
            'format' => 'Website',
            'age_group' => 'Educadores / Jovens',
            'is_interactive' => false,
            'has_download' => false,
            'duration' => null,
            'language' => 'Português',
            'font' => 'Twinkl',
            'published_at' => '2023-08-10',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $digital_id,
        ]);

        // Artigo: O que é Literacia Digital?
        $document = Document::create([
            'title' => 'What is Digital Literacy?',
            'image' => 'Captura de ecrã 2025-05-25 171050.png',
            'description' => 'Artigo introdutório sobre o conceito de literacia digital e sua importância.',
            'url' => 'https://potomac.edu/what-is-digital-literacy/',
            'format' => 'Artigo',
            'age_group' => 'Jovens e adultos',
            'is_interactive' => false,
            'has_download' => false,
            'duration' => null,
            'language' => 'Inglês',
            'font' => 'University of the Potomac',
            'published_at' => '2023-05-22',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $digital_id,
        ]);

        // Top 10 competências em literacia computacional
        $document = Document::create([
            'title' => 'Top 10 Computer Literacy Skills for Success',
            'image' => 'Captura de ecrã 2025-05-25 171255.png',
            'description' => 'Lista das principais competências em literacia computacional para o mercado de trabalho.',
            'url' => 'https://www.ebsco.com/blogs/ebscopost/2525500/top-10-computer-literacy-skills-success',
            'format' => 'Artigo',
            'age_group' => 'Adultos / Jovens',
            'is_interactive' => false,
            'has_download' => false,
            'duration' => null,
            'language' => 'Inglês',
            'font' => 'EBSCO',
            'published_at' => '2022-11-30',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $computation_id,
        ]);

        // Definição de literacia computacional (Twinkl)
        $document = Document::create([
            'title' => 'O que é Literacia Computacional? (Twinkl)',
            'image' => 'Captura de ecrã 2025-05-25 171421.png',
            'description' => 'Página explicativa sobre o conceito de literacia computacional para professores e alunos.',
            'url' => 'https://www.twinkl.pt/teaching-wiki/computer-literacy',
            'format' => 'Website',
            'age_group' => 'Crianças / Educadores',
            'is_interactive' => false,
            'has_download' => false,
            'duration' => null,
            'language' => 'Português',
            'font' => 'Twinkl',
            'published_at' => '2023-06-20',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $computation_id,
        ]);

        // Artigo académico sobre promoção de literacia digital com dispositivos móveis
        $document = Document::create([
            'title' => 'Promoção da Literacia Digital com Dispositivos Móveis',
            'image' => 'Captura de ecrã 2025-05-25 175104.png',
            'description' => 'Artigo académico com experiências pedagógicas no ensino profissional.',
            'url' => 'https://www.researchgate.net/publication/321426361_Promocao_da_literacia_digital_atraves_de_dispositivos_moveis_experiencias_pedagogicas_no_ensino_profissional',
            'format' => 'PDF / Artigo Académico',
            'age_group' => 'Professores / Universitários',
            'is_interactive' => false,
            'has_download' => true,
            'duration' => null,
            'language' => 'Português',
            'font' => 'ResearchGate',
            'published_at' => '2017-12-01',
        ]);

        DB::table('document_literacy')->insert([
            'document_id' => $document->id,
            'literacy_id' => $computation_id,
        ]);

    }
}
