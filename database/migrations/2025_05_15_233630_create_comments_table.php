<?php

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
        Schema::create('comments', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained()->onDelete('cascade'); // Usuário que fez o comentário
            $table->foreignId('document_id')->constrained()->onDelete('cascade'); // Documento comentado

            // Coluna para resposta a comentário pai (nullable para comentários principais)
            $table->foreignId('parent_id')->nullable()->constrained('comments')->onDelete('cascade');

            $table->text('content'); // Conteúdo do comentário

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('comments');
    }
};
