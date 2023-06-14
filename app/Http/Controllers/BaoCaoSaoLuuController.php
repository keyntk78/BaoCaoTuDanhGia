<?php

namespace App\Http\Controllers;

use App\Models\BaoCao;
use App\Models\BaoCaoSaoLuu;
use App\Models\Nganh;
use App\Models\TieuChi;
use Illuminate\Http\Request;

class BaoCaoSaoLuuController extends Controller
{
    private $baoCaoModel;
    private $nganhModel;
    private $tieuChiModel;
    private $baoCaoSLModel;
    public function __construct(BaoCao $baoCaoModel, Nganh $nganhModel, TieuChi $tieuChiModel, BaoCaoSaoLuu $baoCaoSLModel)
    {
        $this->baoCaoModel = $baoCaoModel;
        $this->nganhModel = $nganhModel;
        $this->tieuChiModel = $tieuChiModel;
        $this->baoCaoSLModel = $baoCaoSLModel;
    }

    public function show($id)
    {
        $baoCaoSL = $this->baoCaoSLModel->find($id);
        return view('pages.baocaosaoluu.show', compact('baoCaoSL'));
    }

    public function destroy(Request $request)
    {
        try {
            $this->baoCaoSLModel->find($request->id)->delete();
            return response()->json([
                'code' => 200,
                'message' => 'success',
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }

    public function restore(Request $request)
    {
        try {
            $baocaoSL = $this->baoCaoSLModel->find($request->id);
            $baocaoSL->baoCao->update([
                'moTa' => $baocaoSL->moTa,
                'diemManh' => $baocaoSL->diemManh,
                'moDau' => $baocaoSL->moDau,
                'ketLuan' => $baocaoSL->ketLuan,
                'diemTonTai' => $baocaoSL->diemTonTai,
                'keHoachHanhDong' => $baocaoSL->keHoachHanhDong,
                'diemTDG' => $baocaoSL->diemTDG,
                'nganh_id' => $baocaoSL->nganh_id,
                'tieuChi_id' => $baocaoSL->tieuChi_id,
                'dotDanhGia_id' => $baocaoSL->dotDanhGia_id,
                'nguoiDung_id' => $baocaoSL->nguoiDung_id
            ]);
            return response()->json([
                'code' => 200,
                'message' => 'success',
                'data' =>$baocaoSL
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'code' => 500,
                'message' => 'fail',
            ], 500);
        }
    }
}
