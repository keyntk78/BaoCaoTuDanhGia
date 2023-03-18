<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GiaiDoan extends Model
{
    use HasFactory;
    protected $fillable = ['ngayBD', 'ngayKT', 'hoatDong_id', 'dotDanhGia_id'];

    public function hoatDong()
    {
        return $this->belongsTo(HoatDong::class, 'hoatDong_id');
    }
}
