<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyenNhom extends Model
{
    use HasFactory;
    protected $fillable = ['quyenNhom_id', 'ten', 'slug'];
}
