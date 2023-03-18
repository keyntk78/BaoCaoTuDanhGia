<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BinhLuan extends Model
{
    use HasFactory;
    protected $fillable = ['noiDung', 'dinhKem', 'loai_dinhKem', 'nguoiDung_id', 'baoCao_id', 'parent_id'];

    public function nguoiDung()
    {
        return $this->belongsTo(User::class, 'nguoiDung_id');
    }

    public function childBinhLuan()
    {
        return $this->hasMany(BinhLuan::class, 'parent_id')->with('nguoiDung');
    }
}
