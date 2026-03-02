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
        Schema::create('progress_journals', function (Blueprint $table) {
            $table->id();
            $table->foreignId('timeline_id')->constrained()->onDelete('cascade');
            $table->text('description');
            $table->unsignedInteger('progress_percentage')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('progress_journals');
    }
};
