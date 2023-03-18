<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nganh extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['ten', 'donVi_id'];

    public function donVi()
    {
        return $this->belongsTo(DonVi::class, 'donVi_id');
    }

    public function dotDanhGia()
    {
        return $this
            ->belongsToMany(DotDanhGia::class, 'nganh_dot_danh_gias', 'nganh_id', 'dotDanhGia_id')
            ->withTimestamps();
    }
}
