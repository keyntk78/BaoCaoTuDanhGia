<?php

namespace App\Services;

use App\Policies\BaoCaoGkPolicy;
use App\Policies\BaoCaoPolicy;
use App\Policies\DotDanhGiaGkPolicy;
use App\Policies\LoaiMinhChungPolicy;
use Illuminate\Support\Facades\Gate;
use App\Policies\CapDanhGiaPolicy;
use App\Policies\DotDanhGiaPolicy;
use App\Policies\VaiTroHeThongPolicy;
use App\Policies\BoTieuChuanPolicy;
use App\Policies\TieuChuanPolicy;
use App\Policies\TieuChiPolicy;
use App\Policies\DonViPolicy;
use App\Policies\NganhPolicy;
use App\Policies\NhomPolicy;
use App\Policies\NguoiDungPolicy;
use App\Policies\MinhChungPolicy;
use App\Policies\GiaiDoanPolicy;
use App\Policies\QuanLyNhomPolicy;
use App\Policies\NhanXetBaoCaoPolicy;
use App\Policies\PhanBienBaoCaoPolicy;
use App\Policies\TienDoBaoCaoPolicy;

class PermissionGateAndPolicyAccess {

    public function setGateAndPolicyAccess()
    {
        $this->defineGateCategory();
    }

