<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\DB;
use Kyslik\ColumnSortable\Sortable;

class TieuChi extends Model
{
    use HasFactory, SoftDeletes, Sortable;
    protected $dates = ['deleted_at'];
    protected $fillable = ['stt', 'ten', 'tieuChuan_id', 'ghiChu'];

    public $sortable = ['id' ,'stt', 'ten'];

    public function tieuChuan()
    {
        return $this->belongsTo(TieuChuan::class, 'tieuChuan_id');
    }

    public function yeuCau()
    {
        return $this->hasMany(YeuCau::class, 'tieuChi_id');
    }

    public function mocChuan()
    {
        return $this->hasMany(MocChuan::class, 'tieuChi_id');
    }

    public function baoCao()
    {
        return $this->hasMany(BaoCao::class, 'tieuChi_id');
    }

    public function baoCaoGk()
    {
        return $this->hasMany(BaoCaoGk::class, 'tieuChi_id');
    }

    public function baoCaoGkMinhChung()
    {
        return $this->hasMany(BaoCaoGkMinhChung::class, 'tieuChi_id');
    }

    public function tuKhoa()
    {
        return $this
            ->belongsToMany(TuKhoa::class, 'tieu_chi_tu_khoas', 'tieuChi_id', 'tuKhoa_id')
            ->withTimestamps();
    }
}
