<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNhomNguoiDungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nhom_nguoi_dungs', function (Blueprint $table) {
            $table->id();
            $table->integer('nhom_id');
            $table->integer('nguoiDung_id');
            $table->integer('vaiTro_id')->default(1);
            $table->integer('nganh_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('nhom_nguoi_dungs');
    }
}
