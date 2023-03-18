<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddMoreFieldsToMinhChungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('minh_chungs', function (Blueprint $table) {
            $table->integer('loaiMinhChung_id')->nullable()->after('ten');
            $table->integer('nguonMinhChung_id')->nullable()->after('ten');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('minh_chungs', function (Blueprint $table) {
            //
        });
    }
}
