<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNguoiDungQuyenHTSTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('nguoi_dung_quyen_h_t_s', function (Blueprint $table) {
            $table->id();
            $table->integer('nguoiDung_id');
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
        Schema::dropIfExists('nguoi_dung_quyen_h_t_s');
    }
}
