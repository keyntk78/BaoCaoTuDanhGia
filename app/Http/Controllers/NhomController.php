<?php

namespace App\Http\Controllers;

use App\Models\Nganh;
use App\Models\NguoiDungQuyen;
use App\Models\Nhom;
use App\Models\NhomNguoiDung;
use App\Models\NhomQuyen;
use App\Models\QuyenNhom;
use App\Models\TieuChuan;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use App\Services\HandleUpdateThreeMany;
class NhomController extends Controller
{
    private $nhomModel;
    private $nganhModel;
    private $quyenNhomModel;
    private $tieuChuanModel;
    private $nhomQuyenModel;
    private $userModel;
    private $nhomNguoiDungModel;
    private $nguoiDungQuyenModel;
    public function __construct(Nhom $nhomModel, Nganh $nganhModel, QuyenNhom $quyenNhomModel, TieuChuan $tieuChuanModel, NhomQuyen $nhomQuyenModel, User $userModel, NhomNguoiDung $nhomNguoiDungModel, NguoiDungQuyen $nguoiDungQuyenModel)
    {
        $this->nhomModel = $nhomModel;
        $this->nganhModel = $nganhModel;
        $this->quyenNhomModel = $quyenNhomModel;
        $this->tieuChuanModel = $tieuChuanModel;
        $this->nhomQuyenModel = $nhomQuyenModel;
        $this->userModel = $userModel;
        $this->nhomNguoiDungModel = $nhomNguoiDungModel;
        $this->nguoiDungQuyenModel = $nguoiDungQuyenModel;
    }

    protected function callValidate(Request $request, $id = null)
    {
        $request->validate([
            'ten' => 'required',
            'nganh_id' => 'numeric|min:1'
        ], [
            'ten.required' => 'Bạn chưa nhập tên nhóm',
            'nganh_id.min' => 'Bạn chưa chọn ngành',
            'nganh_id.numeric' => 'Bạn chưa chọn ngành',
        ]);
    }

    public function index(Request $request)
    {
        $filterTen = $request->query('ten');
        $filterNganhId = $request->query('nganh_id');
        $nhoms = $this->nhomModel->sortable('id');
        if (!empty($filterTen)) {
            $nhoms->where('nhoms.ten', 'like', '%'.$filterTen.'%');
        }
        if (!empty($filterNganhId)) {
            $nhoms->where('nhoms.nganh_id', $filterNganhId);
        }
        $nhoms = $nhoms->paginate(10);
        $nganhs = $this->nganhModel->all();
        $trashCount = count($this->nhomModel->onlyTrashed()->get());
        return view('pages.nhom.index', compact('nhoms', 'trashCount', 'nganhs', 'filterTen', 'filterNganhId'));
    }

    public function create()
    {
        $dateNow = Carbon::now();


        $quyenNhoms = $this->quyenNhomModel->all();

        $nganhs = $this->nganhModel
            ->join('nganh_dot_danh_gias','nganh_dot_danh_gias.nganh_id', '=', 'nganhs.id' )
            ->join('dot_danh_gias','dot_danh_gias.id', '=', 'nganh_dot_danh_gias.dotDanhGia_id' )
            ->where('dot_danh_gias.namHoc', '=', $dateNow->year)
            ->where('dot_danh_gias.trangThai', '=', 0)
            ->select('nganhs.id as nganh_id', 'nganhs.ten as ten_nganh')
            ->groupby('nganhs.id')
            ->get();

        $tieuChuans = $this->tieuChuanModel->all();
        $thanhViens = $this->userModel->all();
        return view('pages.nhom.create', compact('quyenNhoms', 'nganhs', 'tieuChuans', 'thanhViens'));
    }

