<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDungQuyen extends Model
{
    use HasFactory;
    protected $fillable = ['nhomNguoiDung_id', 'quyenNguoiDung_id', 'baoCao_id'];
}
