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
        Schema::create('bookings', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id')->nullable()->index('user_id');
            $table->unsignedInteger('showtime_id')->nullable()->index('showtime_id');
            $table->unsignedInteger('seat_id')->nullable()->index('seat_id');
            $table->enum('status', ['booked', 'cancelled', 'confirmed'])->nullable()->default('booked');
            $table->timestamp('booking_time')->useCurrent();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bookings');
    }
};
