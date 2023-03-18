<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhomNguoiDung extends Model
{
    use HasFactory;
    protected $fillable = ['nhom_id', 'nguoiDung_id', 'vaiTro_id', 'nganh_id'];
    public function nguoiDung()
    {
        return $this->belongsTo(User::class, 'nguoiDung_id');
    }
    public function vaiTro()
    {
        return $this->belongsTo(VaiTro::class, 'vaiTro_id');
    }
    public function nhom()
    {
        return $this->belongsTo(Nhom::class, 'nhom_id');
    }
    public function nganh()
    {
        return $this->belongsTo(Nganh::class, 'nganh_id');
    }
    public function quyenNguoiDung() {
        return $this->belongsToMany(QuyenNguoiDung::class, 'nguoi_dung_quyens', 'nhomNguoiDung_id', 'quyenNguoiDung_id')
        ->withPivot('baoCao_id')
        ->withTimestamps();
    }
}