    public function store(Request $request)
    {
        $this->callValidate($request);
        try {
            DB::beginTransaction();
            $nhom = $this->nhomModel->create([
                'ten' => $request->ten,
                'nganh_id' => $request->nganh_id
            ]);

            if (!empty($request->quyenNhom_id) && !empty($request->tieuChuan_id)) {
                foreach ($request->quyenNhom_id as $key => $item) {
                    $nhom->nhomQuyen()->attach($item, [
                        'tieuChuan_id' => $request->tieuChuan_id[$key]
                    ]);
                }
            }
            if (!empty($request->thanhVien)) {
                foreach ($request->thanhVien as $item) {
                    $this->nhomNguoiDungModel->create([
                        'nhom_id' => $nhom->id,
                        'nguoiDung_id' => $item,
                        'nganh_id' => $request->nganh_id
                    ]);
                }
            }
            DB::commit();
            return redirect()->route('nhom.index')->with('message', 'Thêm thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    public function show($id)
    {
        $nhom = $this->nhomModel->find($id);
        $tieuChuans = $this->tieuChuanModel->all();
        return view('pages.nhom.show', compact('nhom', 'tieuChuans'));
    }

    public function edit($id)
    {
        $nhom = $this->nhomModel->find($id);
        $quyenNhoms = $this->quyenNhomModel->all();
        $nganhs = $this->nganhModel->all();
        $tieuChuans = $this->tieuChuanModel->all();
        $current_quyenNhoms = [];
        $current_tieuChuans = [];
        $nhomQuyens = $this->nhomQuyenModel->where('nhom_id', $id)->get();
        foreach ($nhomQuyens as $item) {
            array_push($current_quyenNhoms, $item->quyenNhom_id);
            array_push($current_tieuChuans, $item->tieuChuan_id);
        }
        $thanhViens = $this->userModel->all();
        $thanhVienNhoms = $this->nhomNguoiDungModel->where('nhom_id', $id)->get();
        $current_thanhViens = [];
        foreach ($thanhVienNhoms as $item) {
            array_push($current_thanhViens, $item->nguoiDung_id);
        }
        return view('pages.nhom.edit', compact('nhom', 'quyenNhoms', 'nganhs', 'tieuChuans', 'current_quyenNhoms', 'current_tieuChuans', 'thanhViens', 'current_thanhViens'));
    }

    public function update(Request $request, $id)
    {
        $this->callValidate($request);
        try {
            DB::beginTransaction();
            $nhom = $this->nhomModel->find($id);
            $nhom->update([
                'ten' => $request->ten,
            ]);

            $nhomQuyens = $this->nhomQuyenModel->where('nhom_id', $nhom->id)->get();
            if (!empty($request->quyenNhom_id) && !empty($request->tieuChuan_id)) {
                $quyenTieuChuans = [];
                foreach ($request->quyenNhom_id as $key => $item) {
                    $obj = (object) [
                        'quyenNhom_id' => $item,
                        'tieuChuan_id' => $request->tieuChuan_id[$key],
                    ];
                    array_push($quyenTieuChuans, $obj);
                }
                HandleUpdateThreeMany::handleUpdateNhomQuyen($nhomQuyens, $quyenTieuChuans, $this->nhomQuyenModel, $nhom->id);
            } else {
                foreach ($nhomQuyens as $nhomQuyen) {
                    $nhomQuyen->forceDelete();
                }
            }
            if (!empty($request->thanhVien)) {
                $thanhVienNhomsStayed = $this->nhomNguoiDungModel->whereIn('nguoiDung_id', $request->thanhVien)->where('nhom_id', $id)->get();
                $thanhVienNhomsStayedLeft = $this->nhomNguoiDungModel->whereNotIn('nguoiDung_id', $request->thanhVien)->where('nhom_id', $id)->get();
                foreach ($thanhVienNhomsStayedLeft as $item) {
                    $this->nguoiDungQuyenModel->where('nhomNguoiDung_id', $item->id)->forceDelete();
                }
                $this->nhomNguoiDungModel->whereNotIn('nguoiDung_id', $request->thanhVien)->where('nhom_id', $id)->forceDelete();
                $stayedIds = [];
                foreach ($thanhVienNhomsStayed as $item) {
                    array_push($stayedIds, $item->nguoiDung_id);
                }
                foreach ($request->thanhVien as $item) {
                    if (!in_array($item, $stayedIds)) {
                        $this->nhomNguoiDungModel->create([
                            'nhom_id' => $id,
                            'nguoiDung_id' => $item,
                            'nganh_id' => $nhom->nganh_id
                        ]);
                    }
                }
            }
            DB::commit();
            return redirect()->route('nhom.show', ['id' => $id])->with('message', 'Sửa thành công!');
        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }
    }

    public function destroy(Request $request)
    {
        try {
            $this->nhomModel->find($request->id)->delete();
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
        $nhoms = $this->nhomModel->onlyTrashed()->paginate(10);
        return view('pages.nhom.trash', compact('nhoms'));
    }

    public function restore(Request $request)
    {
        try {
            $this->nhomModel->onlyTrashed()->find($request->id)->restore();
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
            $this->nhomModel->onlyTrashed()->restore();
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

    public function forceDestroy(Request $request)
    {
        try {
            $this->nhomQuyenModel->where('nhom_id', $request->id)->forceDelete();
            $this->nhomModel->onlyTrashed()->find($request->id)->forceDelete();
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
            $nhoms = $this->nhomModel->onlyTrashed()->get();
            foreach ($nhoms as $nhom) {
                $this->nhomQuyenModel->where('nhom_id', $nhom->id)->forceDelete();
            }
            $this->nhomModel->onlyTrashed()->forceDelete();
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

    public function handleSelect(Request $request) {
        if (!empty($request->quyenId)) {
            $nhoms = $this->nhomModel->where('nganh_id', $request->nganhId)->get();
            $quyenId = $request->quyenId;
            $tieuChuanIds = [];
            $curentNhomId = $request->nhomId;
            foreach ($nhoms as $nhom) {
                if ($nhom->id != $curentNhomId) {
                    $nhomQuyens = $this->nhomQuyenModel->where('nhom_id', $nhom->id)->where('quyenNhom_id', $quyenId)->get();
                    foreach ($nhomQuyens as $nhomQuyen) {
                        array_push($tieuChuanIds, $nhomQuyen->tieuChuan_id);
                    }
                }
            }
            $tieuChuans = $this->tieuChuanModel->all();
            return response()->json([
                'tieuChuanIds' => $tieuChuanIds,
                'tieuChuans' => $tieuChuans
            ], 200);
        } elseif (!empty($request->tieuChuanId)) {
            $nhoms = $this->nhomModel->where('nganh_id', $request->nganhId)->get();
            $tieuChuanId = $request->tieuChuanId;
            $quyenIds = [];
            $curentNhomId = $request->nhomId;
            foreach ($nhoms as $nhom) {
                if ($nhom->id != $curentNhomId) {
                    $nhomQuyens = $this->nhomQuyenModel->where('nhom_id', $nhom->id)->where('tieuChuan_id', $tieuChuanId)->get();
                    foreach ($nhomQuyens as $nhomQuyen) {
                        array_push($quyenIds, $nhomQuyen->quyenNhom_id);
                    }
                }
            }
            $quyenNhoms = $this->quyenNhomModel->all();
            return response()->json([
                'quyenIds' => $quyenIds,
                'quyenNhoms' => $quyenNhoms
            ], 200);
        } else {
            $quyenNhoms = $this->quyenNhomModel->all();
            $tieuChuans = $this->tieuChuanModel->all();
            return response()->json([
                'tieuChuans' => $tieuChuans,
                'quyenNhoms' => $quyenNhoms
            ], 200);
        }
    }
}
