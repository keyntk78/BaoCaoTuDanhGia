<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaoCaoSaoLuusTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bao_cao_sao_luus', function (Blueprint $table) {
            $table->id();
            $table->text('moTa')->nullable();
            $table->text('diemManh')->nullable();
            $table->text('diemTonTai')->nullable();
            $table->text('keHoachHanhDong')->nullable();
            $table->integer('diemTDG')->nullable();
            $table->text('moDau')->nullable();
            $table->text('ketLuan')->nullable();
            $table->integer('tongSoTC')->nullable();
            $table->integer('soTCDat')->nullable();
            $table->boolean('trangThai')->nullable();
            $table->boolean('congKhai')->nullable();
            $table->integer('nganh_id');
            $table->integer('tieuChi_id');
            $table->integer('tieuChuan_id');
            $table->integer('dotDanhGia_id');
            $table->integer('nguoiDung_id');
            $table->integer('baoCao_id');
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
        Schema::dropIfExists('bao_cao_sao_luus');
    }
}
