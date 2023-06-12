<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            ['hoTen' => 'Nguyễn Tuấn Kiệt', 'gioiTinh' => 1, 'email'=>'admin@gmail.com',
                'password' =>Hash::make('tdg123456'), 'hinhAnh'=>'/storage/photos/4/01-Jun-2022-02-00-342.jpg'],
        ]);
    }
}
