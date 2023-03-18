<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VaiTroSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('vai_tros')->insert([
            ['ten' => 'Thành viên', 'slug' => 'thanh-vien'],
            ['ten' => 'Tổ trưởng', 'slug' => 'to-truong'],
            ['ten' => 'Tổ phó', 'slug' => 'to-pho'],
        ]);
    }
}
