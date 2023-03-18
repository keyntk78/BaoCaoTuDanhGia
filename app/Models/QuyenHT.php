<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QuyenHT extends Model
{
    use HasFactory;


    public function childQuyenHT()
    {
        return $this->hasMany(QuyenHT::class, 'parent_id');
    }
}
