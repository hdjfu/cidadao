<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::statement(
            'CREATE VIEW dislike_count AS
            SELECT p.id AS post_id, COUNT(l.user_id) AS dislike_count
            FROM posts p
            LEFT JOIN dislikes l ON p.id = l.post_id
            GROUP BY p.id;
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('dislike_count');
    }
};
