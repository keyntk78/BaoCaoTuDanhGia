<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietMinhChung extends Model
{
    use HasFactory;
    protected $fillable = ['ten', 'link', 'isUrl','minhChung_id'];
}
