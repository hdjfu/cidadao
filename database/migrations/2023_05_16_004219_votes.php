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
        Schema::create('votes', function (Blueprint $table) {
            $table->increments('id');
            $table->foreignId('user_id')->nullable()
                  ->constrained()
                  ->onUpdate(action:'CASCADE');
            $table->foreignId('post_id')->nullable();
            $table->integer('op');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('votes');
    }
};
