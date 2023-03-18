<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DotDanhGia extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['ten', 'namHoc', 'giaiDoan', 'trangThai'];

    public function nganh()
    {
        return $this
            ->belongsToMany(Nganh::class, 'nganh_dot_danh_gias', 'dotDanhGia_id', 'nganh_id')
            ->withTimestamps();
    }

    public function hoatDong()
    {
        return $this
            ->belongsToMany(HoatDong::class, 'giai_doans', 'dotDanhGia_id', 'hoatDong_id')
            ->withPivot('ngayBD', 'ngayKT')
            ->withTimestamps();
    }
}
