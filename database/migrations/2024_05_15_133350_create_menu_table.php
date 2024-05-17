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
        Schema::create('menu', function (Blueprint $table) {
            $table->integer('id', true);
            $table->string('MenuName');
            $table->string('slug')->nullable();
            $table->text('Description')->nullable();
            $table->integer('Levels');
            $table->integer('ParentId')->nullable();
            $table->dateTime('CreatedDate')->useCurrent();
            $table->string('CreatedBy');
            $table->dateTime('ModifiedDate')->nullable();
            $table->string('ModifiedBy')->nullable();
            $table->boolean('IsActive')->default(true);
            $table->integer('MenuOrder');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu');
    }
};
