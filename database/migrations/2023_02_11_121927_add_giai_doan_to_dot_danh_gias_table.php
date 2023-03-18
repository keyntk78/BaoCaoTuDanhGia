<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddGiaiDoanToDotDanhGiasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('dot_danh_gias', function (Blueprint $table) {
            $table->string('giaiDoan')->nullable()->after('namHoc');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('dot_danh_gias', function (Blueprint $table) {
            //
        });
    }
}
