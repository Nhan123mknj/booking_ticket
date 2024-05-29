<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('seats', function (Blueprint $table) {
            // Thêm trường foreign key và thiết lập option onDelete('cascade')
            $table->foreign('cinema_id')
                  ->references('id')
                  ->on('cinemas')
                  ->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('seats', function (Blueprint $table) {
            // Xóa foreign key khi rollback migration
            $table->dropForeign(['cinema_id']);
        });
    }
};
