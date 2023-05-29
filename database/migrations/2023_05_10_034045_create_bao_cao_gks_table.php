<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaoCaoGksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bao_cao_gks', function (Blueprint $table) {
            $table->id();
            $table->integer('tdg')->nullable();
            $table->integer('dgn')->nullable();
            $table->integer('tuXacDinhKQ')->nullable();
            $table->text('neuVanTat')->nullable();
            $table->integer('kqKĐCLGD')->nullable();
            $table->text('ndctTheoKN')->nullable();
            $table->text('ndct')->nullable();
            $table->text('hoatDongDaCaiTien')->nullable();
            $table->string('donVi')->nullable();
            $table->string('thoiGianThucHien')->nullable();
            $table->text('ghiChu')->nullable();
            $table->integer('nganh_id');
            $table->integer('tieuChuan_id');
            $table->integer('tieuChi_id');
            $table->integer('dotDanhGiaGK_id');
            $table->boolean('congKhai')->nullable();
            $table->boolean('trangThai')->nullable();
            $table->softDeletes();
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
        Schema::dropIfExists('bao_cao_gks');
    }
}
