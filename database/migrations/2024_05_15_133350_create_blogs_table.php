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
            $table->integer('id', true);
            $table->string('title');
            $table->text('abstract')->nullable();
            $table->text('depict')->nullable();
            $table->string('images')->nullable();
            $table->string('link')->nullable();
            $table->string('author', 100)->nullable();
            $table->dateTime('created_date')->useCurrent();
            $table->boolean('is_active')->nullable()->default(true);
            $table->integer('post_order')->nullable()->default(1);
            $table->text('contents')->nullable();
            $table->dateTime('updated_at')->nullable()->useCurrent();
            $table->boolean('is_recent')->nullable()->default(false);
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
