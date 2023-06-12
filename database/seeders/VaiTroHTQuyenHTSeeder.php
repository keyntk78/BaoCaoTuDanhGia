<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaiTroHTQuyenHTSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vai_tro_h_t_quyen_h_t_s')->insert([
            ['vaiTroHT_id' => 1, 'quyenHT_id' => 48],
            ['vaiTroHT_id' => 1, 'quyenHT_id' => 49],
            ['vaiTroHT_id' => 1, 'quyenHT_id' => 50],
            ['vaiTroHT_id' => 1, 'quyenHT_id' => 51],

            ['vaiTroHT_id' => 1, 'quyenHT_id' => 63],

        ]);
    }
}
