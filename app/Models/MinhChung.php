<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class MinhChung extends Model
{
    use HasFactory, SoftDeletes, Sortable;
    protected $fillable = ['ten', 'ngayKhaoSat', 'ngayBanHanh', 'noiBanHanh', 'link', 'donVi_id', 'isMCGop', 'nguoiDung_id'];
    public $sortable = ['ten', 'ngayKhaoSat', 'ngayBanHanh', 'noiBanHanh', 'donVi_id', 'isMCGop'];

    public function donVi()
    {
        return $this->belongsTo(DonVi::class, 'donVi_id');
    }

    public function loaiMinhChung()
    {
        return $this->belongsTo(LoaiMinhChung::class, 'loaiMinhChung_id');
    }
    public function cTMinhChung() {
        return $this->hasMany(ChiTietMinhChung::class, 'minhChung_id');
    }
}
