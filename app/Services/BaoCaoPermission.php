<?php

namespace App\Services;

use App\Models\BaoCao;
use App\Models\Nhom;
use App\Models\NhomNguoiDung;
use App\Models\NhomQuyen;
use App\Models\TieuChuan;
use App\Models\NguoiDungQuyen;

class BaoCaoPermission {
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

    public function create() {
        $nhomIds = [];
        $tieuChuanIds = [];
        $vaiTroIds = [];
        $nhomNguoiDungs = $this->nhomNguoiDungModel->where('nguoiDung_id', auth()->user()->id)->get();
        foreach ($nhomNguoiDungs as $nhomNguoiDung) {
            $nhomQuyens = $this->nhomQuyenModel->where('nhom_id', $nhomNguoiDung->nhom_id)->where('quyenNhom_id', 1)->get();
            foreach ($nhomQuyens as $nhomQuyen) {
                array_push($tieuChuanIds, $nhomQuyen->tieuChuan_id);
                if (!in_array($nhomQuyen->nhom_id, $nhomIds, true)) {
                    array_push($nhomIds, $nhomQuyen->nhom_id);
                }
            }
            if ($nhomNguoiDung->vaiTro_id === 2) {
                array_push($vaiTroIds, $nhomNguoiDung->vaiTro_id);
            }
        }
        $tieuChuans = $this->tieuChuanModel->whereIn('id', $tieuChuanIds)->get();
        if (!empty($tieuChuans) && count($tieuChuans) > 0 && !empty($vaiTroIds) && count($vaiTroIds) > 0) {
            return true;
        } return false;
    }

    public function editSomething() {
        $user = auth()->user();
        $nhomNguoiDungs = $this->nhomNguoiDungModel->where('nguoiDung_id', $user->id)->get();
        $nhomIds = [];
        foreach ($nhomNguoiDungs as $nhomNguoiDung) {
            array_push($nhomIds, $nhomNguoiDung->nhom_id);
        }
        $nhomTruongs = $this->nhomNguoiDungModel->whereIn('nhom_id', $nhomIds)->where('vaiTro_id', 2)->get();
        $nguoiDungIds = [];
        foreach ($nhomTruongs as $nhomTruong) {
            array_push($nguoiDungIds, $nhomTruong->nguoiDung_id);
        }
        $baoCaos = $this->baoCaoModel->whereIn('nguoiDung_id', $nguoiDungIds)->get();
        if (count($baoCaos) > 0) {
            return true;
        }
        return false;
    }

    public function updatePersonal($nhomNguoiDungs, $baoCao)
    {
        $nhomNguoiDungIds = [];
        foreach ($nhomNguoiDungs as $nhomNguoiDung) {
            array_push($nhomNguoiDungIds, $nhomNguoiDung->id);
        }
        $nguoiDungQuyens = $this->nguoiDungQuyenModel->whereIn('nhomNguoiDung_id', $nhomNguoiDungIds)->get();
        foreach ($nguoiDungQuyens as $nguoiDungQuyen) {
            if ($nguoiDungQuyen->baoCao_id === $baoCao->id && $baoCao->trangThai == 0) {
                return true;
            }
        }
        return false;
    }

    public function controlPersonal($nhomNguoiDungs, $baoCao)
    {
        $nhomNguoiDungIds = [];
        foreach ($nhomNguoiDungs as $nhomNguoiDung) {
            array_push($nhomNguoiDungIds, $nhomNguoiDung->id);
        }
        $nguoiDungQuyens = $this->nguoiDungQuyenModel->whereIn('nhomNguoiDung_id', $nhomNguoiDungIds)->get();
        foreach ($nguoiDungQuyens as $nguoiDungQuyen) {
            if ($nguoiDungQuyen->baoCao_id === $baoCao->id) {
                return true;
            }
        }
        return false;
    }

    public function deletePersonal($user, $baoCao)
    {
        $baoCaos = $this->baoCaoModel->withTrashed()->where('nguoiDung_id', $user->id)->get();
        if (count($baoCaos) > 0) {
            foreach($baoCaos as $item) {
                if ($item->id == $baoCao->id) {
                    return true;
                }
            }
        }
        return false;
    }

    public function trash()
    {
        $nhomIds = [];
        $tieuChuanIds = [];
        $vaiTroIds = [];
        $nhomNguoiDungs = $this->nhomNguoiDungModel->where('nguoiDung_id', auth()->user()->id)->get();
        foreach ($nhomNguoiDungs as $nhomNguoiDung) {
            $nhomQuyens = $this->nhomQuyenModel->where('nhom_id', $nhomNguoiDung->nhom_id)->where('quyenNhom_id', 1)->get();
            foreach ($nhomQuyens as $nhomQuyen) {
                array_push($tieuChuanIds, $nhomQuyen->tieuChuan_id);
                if (!in_array($nhomQuyen->nhom_id, $nhomIds, true)) {
                    array_push($nhomIds, $nhomQuyen->nhom_id);
                }
            }
            if ($nhomNguoiDung->vaiTro_id === 2) {
                array_push($vaiTroIds, $nhomNguoiDung->vaiTro_id);
            }
        }
        $tieuChuans = $this->tieuChuanModel->whereIn('id', $tieuChuanIds)->get();
        if (!empty($tieuChuans) && count($tieuChuans) > 0 && !empty($vaiTroIds) && count($vaiTroIds) > 0) {
            return true;
        } return false;
    }
}
