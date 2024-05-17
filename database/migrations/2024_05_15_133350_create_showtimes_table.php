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
        Schema::create('showtimes', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('movie_id')->nullable()->index('movie_id');
            $table->unsignedInteger('cinema_id')->nullable()->index('cinema_id');
            $table->date('Date_show');
            $table->time('Time_show');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('showtimes');
    }
};
