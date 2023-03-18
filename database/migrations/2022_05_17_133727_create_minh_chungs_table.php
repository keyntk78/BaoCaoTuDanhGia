<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMinhChungsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('minh_chungs', function (Blueprint $table) {
            $table->id();
            $table->string('ten');
            $table->date('ngayKhaoSat')->nullable();
            $table->date('ngayBanHanh')->nullable();
            $table->string('noiBanHanh')->nullable();
            $table->string('link')->nullable();
            $table->integer('donVi_id');
            $table->boolean('isMCGop')->default(0);
            $table->integer('nguoiDung_id');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('minh_chungs');
    }
}
