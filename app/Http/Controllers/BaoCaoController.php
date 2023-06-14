<?php

namespace App\Http\Controllers;

use App\Models\BaoCao;
use App\Models\BaoCaoSaoLuu;
use App\Models\Nganh;
use App\Models\NguoiDungQuyen;
use App\Models\Nhom;
use App\Models\NhomNguoiDung;
use App\Models\NhomQuyen;
use App\Models\TieuChi;
use App\Models\TieuChuan;
use App\Models\DotDanhGia;
use Illuminate\Http\Request;
use Carbon\Carbon;

class BaoCaoController extends Controller
{
    private $baoCaoModel;
    private $nganhModel;
    private $tieuChuanModel;
    private $tieuChiModel;
    private $baoCaoSLModel;

    private $dotDanhGiaModel;
    private $nhomNguoiDungModel;
    private $nguoiDungQuyenModel;
    private $nhomQuyenModel;
    private $nhomModel;
    public function __construct(BaoCao $baoCaoModel,DotDanhGia $dotDanhGiaModel, Nganh $nganhModel, TieuChuan $tieuChuanModel, TieuChi $tieuChiModel, BaoCaoSaoLuu $baoCaoSLModel, NhomNguoiDung $nhomNguoiDungModel, NguoiDungQuyen $nguoiDungQuyenModel, NhomQuyen $nhomQuyenModel, Nhom $nhomModel)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->baoCaoModel = $baoCaoModel;
        $this->nganhModel = $nganhModel;
        $this->tieuChuanModel = $tieuChuanModel;
        $this->tieuChiModel = $tieuChiModel;
        $this->baoCaoSLModel = $baoCaoSLModel;
        $this->nhomNguoiDungModel = $nhomNguoiDungModel;
        $this->nguoiDungQuyenModel = $nguoiDungQuyenModel;
        $this->nhomQuyenModel = $nhomQuyenModel;
        $this->nhomModel = $nhomModel;
        $this->dotDanhGiaModel = $dotDanhGiaModel;
    }

    public function index(Request $request)
    {
        $filterNganhId = $request->query('nganh_id');
        $filterTrangThai = $request->query('trangThai');
        $baoCaos = $this->baoCaoModel->sortable('id');
        $nganhs = $this->nganhModel->all();
        if (!empty($filterNganhId)) {
            $baoCaos->where('bao_caos.nganh_id', $filterNganhId);
        }
        if ($filterTrangThai != '') {
            $baoCaos->where('bao_caos.trangThai', $filterTrangThai);
        }
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
        $baoCaos = $baoCaos->whereIn('nguoiDung_id', $nguoiDungIds)->paginate(10);
        $trashCount = count($this->baoCaoModel->onlyTrashed()->whereIn('nguoiDung_id', $nguoiDungIds)->get());
        return view('pages.baocao.index', compact('baoCaos', 'trashCount', 'nganhs', 'filterNganhId', 'filterTrangThai'));
    }

    public function create()
    {
        $dateNow = Carbon::now();
        $nhomIds = [];
        $nganhIds = [];

        $nhomNguoiDungs = $this->nhomNguoiDungModel->where('nguoiDung_id', auth()->user()->id)->get();
        foreach ($nhomNguoiDungs as $nhomNguoiDung) {
            if ($nhomNguoiDung->vaiTro_id === 2 || $nhomNguoiDung->vaiTro_id === 3) {
                $nhomQuyens = $this->nhomQuyenModel->where('nhom_id', $nhomNguoiDung->nhom_id)->where('quyenNhom_id', 1)->get();
                foreach ($nhomQuyens as $nhomQuyen) {
                    if (!in_array($nhomQuyen->nhom_id, $nhomIds, true)) {
                        array_push($nhomIds, $nhomQuyen->nhom_id);
                    }
                }
            }
        }
        $nhoms = $this->nhomModel->whereIn('id', $nhomIds)->get();
        foreach ($nhoms as $nhom) {
            if (!in_array($nhom->nganh_id, $nganhIds, true)) {
                array_push($nganhIds, $nhom->nganh_id);
            }
        }


        $nganhs = $this->nganhModel
            ->Join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.nganh_id', '=', 'nganhs.id')
            ->Join('dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
            ->where('dot_danh_gias.namHoc', '=', $dateNow->year)
            ->whereIn('nganhs.id', $nganhIds)
            ->Select('nganhs.id', 'nganhs.ten')
            ->get();

        return view('pages.baocao.create', compact('nganhs'));
    }

    public function store(Request $request)
    {
        $dateNow = Carbon::now();
        $dotDanhGia = $this->nganhModel
            ->Join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.nganh_id', '=', 'nganhs.id')
            ->Join('dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
            ->where('namHoc', $dateNow->year)
            ->where('nganhs.id', $request->nganh_id)
            ->select('dot_danh_gias.id')->first();

        $this->baoCaoModel->create([
            'moTa' => $request->moTa,
            'diemManh' => $request->diemManh,
            'diemTonTai' => $request->diemTonTai,
            'keHoachHanhDong' => $request->keHoachHanhDong,
            'diemTDG' => $request->diemTDG,
            'trangThai' => 0,
            'nganh_id' => $request->nganh_id,
            'tieuChi_id' => $request->tieuChi_id,
            'tieuChuan_id' => $request->tieuChuan_id,
            'dotDanhGia_id' => $dotDanhGia->id,
            'nguoiDung_id' => auth()->user()->id,
            'moDau' => $request->moDau,
            'ketLuan' => $request->ketLuan,
        ]);
        return redirect()->route('baocao.index')->with('message', 'Thêm thành công!');
    }

    public function show($id)
    {
        $baoCao = $this->baoCaoModel->find($id);
        return view('pages.baocao.show', compact('baoCao'));
    }

    public function compare($id, $subid)
    {
        $baoCaoSL = $this->baoCaoSLModel->find($subid);
        $baoCao = $this->baoCaoModel->find($id);
        return view('pages.baocao.compare', compact('baoCao', 'baoCaoSL'));
    }


    public function edit($id)
    {
        $baoCao = $this->baoCaoModel->find($id);
        $nganhs = $this->nganhModel->all();
        $tieuChis = $this->tieuChiModel->all();
        return view('pages.baocao.edit', compact('baoCao', 'nganhs', 'tieuChis'));
    }

    public function update(Request $request, $id)
    {
        $baoCao = $this->baoCaoModel->find($id);
        $baoCao->update([
            'moTa' => $request->moTa,
            'diemManh' => $request->diemManh,
            'diemTonTai' => $request->diemTonTai,
            'keHoachHanhDong' => $request->keHoachHanhDong,
            'diemTDG' => $request->diemTDG,
            'moDau' => $request->moDau,
            'ketLuan' => $request->ketLuan,
        ]);
        $baoCao->updated_at = Carbon::now();
        $baoCao->save(['timestamps' => FALSE]);
        $nganh = DotDanhGia::orderBy('namHoc')
                        ->join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
                        ->join('nganhs', 'nganhs.id', '=', 'nganh_dot_danh_gias.nganh_id')
                        ->where('dot_danh_gias.trangThai', 0)
                        ->where('nganh_dot_danh_gias.nganh_id', $baoCao->nganh_id)->first();
        $tieuChuans = $this->tieuChuanModel->all();
        foreach ($tieuChuans as $tieuChuan) {
            $count = 0;
            $baoCaoTongKet = null;
            foreach ($tieuChuan->tieuChi as $key => $tieuChi) {
                if ($key == 0) {
                    $baoCaoTongKet = $tieuChi->baoCao->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->first();
                }
                $found = $tieuChi->baoCao->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->first();
                if (!empty($found->diemTDG) && $found->diemTDG >= 4) {
                    $count++;
                }
            }
            if (!empty($baoCaoTongKet)) {
                $baoCaoTongKet->update([
                    'tongSoTC' => count($tieuChuan->tieuChi) - 1,
                    'soTCDat' => $count
                ]);
            }
        }
        return redirect()->route('baocao.show', ['id' => $id])->with('message', 'Sửa thành công!');
    }

    public function destroy(Request $request, $id)
    {
        try {
            $this->baoCaoModel->find($id)->delete();
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

    public function finish(Request $request, $id)
    {
        try {
            $this->baoCaoModel->find($id)->update([
                'trangThai' => 1
            ]);
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

    public function reopen(Request $request, $id)
    {
        try {
            $this->baoCaoModel->find($id)->update([
                'trangThai' => 0
            ]);
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

    public function trash()
    {
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
        $baoCaos = $this->baoCaoModel->onlyTrashed()->whereIn('nguoiDung_id', $nguoiDungIds)->paginate(10);
        return view('pages.baocao.trash', compact('baoCaos'));
    }

    public function restore(Request $request, $id)
    {
        try {

            $this->baoCaoModel->onlyTrashed()->find($id)->restore();
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

    public function restoreAll(Request $request)
    {
        try {
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
            $this->baoCaoModel->onlyTrashed()->whereIn('nguoiDung_id', $nguoiDungIds)->restore();
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

    public function forceDestroy(Request $request, $id)
    {
        try {
            $this->baoCaoModel->onlyTrashed()->find($id)->forceDelete();
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

    public function forceDestroyAll(Request $request)
    {
        try {
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
            $this->baoCaoModel->onlyTrashed()->whereIn('nguoiDung_id', $nguoiDungIds)->forceDelete();
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

    public function backup(Request $request, $id)
    {
        try {
            $baoCao = $this->baoCaoModel->find($id);
            $this->baoCaoSLModel->create([
                'moTa' => $baoCao->moTa,
                'diemManh' => $baoCao->diemManh,
                'diemTonTai' => $baoCao->diemTonTai,
                'keHoachHanhDong' => $baoCao->keHoachHanhDong,
                'diemTDG' => $baoCao->diemTDG,
                'nganh_id' => $baoCao->nganh_id,
                'tieuChi_id' => $baoCao->tieuChi_id,
                'tieuChuan_id' => $baoCao->tieuChuan_id,
                'dotDanhGia_id' => $baoCao->dotDanhGia_id,
                'nguoiDung_id' => $baoCao->nguoiDung_id,
                'baoCao_id' => $baoCao->id,
                'moDau' => $baoCao->moDau,
                'ketLuan' => $baoCao->ketLuan,
                'soTCDat' => $baoCao->soTCDat
            ]);
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

    public function handleSelectNganh(Request $request) {
        $nhomNguoiDungs = $this->nhomNguoiDungModel->where('nganh_id', $request->nganhId)->where('nguoiDung_id', auth()->user()->id)->whereIn('vaiTro_id', [2, 3])->get();
        $tieuChuanIds = [];
        if ($nhomNguoiDungs) {
            foreach ($nhomNguoiDungs as $nhomNguoiDung) {
                $nhomQuyens = $this->nhomQuyenModel->where('nhom_id', $nhomNguoiDung->nhom_id)->where('quyenNhom_id', 1)->get();
                foreach ($nhomQuyens as $nhomQuyen) {
                    array_push($tieuChuanIds, $nhomQuyen->tieuChuan_id);
                }
            }
        }
        $tieuChuans = $this->tieuChuanModel->whereIn('id', $tieuChuanIds)->get();
//        $tieuChis = $this->tieuChiModel->with('tieuChuan')->where('tieuChuan_id', $tieuChuans[0]->id)->get();

        return response()->json([
            'data' => $tieuChuans,
        ], 200);
    }

    public function handleSelectTieuChuan(Request $request) {
        $tieuChis = $this->tieuChiModel->with('tieuChuan')
                            ->where('tieuChuan_id', $request->tieuChuanId)->get();

        $dateNow = Carbon::now();

        $dotDanhGia = $this->dotDanhGiaModel
            ->join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
            ->join('nganhs', 'nganhs.id', '=', 'nganh_dot_danh_gias.nganh_id')
            ->where('nganhs.id', '=', $request->nganhId)
            ->where('dot_danh_gias.namHoc', '=', $dateNow->year)
            ->Select('dot_danh_gias.id')
            ->first();

        $baoCaos = $this->baoCaoModel
            ->where('dotDanhGia_id', $dotDanhGia->id)
            ->where('nganh_id', $request->nganhId)
            ->where('tieuChuan_id', $request->tieuChuanId)

            ->get();

        $baCaoTieuChiId = [];
        foreach ($baoCaos as $baoCao) {
            array_push($baCaoTieuChiId, $baoCao->tieuChi_id);
        }

        $tieuChiFinal = [];

        foreach ($tieuChis as $element) {
            if (!in_array($element->id, $baCaoTieuChiId)) {
                $tieuChiFinal[] = $element;
            }
        }

        return response()->json([
            'data' => $tieuChiFinal
        ], 200);
    }
}
