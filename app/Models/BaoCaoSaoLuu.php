<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaoCaoSaoLuu extends Model
{
    use HasFactory;
    protected $fillable = ['moTa', 'diemManh', 'diemTonTai', 'keHoachHanhDong', 'diemTDG', 'trangThai', 'nganh_id', 'tieuChi_id', 'tieuChuan_id','dotDanhGia_id', 'nguoiDung_id', 'moDau', 'ketLuan', 'tongSoTC', 'soTCDat', 'baoCao_id'];

    public function baoCao()
    {
        return $this->belongsTo(BaoCao::class, 'baoCao_id');
    }
    public function tieuChi()
    {
        return $this->belongsTo(TieuChi::class, 'tieuChi_id');
    }

    public function tieuChuan()
    {
        return $this->belongsTo(TieuChuan::class, 'tieuChuan_id');
    }

    public function nganh()
    {
        return $this->belongsTo(Nganh::class, 'nganh_id');
    }

    public function dotDanhGia()
    {
        return $this->belongsTo(DotDanhGia::class, 'dotDanhGia_id');
    }
}
