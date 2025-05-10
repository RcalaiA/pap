<?php

use App\Models\Document;
use App\Models\Literacy;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('subtitle')->nullable();
            $table->text('description')->nullable();
            $table->string('url')->nullable();
            $table->string('image')->nullable();
            $table->string('format'); // ex: "PDF", "Vídeo", etc.
            $table->string('age_group'); // ex: "6-10", "Adultos", etc.
            $table->boolean('is_interactive')->default(false);
            $table->boolean('has_download')->default(false);
            $table->integer('duration')->nullable(); // duração em minutos
            $table->string('language'); // ex: "PT", "EN"
            $table->string('font'); // criador ou site de origem
            $table->date('published_at')->nullable(); // data de publicação

            $table->timestamps();
        });

        Schema::create('document_literacy', function (Blueprint $table) {               
            $table->foreignIdFor(Document::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Literacy::class)->constrained()->cascadeOnDelete();

            $table->unique(['document_id', 'literacy_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_literacy');
        Schema::dropIfExists('documents');
    }
};
