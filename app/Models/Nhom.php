<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class Nhom extends Model
{
    use HasFactory, SoftDeletes, Sortable;
    protected $fillable = ['ten', 'nganh_id'];

    public $sortable = ['id', 'ten' ,'nganh_id'];

    public function nganh()
    {
        return $this->belongsTo(Nganh::class, 'nganh_id');
    }

    public function nhomNguoiDung()
    {
        return $this
            ->hasMany(NhomNguoiDung::class, 'nhom_id');
    }

    public function nhomQuyen()
    {
        return $this
            ->belongsToMany(QuyenNhom::class, 'nhom_quyens', 'nhom_id', 'quyenNhom_id')
            ->withPivot('tieuChuan_id')
            ->withTimestamps();
    }
}
