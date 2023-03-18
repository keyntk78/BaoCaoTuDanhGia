<?php

namespace App\Services;

use App\Models\BaoCao;
use App\Models\Nhom;
use App\Models\NhomNguoiDung;
use App\Models\NhomQuyen;
use App\Models\TieuChuan;
use App\models\NguoiDungQuyen;

class NhanXetBaoCaoPermission {
    private $tieuChuanModel;
    private $nhomNguoiDungModel;
    private $nhomQuyenModel;
    private $nguoiDungQuyenModel;
    private $nhomModel;
    public function __construct()
    {
        $this->baoCaoModel = new BaoCao();
        $this->tieuChuanModel = new TieuChuan();
        $this->nhomNguoiDungModel = new NhomNguoiDung();
        $this->nhomQuyenModel = new NhomQuyen();
        $this->nguoiDungQuyenModel = new NguoiDungQuyen();
        $this->nhomModel = new Nhom();
    }

    public function view() {
        $user = auth()->user();
        $nhomNguoiDungs = $this->nhomNguoiDungModel->where('nguoiDung_id', $user->id)->get();
        $nhomIds = [];
        foreach ($nhomNguoiDungs as $nhomNguoiDung) {
            array_push($nhomIds, $nhomNguoiDung->nhom_id);
        }
        $sameNhomNguoiDungs = $this->nhomNguoiDungModel->whereIn('nhom_id', $nhomIds)->get();
        $nhomNguoiDungIds = [];
        foreach ($sameNhomNguoiDungs as $nhomNguoiDung) {
            array_push($nhomNguoiDungIds, $nhomNguoiDung->id);
        }
        $nguoiDungQuyens = $this->nguoiDungQuyenModel->whereIn('nhomNguoiDung_id', $nhomNguoiDungIds)->get();
        $baoCaoIds = [];
        foreach ($nguoiDungQuyens as $nguoiDungQuyen) {
            if ($nguoiDungQuyen->quyenNguoiDung_id == 2) {
                array_push($baoCaoIds, $nguoiDungQuyen->baoCao_id);
            }
        }
        $baoCaos = $this->baoCaoModel->whereIn('id', $baoCaoIds)->get();
        if (count($baoCaos) > 0) {
            return true;
        }
        return false;
    }


    public function comment($nhomNguoiDungs, $baoCao)
    {
        $nhomNguoiDungIds = [];
        foreach ($nhomNguoiDungs as $nhomNguoiDung) {
            array_push($nhomNguoiDungIds, $nhomNguoiDung->id);
        }
        $nguoiDungQuyens = $this->nguoiDungQuyenModel->whereIn('nhomNguoiDung_id', $nhomNguoiDungIds)->get();
        foreach ($nguoiDungQuyens as $nguoiDungQuyen) {
            if ($nguoiDungQuyen->baoCao_id === $baoCao->id && $nguoiDungQuyen->quyenNguoiDung_id === 2) {
                return true;
            }
        }
        return false;
    }
}
