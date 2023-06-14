<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NguoiDungQuyenHTS extends Model
{
    use HasFactory;
    protected $fillable = ['nguoiDung_id', 'quyenHT_id', 'nganh_id'];
}
