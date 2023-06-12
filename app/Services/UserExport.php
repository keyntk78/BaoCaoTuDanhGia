<?php

namespace App\Services;
use App\Models\ChucVu;
use App\Models\DonVi;
use App\Models\User;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Maatwebsite\Excel\Concerns\FromQuery;

class UserExport implements WithMultipleSheets
{
    public function sheets(): array
    {
        $sheets = [];

        // Add the first sheet
        $sheets[] = new UsersSheet();

        // Add the second sheet
        $sheets[] = new ChucVuSheet();

        // Add the thirt sheet
        $sheets[] = new DonViSheet();

        return $sheets;
    }
}

class UsersSheet implements WithTitle, FromCollection, ShouldAutoSize, WithHeadings
{
    use Exportable;

    public function collection()
    {

        return collect([['1','Nguyễn Văn a','Nam/Nữ','a@gmail.com','Trưởng khoa CNTT', 'Khoa Công nghệ thông tin']]);
    }

    public function title(): string
    {
        return 'Danh sách người dùng';
    }

    public function headings(): array
    {
        return [
            'STT',
            'Họ Tên',
            'Giới tính',
            'Email',
            'Chức vụ',
            'Đơn vị',
        ];
    }
}

class ChucVuSheet implements  WithTitle, FromCollection, ShouldAutoSize, WithHeadings
{

    use Exportable;

    public function collection()
    {
        $chucVus = ChucVu::all();
        $dataSheetChucVu = [];
        $arr_chucVu = [];
        foreach ($chucVus as $chucVu){
            $arr_chucVu = [$chucVu->id, $chucVu->ten];
            array_push( $dataSheetChucVu, $arr_chucVu);
        }
        return collect($dataSheetChucVu);
    }

    public function title(): string
    {
        return 'Chức vụ';
    }

    public function headings(): array
    {
        return [
            'Id',
            'Tên',
        ];
    }
}


class DonViSheet implements  WithTitle, FromCollection, ShouldAutoSize, WithHeadings
{

    use Exportable;

    public function collection()
    {
        $donVis = DonVi::all();
        $dataSheetDonVi = [];
        $arr_donVi = [];
        foreach ($donVis as $donVi){
            $arr_donVi = [$donVi->id, $donVi->ten];
            array_push( $dataSheetDonVi, $arr_donVi);
        }
        return collect($dataSheetDonVi);
    }

    public function title(): string
    {
        return 'Đơn vị';
    }

    public function headings(): array
    {
        return [
            'Id',
            'Tên',
        ];
    }
}
