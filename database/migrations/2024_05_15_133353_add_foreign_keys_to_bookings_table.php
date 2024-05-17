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
        Schema::table('bookings', function (Blueprint $table) {
            $table->foreign(['user_id'], 'bookings_ibfk_1')->references(['id'])->on('userss')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['showtime_id'], 'bookings_ibfk_2')->references(['id'])->on('showtimes')->onUpdate('restrict')->onDelete('restrict');
            $table->foreign(['seat_id'], 'bookings_ibfk_3')->references(['id'])->on('seats')->onUpdate('restrict')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('bookings', function (Blueprint $table) {
            $table->dropForeign('bookings_ibfk_1');
            $table->dropForeign('bookings_ibfk_2');
            $table->dropForeign('bookings_ibfk_3');
        });
    }
};
