<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class BaoCao extends Model
{
    use HasFactory, SoftDeletes, Sortable;
    protected $dates = ['deleted_at'];
    protected $fillable = ['moTa', 'diemManh', 'diemTonTai', 'keHoachHanhDong', 'diemTDG', 'trangThai', 'congKhai', 'nganh_id', 'tieuChi_id', 'tieuChuan_id','dotDanhGia_id', 'nguoiDung_id', 'moDau', 'ketLuan', 'tongSoTC', 'soTCDat'];
    public $sortable = ['id', 'nganh_id', 'trangThai'];
    public $timestamps = true;
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

    public function binhLuan()
    {
        return $this->hasMany(BinhLuan::class, 'baoCao_id');
    }

    public function baoCaoSL()
    {
        return $this->hasMany(BaoCaoSaoLuu::class, 'baoCao_id');
    }

    public function nhomNguoiDung()
    {
        return $this
            ->belongsToMany(NhomNguoiDung::class, 'nguoi_dung_quyens', 'baoCao_id', 'nhomNguoiDung_id')
            ->where('quyenNguoiDung_id', '=', 1)
            ->withTimestamps();
    }
    public function minhChung()
    {
        return $this
            ->belongsToMany(BaoCaoMinhChung::class, 'bao_cao_minh_chungs', 'baoCao_id', 'minhChung_id')
            ->withPivot('tieuChuan_id', 'nganh_id', 'dotDanhGia_id', 'maHMC')
            ->withTimestamps();
    }
}
