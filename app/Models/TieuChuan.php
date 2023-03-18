<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Kyslik\ColumnSortable\Sortable;

class TieuChuan extends Model
{
    use HasFactory, SoftDeletes, Sortable;
    protected $dates = ['deleted_at'];
    protected $fillable = ['stt', 'ten', 'boTieuChuan_id'];
    public $sortable = ['stt', 'ten'];


    public function tieuChi()
    {
        return $this->hasMany(TieuChi::class, 'tieuChuan_id')->orderBy('stt');
    }

    public function baoCao()
    {
        return $this->hasMany(BaoCao::class, 'tieuChuan_id');
    }
}
