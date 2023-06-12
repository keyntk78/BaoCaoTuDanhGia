<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsUrlChiTietMinhChungs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('chi_tiet_minh_chungs', function (Blueprint $table) {
            $table->boolean('isUrl')->nullable()->after('link');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('chi_tiet_minh_chungs', function (Blueprint $table) {
            //
        });
    }
}
