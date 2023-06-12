<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NguoiDungVaiTroHTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('nguoi_dung_vai_tro_h_t_s')->insert([
            ['nguoiDung_id' => 1, 'vaiTroHT_id' => 1],
        ]);
    }
}
