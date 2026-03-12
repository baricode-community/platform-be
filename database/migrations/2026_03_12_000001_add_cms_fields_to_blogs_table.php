<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->timestamp('published_at')->nullable()->after('is_published');
            $table->unsignedBigInteger('views_count')->default(0)->after('published_at');
            $table->string('meta_title')->nullable()->after('views_count');
            $table->text('meta_description')->nullable()->after('meta_title');

            $table->index('published_at');
            $table->index('views_count');
        });
    }

    public function down(): void
    {
        Schema::table('blogs', function (Blueprint $table) {
            $table->dropIndex(['published_at']);
            $table->dropIndex(['views_count']);
            $table->dropColumn(['published_at', 'views_count', 'meta_title', 'meta_description']);
        });
    }
};
