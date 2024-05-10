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
            $table->unsignedInteger('genre_id')->nullable();
            $table->integer('duration')->nullable();
            $table->string('director')->nullable();
            $table->text('description')->nullable();
            $table->date('release_date')->nullable();
            $table->string('trailer_url')->nullable();
            $table->string('banner_url', 250);
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
            $table->boolean('Is_IndexBanner')->default(false);
            $table->boolean('Is_Slide')->default(false);
            $table->boolean('Is_Active')->default(true);
            $table->string('banner_doc');
            $table->integer('Star');
            $table->string('slug', 50);
            $table->enum('status', ['upcoming', 'nowshowing'])->nullable()->default('upcoming');
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
