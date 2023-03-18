<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVaiTroHTQuyenHTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vai_tro_h_t_quyen_h_t_s', function (Blueprint $table) {
            $table->id();
            $table->integer('vaiTroHT_id');
            $table->integer('quyenHT_id');
            $table->integer('nganh_id')->nullable();
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
        Schema::dropIfExists('vai_tro_h_t_quyen_h_t_s');
    }
}
