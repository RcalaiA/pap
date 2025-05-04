<?php

use App\Models\Document;
use App\Models\Type;
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
        // Tabela types
        Schema::create('types', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Ex: "PDF", "Vídeo", "Website"
            $table->string('format'); // Ex: "pdf", "video", "web"
            $table->string('age_group')->nullable(); // Ex: "6-10", "11-14", "Adultos"
            $table->boolean('is_interactive')->default(false);
            $table->boolean('has_download')->default(false);
            $table->integer('duration')->nullable(); // Em minutos (opcional)
            $table->string('language')->nullable(); // Ex: "PT", "EN"
            $table->timestamps();
        });

        // Tabela pivot document_type
        Schema::create('document_type', function (Blueprint $table) {
            $table->foreignIdFor(Document::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Type::class)->constrained()->cascadeOnDelete();
            $table->unique(['document_id', 'type_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('document_type');
        Schema::dropIfExists('types');
    }
};
