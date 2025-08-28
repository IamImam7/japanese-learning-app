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
        Schema::create('japanese_characters', function (Blueprint $table) {
            $table->charset = 'utf8mb4';
            $table->collation = 'utf8mb4_ja_0900_as_cs';
            $table->id();
            $table->string('character');
            $table->enum('type', ['hiragana', 'katakana', 'kanji']);
            $table->unique(['character', 'type']);
            $table->string('romaji')->nullable();
            $table->text('meaning')->nullable();
            $table->text('stroke_order')->nullable();
            $table->text('examples')->nullable();
            $table->integer('jlpt_level')->nullable();
            $table->integer('stroke_count')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('japanese_characters');
    }
};
