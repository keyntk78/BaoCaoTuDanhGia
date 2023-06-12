<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class HoatDongSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('hoat_dongs')->insert([
            ['ten' => 'Viết báo cáo', 'slug' => 'viet-bao-cao'],
            ['ten' => 'Nhận xét báo cáo', 'slug' => 'nhan-xet-bao-cao'],
            ['ten' => 'Phản biện báo cáo', 'slug' => 'phan-bien-bao-cao'],
            ['ten' => 'Chỉnh sửa báo cáo', 'slug' => 'chinh-sua-bao-cao'],
            ['ten' => 'Báo cáo giữa kỳ', 'slug' => 'bao-cao-giua-ky'],
        ]);
    }
}
