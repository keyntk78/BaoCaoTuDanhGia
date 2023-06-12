<?php

namespace App\Services;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;


class UsersImport implements ToCollection, WithHeadingRow
{
    public function collection(Collection $rows)
    {
//        $arr_users = [];
//        foreach ($rows as $row) {
//            // Access row data using $row variable
//            $column1 = $row['column1'];
////            $hoTen = $row['column2'];
//
//            array_push($arr_users,[$column1]);
//            // Process the data as needed
//        }
//
////        return $arr_users;
//        // Xử lý dữ liệu trong mảng $data
    }
}
