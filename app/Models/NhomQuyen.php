<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhomQuyen extends Model
{
    use HasFactory;
    protected $fillable = ['nhom_id', 'quyenNhom_id', 'tieuChuan_id'];
}
