<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            BoTieuChuanSeeder::class,
            CapDanhGiaSeeder::class,
            HoatDongSeeder::class,
            NguoiDungVaiTroHTSeeder::class,
            QuyenHTSeeder::class,
            QuyenNguoiDungSeeder::class,
            QuyenNhomSeeder::class,
            UserSeeder::class,
            VaiTroHTQuyenHTSeeder::class,
            VaiTroHTSeeder::class,
            VaiTroSeeder::class
        ]);
    }
}
