<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBaoCaoGkMinhChungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bao_cao_gk_minh_chungs', function (Blueprint $table) {
            $table->id();
            $table->integer('baoCaoGk_id');
            $table->integer('minhChung_id');
            $table->integer('tieuChuan_id');
            $table->integer('tieuChi_id');
            $table->integer('nganh_id');
            $table->integer('dotDanhGiaGk_id');
            $table->string('maMC');
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
        Schema::dropIfExists('bao_cao_gk_minh_chungs');
    }
}
