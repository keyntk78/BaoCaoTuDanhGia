<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCapDanhGiaIdToBoTieuChuansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bo_tieu_chuans', function (Blueprint $table) {
            $table->integer('capDanhGia_id')->nullable()->after('ten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bo_tieu_chuans', function (Blueprint $table) {
            //
        });
    }
}
