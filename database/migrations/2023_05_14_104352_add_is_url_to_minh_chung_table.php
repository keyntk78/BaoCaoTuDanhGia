<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddIsUrlToMinhChungTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('minh_chungs', function (Blueprint $table) {
            $table->boolean('isUrl')->nullable()->after('isMCGop');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('minh_chung', function (Blueprint $table) {
            //
        });
    }
}
