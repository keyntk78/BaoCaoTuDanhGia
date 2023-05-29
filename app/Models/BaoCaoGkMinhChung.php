<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BaoCaoGkMinhChung extends Model
{
    use HasFactory;
    protected $fillable = ['baoCaoGk_id', 'minhChung_id', 'tieuChuan_id', 'tieuChi_id', 'nganh_id', 'dotDanhGiaGk_id', 'maMC',];
    public $timestamps = true;
}
