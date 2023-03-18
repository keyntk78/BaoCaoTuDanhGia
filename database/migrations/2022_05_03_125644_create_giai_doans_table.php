<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGiaiDoansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('giai_doans', function (Blueprint $table) {
            $table->id();
            $table->dateTime('ngayBD');
            $table->dateTime('ngayKT');
            $table->integer('hoatDong_id');
            $table->integer('dotDanhGia_id');
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
        Schema::dropIfExists('giai_doans');
    }
}
