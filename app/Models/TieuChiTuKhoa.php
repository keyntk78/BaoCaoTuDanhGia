<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TieuChiTuKhoa extends Model
{
    use HasFactory;
    protected $fillable = ['tieuChi_id', 'tuKhoa_id'];
}
