<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class BoTieuChuan extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['ten', 'capDanhGia_id'];

    public function tieuChuan()
    {
        return $this->hasMany(TieuChuan::class, 'boTieuChuan_id');
    }
}
