<?php

namespace App\Services;

class HandleUpdateThreeMany {


    public static function handleUpdateNhomQuyen($nhomQuyens, $quyenTieuChuans, $nhomQuyenModel, $nhom_id)
    {
        if (count($nhomQuyens) > count($quyenTieuChuans)) {
            foreach ($quyenTieuChuans as $key => $item) {
                $nhomQuyens[$key]->update([
                    'quyenNhom_id' => $item->quyenNhom_id,
                    'tieuChuan_id' => $item->tieuChuan_id,
                ]);
            }
            foreach ($nhomQuyens as $key => $nhomQuyen) {
                if ($key >= count($quyenTieuChuans)) {
                    $nhomQuyen->forceDelete();
                }
            }
        } else {
            foreach ($nhomQuyens as $key => $nhomQuyen) {
                $nhomQuyen->update([
                    'quyenNhom_id' => $quyenTieuChuans[$key]->quyenNhom_id,
                    'tieuChuan_id' => $quyenTieuChuans[$key]->tieuChuan_id,
                ]);
            }
            foreach ($quyenTieuChuans as $key => $item) {
                if ($key >= count($nhomQuyens)) {
                    $nhomQuyenModel->create([
                        'nhom_id' => $nhom_id,
                        'quyenNhom_id' => $item->quyenNhom_id,
                        'tieuChuan_id' => $item->tieuChuan_id,
                    ]);
                }
            }
        }
        return;
    }

    public static function handleUpdateNhomNguoiDung($nguoiDungQuyens, $quyenBaoCaos, $nguoiDungQuyenModel, $id)
    {
        if (count($nguoiDungQuyens) > count($quyenBaoCaos)) {
            foreach ($quyenBaoCaos as $key => $item) {
                $nguoiDungQuyens[$key]->update([
                    'quyenNguoiDung_id' => $item->quyenNguoiDung_id,
                    'baoCao_id' => $item->baoCao_id,
                ]);
            }
            foreach ($nguoiDungQuyens as $key => $nguoiDungQuyen) {
                if ($key >= count($quyenBaoCaos)) {
                    $nguoiDungQuyen->forceDelete();
                }
            }
        } else {
            foreach ($nguoiDungQuyens as $key => $nguoiDungQuyen) {
                $nguoiDungQuyen->update([
                    'quyenNguoiDung_id' => $quyenBaoCaos[$key]->quyenNguoiDung_id,
                    'baoCao_id' => $quyenBaoCaos[$key]->baoCao_id,
                ]);
            }
            foreach ($quyenBaoCaos as $key => $item) {
                if ($key >= count($nguoiDungQuyens)) {
                    $nguoiDungQuyenModel->create([
                        'nhomNguoiDung_id' => $id,
                        'quyenNguoiDung_id' => $item->quyenNguoiDung_id,
                        'baoCao_id' => $item->baoCao_id,
                    ]);
                }
            }
        }
        return;
    }
}