    public function defineGateCategory()
    {
        Gate::define('capdanhgia-danhsach', [CapDanhGiaPolicy::class, 'viewAny']);
        Gate::define('capdanhgia-them', [CapDanhGiaPolicy::class, 'create']);
        Gate::define('capdanhgia-sua', [CapDanhGiaPolicy::class, 'update']);
        Gate::define('capdanhgia-xoa', [CapDanhGiaPolicy::class, 'delete']);

        Gate::define('dotdanhgia-danhsach', [DotDanhGiaPolicy::class, 'viewAny']);
        Gate::define('dotdanhgia-chitiet', [DotDanhGiaPolicy::class, 'view']);
        Gate::define('dotdanhgia-them', [DotDanhGiaPolicy::class, 'create']);
        Gate::define('dotdanhgia-sua', [DotDanhGiaPolicy::class, 'update']);
        Gate::define('dotdanhgia-xoa', [DotDanhGiaPolicy::class, 'delete']);
        Gate::define('dotdanhgia-dieukhien', [DotDanhGiaPolicy::class, 'control']);

        Gate::define('vaitrohethong-danhsach', [VaiTroHeThongPolicy::class, 'viewAny']);
        Gate::define('vaitrohethong-them', [VaiTroHeThongPolicy::class, 'create']);
        Gate::define('vaitrohethong-sua', [VaiTroHeThongPolicy::class, 'update']);
        Gate::define('vaitrohethong-xoa', [VaiTroHeThongPolicy::class, 'delete']);

        Gate::define('botieuchuan-danhsach', [BoTieuChuanPolicy::class, 'viewAny']);
        Gate::define('botieuchuan-them', [BoTieuChuanPolicy::class, 'create']);
        Gate::define('botieuchuan-sua', [BoTieuChuanPolicy::class, 'update']);
        Gate::define('botieuchuan-xoa', [BoTieuChuanPolicy::class, 'delete']);

        Gate::define('tieuchuan-danhsach', [TieuChuanPolicy::class, 'viewAny']);
        Gate::define('tieuchuan-them', [TieuChuanPolicy::class, 'create']);
        Gate::define('tieuchuan-sua', [TieuChuanPolicy::class, 'update']);
        Gate::define('tieuchuan-xoa', [TieuChuanPolicy::class, 'delete']);

        Gate::define('tieuchi-danhsach', [TieuChiPolicy::class, 'viewAny']);
        Gate::define('tieuchi-chitiet', [TieuChiPolicy::class, 'view']);
        Gate::define('tieuchi-them', [TieuChiPolicy::class, 'create']);
        Gate::define('tieuchi-sua', [TieuChiPolicy::class, 'update']);
        Gate::define('tieuchi-xoa', [TieuChiPolicy::class, 'delete']);

        Gate::define('donvi-danhsach', [DonViPolicy::class, 'viewAny']);
        Gate::define('donvi-them', [DonViPolicy::class, 'create']);
        Gate::define('donvi-sua', [DonViPolicy::class, 'update']);
        Gate::define('donvi-xoa', [DonViPolicy::class, 'delete']);

        Gate::define('nganh-danhsach', [NganhPolicy::class, 'viewAny']);
        Gate::define('nganh-them', [NganhPolicy::class, 'create']);
        Gate::define('nganh-sua', [NganhPolicy::class, 'update']);
        Gate::define('nganh-xoa', [NganhPolicy::class, 'delete']);

        Gate::define('nhom-danhsach', [NhomPolicy::class, 'viewAny']);
        Gate::define('nhom-chitiet', [NhomPolicy::class, 'view']);
        Gate::define('nhom-them', [NhomPolicy::class, 'create']);
        Gate::define('nhom-sua', [NhomPolicy::class, 'update']);
        Gate::define('nhom-xoa', [NhomPolicy::class, 'delete']);
        Gate::define('nhom-thanhvien', [NhomPolicy::class, 'detail']);

        Gate::define('nguoidung-danhsach', [NguoiDungPolicy::class, 'viewAny']);
        Gate::define('nguoidung-chitiet', [NguoiDungPolicy::class, 'view']);
        Gate::define('nguoidung-them', [NguoiDungPolicy::class, 'create']);
        Gate::define('nguoidung-sua', [NguoiDungPolicy::class, 'update']);
        Gate::define('nguoidung-xoa', [NguoiDungPolicy::class, 'delete']);

        Gate::define('loaiminhchung-danhsach', [LoaiMinhChungPolicy::class, 'viewAny']);
        Gate::define('loaiminhchung-them', [LoaiMinhChungPolicy::class, 'create']);
        Gate::define('loaiminhchung-sua', [LoaiMinhChungPolicy::class, 'update']);
        Gate::define('loaiminhchung-xoa', [LoaiMinhChungPolicy::class, 'delete']);

        Gate::define('minhchung-danhsach', [MinhChungPolicy::class, 'viewAny']);
        Gate::define('minhchung-chitiet', [MinhChungPolicy::class, 'view']);
        Gate::define('minhchung-them', [MinhChungPolicy::class, 'create']);
        Gate::define('minhchung-sua', [MinhChungPolicy::class, 'update']);
        Gate::define('minhchung-xoa', [MinhChungPolicy::class, 'delete']);
        Gate::define('minhchung-canhan', [MinhChungPolicy::class, 'personal']);

        Gate::define('time-viet-bao-cao', [GiaiDoanPolicy::class, 'update']);
        Gate::define('time-nhan-xet-bao-cao', [GiaiDoanPolicy::class, 'comment']);
        Gate::define('time-phan-bien-bao-cao', [GiaiDoanPolicy::class, 'counterArg']);

        Gate::define('baocao-danhsach', [BaoCaoPolicy::class, 'view']);
        Gate::define('baocao-them', [BaoCaoPolicy::class, 'create']);
        Gate::define('baocao-sua', [BaoCaoPolicy::class, 'editPersonal']);
        Gate::define('baocao-xoa', [BaoCaoPolicy::class, 'deletePersonal']);
        Gate::define('baocao-dieukhien', [BaoCaoPolicy::class, 'controlPersonal']);
        Gate::define('baocao-thungrac', [BaoCaoPolicy::class, 'trash']);

        Gate::define('baocaogk-danhsach', [BaoCaoGkPolicy::class, 'viewAny']);
        Gate::define('baocaogk-them', [BaoCaoGkPolicy::class, 'create']);
        Gate::define('baocaogk-sua', [BaoCaoGkPolicy::class, 'update']);
        Gate::define('baocaogk-xoa', [BaoCaoGkPolicy::class, 'delete']);
        Gate::define('baocaogk-trangthai', [BaoCaoGkPolicy::class, 'handleStatus']);

        Gate::define('dotdanhgiagk-xemvathem', [DotDanhGiaGkPolicy::class, 'createAndShow']);
        Gate::define('dotdanhgiagk-sua', [DotDanhGiaGkPolicy::class, 'update']);



        Gate::define('quanlynhom', [QuanLyNhomPolicy::class, 'control']);

        Gate::define('nhanxetbaocao-danhsach', [NhanXetBaoCaoPolicy::class, 'view']);
        Gate::define('nhanxetbaocao-binhluan', [NhanXetBaoCaoPolicy::class, 'comment']);

        Gate::define('phanbienbaocao-danhsach', [PhanBienBaoCaoPolicy::class, 'view']);
        Gate::define('phanbienbaocao-binhluan', [PhanBienBaoCaoPolicy::class, 'comment']);

        Gate::define('tiendo-danhsach', [TienDoBaoCaoPolicy::class, 'viewAny']);
    }
}
