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
            'CREATE VIEW like_count AS
            SELECT p.id AS post_id, COUNT(l.user_id) AS like_count
            FROM posts p
            LEFT JOIN likes l ON p.id = l.post_id
            GROUP BY p.id;
        ');

        /*
        Schema::create('like_count_view', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
        });*/
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('like_count');
    }
};
