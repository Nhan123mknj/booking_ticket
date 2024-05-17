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
        Schema::table('showtimes', function (Blueprint $table) {
            $table->foreign(['movie_id'], 'showtimes_ibfk_1')->references(['id'])->on('movies')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['cinema_id'], 'showtimes_ibfk_2')->references(['id'])->on('cinemas')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('showtimes', function (Blueprint $table) {
            $table->dropForeign('showtimes_ibfk_1');
            $table->dropForeign('showtimes_ibfk_2');
        });
    }
};
