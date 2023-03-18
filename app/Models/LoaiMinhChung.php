<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LoaiMinhChung extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['ten'];

    public function MinhChung()
    {
        return $this->hasMany(MinhChung::class, 'loaiMinhChung_id');
    }
}
