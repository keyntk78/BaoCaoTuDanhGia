<?php

namespace App\Http\Controllers;

use App\Models\BaoCao;
use App\Models\Nganh;
use App\Models\NguoiDungQuyen;
use App\Models\Nhom;
use App\Models\NhomNguoiDung;
use App\Models\NhomQuyen;
use App\Models\QuyenNguoiDung;
use App\Models\QuyenNhom;
use App\Models\TieuChi;
use App\Models\TieuChuan;
use App\Models\User;
use App\Models\VaiTro;
use Illuminate\Http\Request;
use App\Services\HandleUpdateThreeMany;

class NhomNguoiDungController extends Controller
{
    private $nhomModel;
    private $nhomNguoiDungModel;
    private $nguoiDungQuyenModel;
    private $quyenNguoiDungModel;
    private $vaiTroModel;
    private $baoCaoModel;
    private $tieuChuanModel;
    private $tieuChiModel;
    private $userModel;
    public function __construct(Nhom $nhomModel, Nganh $nganhModel, QuyenNhom $quyenNhomModel, TieuChuan $tieuChuanModel, TieuChi $tieuChiModel, NhomQuyen $nhomQuyenModel, User $userModel, NhomNguoiDung $nhomNguoiDungModel, NguoiDungQuyen $nguoiDungQuyenModel, QuyenNguoiDung $quyenNguoiDungModel, VaiTro $vaiTroModel, BaoCao $baoCaoModel)
    {
        $this->nhomModel = $nhomModel;
        $this->nganhModel = $nganhModel;
        $this->quyenNhomModel = $quyenNhomModel;
        $this->tieuChuanModel = $tieuChuanModel;
        $this->tieuChiModel = $tieuChiModel;
        $this->nhomQuyenModel = $nhomQuyenModel;
        $this->userModel = $userModel;
        $this->nhomNguoiDungModel = $nhomNguoiDungModel;
        $this->nguoiDungQuyenModel = $nguoiDungQuyenModel;
        $this->quyenNguoiDungModel = $quyenNguoiDungModel;
        $this->vaiTroModel = $vaiTroModel;
        $this->baoCaoModel = $baoCaoModel;
    }

    public function show($id)
    {
        $nhomNguoiDungs = $this->nhomNguoiDungModel->where('nhom_id', $id)->get();
        return view('pages.nhomnguoidung.show', compact('nhomNguoiDungs'));
    }
    public function edit($id)
    {
        $nhomNguoiDung = $this->nhomNguoiDungModel->find($id);
        $vaiTros = $this->vaiTroModel->all();
        $quyenNguoiDungs = $this->quyenNguoiDungModel->all();
        $nhomQuyens = $this->nhomQuyenModel->where('nhom_id', $nhomNguoiDung->nhom_id)->get();
        $tieuChuanIds = [];
        foreach ($nhomQuyens as $nhomQuyen) {
            if ($nhomQuyen->quyenNhom_id == 1 && !in_array($nhomQuyen->quyenNhom_id, $tieuChuanIds, true)) {
                array_push($tieuChuanIds, $nhomQuyen->tieuChuan_id);
            }
        }
        $tieuChis = $this->tieuChiModel->whereIn('tieuChuan_id', $tieuChuanIds)->get();
        $tieuChiIds = [];
        foreach ($tieuChis as $tieuChi) {
            array_push($tieuChiIds, $tieuChi->id);
        }
        $baoCaos = $this->baoCaoModel->where('nganh_id', $nhomNguoiDung->nganh_id)->whereIn('tieuChi_id', $tieuChiIds)->get();
        $baoCaoAlls = $this->baoCaoModel->all();
        $current_quyenNguoiDungs = [];
        $current_baoCaos = [];
        $nguoiDungQuyens = $this->nguoiDungQuyenModel->where('nhomNguoiDung_id', $id)->get();
        foreach ($nguoiDungQuyens as $item) {
            array_push($current_quyenNguoiDungs, $item->quyenNguoiDung_id);
            array_push($current_baoCaos, $item->baoCao_id);
        }
        return view('pages.nhomnguoidung.edit', compact('nhomNguoiDung', 'vaiTros', 'quyenNguoiDungs', 'baoCaos', 'baoCaoAlls', 'current_quyenNguoiDungs', 'current_baoCaos'));
    }
    public function update(Request $request, $id)
    {
        $nhomNguoiDung = $this->nhomNguoiDungModel->find($id);
        $nhomNguoiDung->update([
            'vaiTro_id' => $request->vaiTro_id
        ]);
        $nguoiDungQuyens = $this->nguoiDungQuyenModel->where('nhomNguoiDung_id', $id)->get();
        if (!empty($request->quyenNguoiDung_id) && !empty($request->baoCao_id)) {
            $quyenBaoCaos = [];
            foreach ($request->quyenNguoiDung_id as $key => $item) {
                $obj = (object) [
                    'quyenNguoiDung_id' => $item,
                    'baoCao_id' => $request->baoCao_id[$key],
                ];
                array_push($quyenBaoCaos, $obj);
            }
            HandleUpdateThreeMany::handleUpdateNhomNguoiDung($nguoiDungQuyens, $quyenBaoCaos, $this->nguoiDungQuyenModel, $id);
        } else {
            foreach ($nguoiDungQuyens as $nguoiDungQuyen) {
                $nguoiDungQuyen->forceDelete();
            }
        }
        return redirect()->route('nhomnguoidung.edit', ['id' => $id])->with('message', 'Sửa thành công!');
    }

    public function handleSelectQuyen(Request $request)
    {
        $nhomNguoiDung = $this->nhomNguoiDungModel->find($request->nhomNguoiDung_id);
        $nhomQuyens = $this->nhomQuyenModel->where('nhom_id', $nhomNguoiDung->nhom_id)->get();
        $tieuChuanIds = [];
        foreach ($nhomQuyens as $nhomQuyen) {
            if ($nhomQuyen->quyenNhom_id == $request->quyen_id && !in_array($nhomQuyen->quyenNhom_id, $tieuChuanIds, true)) {
                array_push($tieuChuanIds, $nhomQuyen->tieuChuan_id);
            }
        }
        $tieuChis = $this->tieuChiModel->whereIn('tieuChuan_id', $tieuChuanIds)->get();
        $tieuChiIds = [];
        foreach ($tieuChis as $tieuChi) {
            array_push($tieuChiIds, $tieuChi->id);
        }
        $baoCaos = $this->baoCaoModel->with('tieuChi')->with('tieuChuan')->where('nganh_id', $nhomNguoiDung->nganh_id)->whereIn('tieuChi_id', $tieuChiIds)->get();
        return response()->json([
            'baoCaos' => $baoCaos
        ], 200);
    }
}
