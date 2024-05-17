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
        Schema::create('blogs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('abstract');
            $table->text('depict');
            $table->string('images'); // Assuming images are stored as JSON or comma-separated values
            $table->string('link')->nullable();
            $table->string('author');
            $table->timestamp('created_date')->nullable();
            $table->boolean('is_active')->default(true);
            $table->integer('post_order')->default(0);

            $table->longText('contents');
            $table->timestamps(); // Optionally remove if 'created_date' is used instead of 'created_at'
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('blogs');
    }
};
