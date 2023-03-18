<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MocChuan extends Model
{
    use HasFactory;
    protected $fillable = ['noiDung', 'tieuChi_id'];
}
