<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NganhDotDanhGia extends Model
{
    use HasFactory;
    protected $fillable = ['nganh_id', 'dotDanhGia_id'];
}
