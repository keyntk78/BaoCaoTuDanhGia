<?php

namespace App\Services;

class HandleUpdateHaveMany {


    public static function handleUpdateYeuCau($yeuCaus, $tieuChiId, $request, $yeuCauModel)
    {
        if (empty($request->yeuCau)) {
            foreach ($yeuCaus as $yeuCau) {
                $yeuCau->forceDelete();
            }
            return;
        }
        if (count($yeuCaus) >= count($request->yeuCau)) {
            foreach ($request->yeuCau as $key => $item) {
                $yeuCauModel->find($yeuCaus[$key]->id)->update([
                    'noiDung' => $item,
                    'tieuChi_id' => $tieuChiId
                ]);
            }
            foreach ($yeuCaus as $key => $yeuCau) {
                if ($key >= count($request->yeuCau)) {
                    $yeuCau->forceDelete();
                }
            }
        } else {
            foreach ($yeuCaus as $key => $yeuCau) {
                $yeuCauModel->find($yeuCau->id)->update([
                    'noiDung' => $request->yeuCau[$key],
                    'tieuChi_id' => $tieuChiId
                ]);
            }
            foreach ($request->yeuCau as $key => $item) {
                if ($key >= count($yeuCaus)) {
                    $yeuCauModel->create([
                        'noiDung' => $item,
                        'tieuChi_id' => $tieuChiId
                    ]);
                }
            }
        }
        return;
    }

    public static function handleUpdateMocChuan($mocChuans, $tieuChiId, $request, $mocChuanModel)
    {
        if (empty($request->mocChuan)) {
            foreach ($mocChuans as $mocChuan) {
                $mocChuan->forceDelete();
            }
            return;
        }
        if (count($mocChuans) >= count($request->mocChuan)) {
            foreach ($request->mocChuan as $key => $item) {
                $mocChuanModel->find($mocChuans[$key]->id)->update([
                    'noiDung' => $item,
                    'tieuChi_id' => $tieuChiId
                ]);
            }
            foreach ($mocChuans as $key => $mocChuan) {
                if ($key >= count($request->mocChuan)) {
                    $mocChuan->forceDelete();
                }
            }
        } else {
            foreach ($mocChuans as $key => $mocChuan) {
                $mocChuanModel->find($mocChuan->id)->update([
                    'noiDung' => $request->mocChuan[$key],
                    'tieuChi_id' => $tieuChiId
                ]);
            }
            foreach ($request->mocChuan as $key => $item) {
                if ($key >= count($mocChuans)) {
                    $mocChuanModel->create([
                        'noiDung' => $item,
                        'tieuChi_id' => $tieuChiId
                    ]);
                }
            }
        }
        return;
    }

    public static function handleUpdateGiaiDoan($giaiDoans, $dotDanhGiaId, $request, $giaiDoanModel)
    {
        if (empty($request->hoatDong_id)) {
            foreach ($giaiDoans as $giaiDoan) {
                $giaiDoan->forceDelete();
            }
            return;
        }
        if (count($giaiDoans) >= count($request->hoatDong_id)) {
            foreach ($request->hoatDong_id as $key => $item) {
                $giaiDoanModel->find($giaiDoans[$key]->id)->update([
                    'ngayBD' => $request->ngayBD[$key],
                    'ngayKT' => $request->ngayKT[$key],
                    'hoatDong_id' => $item,
                    'dotDanhGia_id' => $dotDanhGiaId
                ]);
            }
            foreach ($giaiDoans as $key => $giaiDoan) {
                if ($key >= count($request->hoatDong_id)) {
                    $giaiDoan->forceDelete();
                }
            }
        } else {
            foreach ($giaiDoans as $key => $giaiDoan) {
                $giaiDoanModel->find($giaiDoan->id)->update([
                    'ngayBD' => $request->ngayBD[$key],
                    'ngayKT' => $request->ngayKT[$key],
                    'hoatDong_id' => $request->hoatDong_id[$key],
                    'dotDanhGia_id' => $dotDanhGiaId
                ]);
            }
            foreach ($request->hoatDong_id as $key => $item) {
                if ($key >= count($giaiDoans)) {
                    $giaiDoanModel->create([
                        'ngayBD' => $request->ngayBD[$key],
                        'ngayKT' => $request->ngayKT[$key],
                        'hoatDong_id' => $item,
                        'dotDanhGia_id' => $dotDanhGiaId
                    ]);
                }
            }
        }
        return;
    }
}
