<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BoTieuChuanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('bo_tieu_chuans')->insert([
            ['ten' => 'Bộ GDDT', 'capDanhGia_id'=>1],
            ['ten' => 'Bộ AUN', 'capDanhGia_id'=>2],
        ]);
    }
}
