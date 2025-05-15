<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDocumentLikesTable extends Migration
{
    public function up()
    {
        Schema::create('document_likes', function (Blueprint $table) {
            $table->id();
            $table->foreignId('document_id')->constrained()->onDelete('cascade');
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->timestamps();

            $table->unique(['document_id', 'user_id']);
        });
    }

    public function down()
    {
        Schema::dropIfExists('document_likes');
    }
}
