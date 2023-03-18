<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DonVi extends Model
{
    use HasFactory, SoftDeletes;
    protected $dates = ['deleted_at'];
    protected $fillable = ['ten'];

    public function nguoiDung()
    {
        return $this->hasMany(User::class, 'donVi_id');
    }
    public function minhChung()
    {
        return $this->hasMany(MinhChung::class, 'donVi_id');
    }
}
