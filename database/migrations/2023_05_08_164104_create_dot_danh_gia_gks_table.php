<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDotDanhGiaGksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dot_danh_gia_gks', function (Blueprint $table) {
            $table->id();
            $table->string('tenDotDanhGia');
            $table->dateTime('thoiDiemCongNhan')->nullable();
            $table->string('tenToChucKiemDinh')->nullable();
            $table->integer('dotDanhGia_id');
            $table->integer('namHoc');
            $table->boolean('trangThai');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dot_danh_gia_gks');
    }
}
