<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VaiTroHTQuyenHT extends Model
{
    use HasFactory;
    protected $fillable = ['vaiTroHT_id', 'quyenHT_id', 'nganh_id'];
}
