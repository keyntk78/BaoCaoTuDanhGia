<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddBoTieuChuanIdToTieuChuanTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('tieu_chuans', function (Blueprint $table) {
            $table->integer('boTieuChuan_id')->nullable()->after('ten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tieu_chuans', function (Blueprint $table) {
            //
        });
    }
}
