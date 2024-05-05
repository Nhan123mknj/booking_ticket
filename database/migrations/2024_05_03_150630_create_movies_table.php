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
        Schema::create('movies', function (Blueprint $table) {
            $table->increments('id');
            $table->string('title');
            $table->unsignedInteger('genre_id')->nullable()->index('genre_id');
            $table->integer('duration')->nullable();
            $table->string('director')->nullable();
            $table->text('description')->nullable();
            $table->date('release_date')->nullable();
            $table->string('trailer_url')->nullable();
            $table->string('status', 20)->default('upcoming');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
