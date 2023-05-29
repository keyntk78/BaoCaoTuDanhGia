<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class BaoCaoGk extends Model
{
    use HasFactory, SoftDeletes, Sortable;
    protected $dates = ['deleted_at'];
    protected $fillable = ['tdg', 'dgn', 'tuXacDinhKQ',
        'neuVanTat', 'ndct', 'ndctTheoKN','kqKĐCLGD','hoatDongDaCaiTien', 'donVi',
        'thoiGianThucHien', 'ghiChu','nganh_id', 'tieuChuan_id', 'tieuChi_id', 'dotDanhGiaGK_id', 'congKhai', 'trangThai'];

    public function tieuChuan()
    {
        return $this->belongsTo(TieuChuan::class, 'tieuChuan_id');
    }

    public function nganh()
    {
        return $this->belongsTo(Nganh::class, 'nganh_id');
    }

    public function dotDanhGiaGk()
    {
        return $this->belongsTo(DotDanhGiaGk::class, 'dotDanhGiaGK_id');
    }


    public function tieuChi()
    {
        return $this->belongsTo(TieuChi::class, 'tieuChi_id');
    }

}
