<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNguoidungIdToBaoCaoGksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('bao_cao_gks', function (Blueprint $table) {
            $table->integer('nguoiDung_id')->nullable()->after('trangThai');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('bao_cao_gks', function (Blueprint $table) {
            //
        });
    }
}
