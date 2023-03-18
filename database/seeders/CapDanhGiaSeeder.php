<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CapDanhGiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cap_danh_gias')->insert([
            ['ten' => 'CTĐT'],
            ['ten' => 'CSĐT'],
        ]);
    }
}
