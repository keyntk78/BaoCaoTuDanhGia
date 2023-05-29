<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DotDanhGiaGk extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['tenDotDanhGia','thoiDiemCongNhan', 'tenToChucKiemDinh','namHoc','dotDanhGia_id','trangThai'];

    public function dotDanhGia()
    {
        return $this->belongsTo(DotDanhGia::class, 'dotDanhGia_id');
    }

}
