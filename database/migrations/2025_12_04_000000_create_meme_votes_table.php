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
        Schema::create('meme_votes', function (Blueprint $table) {
            $table->id();
            $table->string('meme_id', 5);
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->enum('vote_type', ['up', 'down']);
            $table->timestamps();

            // Foreign key ke memes table
            $table->foreign('meme_id')->references('id')->on('memes')->onDelete('cascade');

            // Unique constraint: satu user hanya bisa vote sekali per meme
            $table->unique(['meme_id', 'user_id']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meme_votes');
    }
};
