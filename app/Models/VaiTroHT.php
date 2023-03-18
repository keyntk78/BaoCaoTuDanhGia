<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class VaiTroHT extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['ten', 'slug'];

    public function quyenHT()
    {
        return $this
            ->belongsToMany(QuyenHT::class, 'vai_tro_h_t_quyen_h_t_s', 'vaiTroHT_id', 'quyenHT_id')
            ->withPivot('nganh_id')
            ->withTimestamps();
    }
}
