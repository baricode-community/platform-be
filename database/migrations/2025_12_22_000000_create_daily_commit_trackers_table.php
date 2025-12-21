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
        Schema::create('daily_commit_trackers', function (Blueprint $table) {
            $table->string('id', 5)->primary();
            $table->foreignId('user_id')->constrained()->onDelete('cascade');
            $table->string('title');
            $table->text('message');
            $table->text('impression');
            $table->integer('success_level')->default(5); // 1-10
            $table->date('tracked_date');
            $table->timestamps();

            $table->unique(['user_id', 'tracked_date']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('daily_commit_trackers');
    }
};
