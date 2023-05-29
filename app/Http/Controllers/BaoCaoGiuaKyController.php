<?php

namespace App\Http\Controllers;

use App\Models\BaoCaoGk;
use App\Models\BaoCaoGkMinhChung;
use App\Models\BoTieuChuan;
use App\Models\DotDanhGiaGk;
use App\Models\MinhChung;
use App\Models\TieuChi;
use App\Models\TieuChuan;
use Carbon\Carbon;

use App\Models\DotDanhGia;
use App\Models\Nganh;

use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BaoCaoGiuaKyController extends Controller
{
    private $nganhModel;
    private $dotDanhGiaModel;
    private $tieuChuanModel;
    private $tieuChiModel;
    private $baoCaoGkModel;
    private $boTieuChuanModel;
    private $minhChungModel;
    private $baoCaoGkMinhChungModel;
    private $dotDanhGiaGKModel;

    public function __construct(Nganh $nganhModel, DotDanhGia $dotDanhGiaModel, DotDanhGiaGk $dotDanhGiaGKModel, TieuChuan $tieuChuanModel, TieuChi $tieuChiModel, BaoCaoGk $baoCaoGkModel, BoTieuChuan $boTieuChuanModel, MinhChung $minhChungModel, BaoCaoGkMinhChung $baoCaoGkMinhChungModel)
    {
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $this->nganhModel = $nganhModel;
        $this->dotDanhGiaModel = $dotDanhGiaModel;
        $this->dotDanhGiaGKModel = $dotDanhGiaGKModel;
        $this->tieuChuanModel = $tieuChuanModel;
        $this->tieuChiModel = $tieuChiModel;
        $this->baoCaoGkModel = $baoCaoGkModel;
        $this->boTieuChuanModel = $boTieuChuanModel;
        $this->minhChungModel = $minhChungModel;
        $this->baoCaoGkMinhChungModel = $baoCaoGkMinhChungModel;
    }

    protected function callValidate(Request $request, $id = null)
    {
        if ($id) {
            $request->validate(['dotDanhGiaGK_id' => 'required', 'nganh_id' => 'required', 'tieuChuan_id' => 'required', 'tieuChi_id' => 'required'], ['dotDanhGiaGK_id.required' => 'Bạn chưa chọn đợt đánh giá giữa kỳ', 'nganh_id.required' => 'Bạn chưa chọn ngành', 'tieuChuan_id.required' => 'Bạn chưa chọn tiêu chuẩn', 'tieuChi_id.required' => 'Bạn chưa chọn tiêu chí',]);
        } else {
            $request->validate(['dotDanhGiaGK_id' => 'required', 'nganh_id' => 'required', 'tieuChuan_id' => 'required', 'tieuChi_id' => 'required'], ['dotDanhGiaGK_id.required' => 'Bạn chưa chọn đợt đánh giá giữa kỳ', 'nganh_id.required' => 'Bạn chưa chọn ngành', 'tieuChuan_id.required' => 'Bạn chưa chọn tiêu chuẩn', 'tieuChi_id.required' => 'Bạn chưa chọn tiêu chí',]);
        }
    }

    public function index(Request $request)
    {

        $nganhs = $this->baoCaoGkModel->Join('dot_danh_gia_gks', 'bao_cao_gks.dotDanhGiaGK_id', '=', 'dot_danh_gia_gks.id')
            ->Join('nganhs', 'bao_cao_gks.nganh_id', '=', 'nganhs.id')->Join('tieu_chuans', 'bao_cao_gks.tieuChuan_id', '=', 'tieu_chuans.id')
            ->Select('nganhs.id', 'nganhs.ten', 'dot_danh_gia_gks.namHoc', 'dotDanhGiaGK_id', 'tieu_chuans.boTieuChuan_id')
            ->groupBy('nganhs.ten', 'dot_danh_gia_gks.namHoc', 'nganhs.id', 'dotDanhGiaGK_id', 'tieu_chuans.boTieuChuan_id')->get();
        $boTieuChuans = $this->boTieuChuanModel->all();
        $trashCount = count($this->baoCaoGkModel->onlyTrashed()->get());
        $baoCaoGkAll = $this->baoCaoGkModel->all();
        return view('pages.baocaogiuaky.index', compact('nganhs', 'boTieuChuans', 'baoCaoGkAll', 'trashCount'));
    }

    public function create()
    {
        $now = Carbon::now();
        $yearNow = Carbon::now()->format('Y');
        $dotDanhGiaGKs = $this->dotDanhGiaGKModel
            ->Join('dot_danh_gias', 'dot_danh_gia_gks.dotDanhGia_id', '=', 'dot_danh_gias.id')
            ->Join('giai_doans', 'dot_danh_gias.id', '=', 'giai_doans.dotDanhGia_id')
            ->where('giai_doans.ngayBD', '<', $now)
            ->where('giai_doans.ngayKT', '>', $now)
            ->where('dot_danh_gia_gks.namHoc', $yearNow)
            ->Select('dot_danh_gia_gks.id', 'dot_danh_gia_gks.tenDotDanhGia')
            ->groupBy('dot_danh_gia_gks.id', 'dot_danh_gia_gks.tenDotDanhGia')
            ->get();

        return view('pages.baocaogiuaky.create', compact('dotDanhGiaGKs'));
    }

    public function store(Request $request)
    {
        $this->callValidate($request);

        try {
            DB::beginTransaction();
            $this->baoCaoGkModel->create(['nganh_id' => $request->nganh_id, 'tieuChuan_id' => $request->tieuChuan_id, 'tieuChi_id' => $request->tieuChi_id, 'dotDanhGiaGK_id' => $request->dotDanhGiaGK_id, 'tdg' => $request->tdg, 'dgn' => $request->dgn, 'tuXacDinhKQ' => $request->tuXacDinhKQ, 'kqKĐCLGD' => $request->kqKĐCLGD, 'ndctTheoKN' => $request->ndctTheoKN, 'neuVanTat' => $request->neuVanTat, 'ndct' => $request->ndct, 'congKhai' => 0, 'trangThai' => 0, 'hoatDongDaCaiTien' => $request->hoatDongDaCaiTien, 'donVi' => $request->donVi, 'thoiGianThucHien' => $request->thoiGianThucHien, 'ghiChu' => $request->ghiChu,]);
            DB::commit();
            return redirect()->route('baocaogiuaky.index')->with('message', 'Thêm thành công!');
        } catch (Exception $e) {
            DB::rollBack();
            Log::error('Message: ' . $e->getMessage() . ' --- Line : ' . $e->getLine());
        }

        return redirect()->route('baocaogiuaky.create');
    }

    public function show($id)
    {
        $baoCaoGk = $this->baoCaoGkModel->find($id);
        return view('pages.baocaogiuaky.show', compact('baoCaoGk'));
    }

    public function edit($id)
    {
        $baoCaoGk = $this->baoCaoGkModel->find($id);
        $yearNow = Carbon::now()->format('Y');
        $dotDanhGiaGKs = $this->dotDanhGiaGKModel->where('namHoc', $yearNow)->get();
        $nganh_curent = $this->nganhModel->where('id', $baoCaoGk->nganh_id)->first();
        $tieuChuan_curent = $this->tieuChuanModel->where('id', $baoCaoGk->tieuChuan_id)->first();
        $tieuChi_curent = $this->tieuChiModel->where('id', $baoCaoGk->tieuChi_id)->first();

        return view('pages.baocaogiuaky.edit', compact('baoCaoGk', 'dotDanhGiaGKs', 'nganh_curent', 'tieuChuan_curent', 'tieuChi_curent'));
    }

    public function update(Request $request, $id)
    {
        $baoCaoGk = $this->baoCaoGkModel->find($id);
        $baoCaoGk->update(['tdg' => $request->tdg, 'dgn' => $request->dgn, 'tuXacDinhKQ' => $request->tuXacDinhKQ, 'kqKĐCLGD' => $request->kqKĐCLGD, 'ndctTheoKN' => $request->ndctTheoKN, 'ndct' => $request->ndct, 'neuVanTat' => $request->neuVanTat, 'hoatDongDaCaiTien' => $request->hoatDongDaCaiTien, 'donVi' => $request->donVi, 'thoiGianThucHien' => $request->thoiGianThucHien, 'ghiChu' => $request->ghiChu,]);
        return redirect()->route('baocaogiuaky.show', ['id' => $id])->with('message', 'Sửa thành công!');
    }

    public function destroy(Request $request, $id)
    {
        try {
            $this->baoCaoGkModel->find($id)->delete();
            return response()->json(['err' => 0, 'message' => 'success',], 200);
        } catch (Exception $e) {
            return response()->json(['err' => -1, 'message' => 'fail',], 500);
        }
    }

    public function trash()
    {
        $baoCaoGKs = $this->baoCaoGkModel->onlyTrashed()->Join('nganhs', 'nganhs.id', 'bao_cao_gks.nganh_id')->Join('tieu_chis', 'tieu_chis.id', '=', 'bao_cao_gks.tieuChi_id')->Join('tieu_chuans', 'tieu_chuans.id', '=', 'bao_cao_gks.tieuChuan_id')->Join('dot_danh_gia_gks', 'dot_danh_gia_gks.id', '=', 'bao_cao_gks.dotDanhGiaGk_id')->Select('bao_cao_gks.id', 'tieu_chis.stt as sttTieuChi', 'tieu_chuans.stt as sttTieuChuan', 'nganhs.ten as tenNganh', 'dot_danh_gia_gks.namHoc')->paginate(10);
        return view('pages.baocaogiuaky.trash', compact('baoCaoGKs'));
    }

    public function restore(Request $request, $id)
    {
        try {

            $baoCaoGk = $this->baoCaoGkModel->onlyTrashed()->find($id);
            $check = $this->baoCaoGkModel->where('nganh_id', $baoCaoGk->nganh_id)->where('tieuChi_id', $baoCaoGk->tieuChi_id)->where('tieuChuan_id', $baoCaoGk->tieuChuan_id)->where('dotDanhGiaGK_id', $baoCaoGk->dotDanhGiaGK_id)->where('id', '!=', $id)->count();

            if ($check === 0) {
                $this->baoCaoGkModel->onlyTrashed()->find($id)->restore();
                return response()->json(['err' => 0, 'message' => 'success',], 200);
            } else {
                return response()->json(['err' => 1, 'message' => 'Báo cáo đã tồn tại không thể phục hồi',], 200);
            }

        } catch (Exception $e) {
            return response()->json(['err' => -1, 'message' => 'fail',], 500);
        }
    }

    public function restoreAll(Request $request)
    {
        try {
            $count = 0;
            $baoCaoGks = $this->baoCaoGkModel->get();
            $baoCaoGkRacs = $this->baoCaoGkModel->onlyTrashed()->get();

            foreach ($baoCaoGkRacs as $baoCaoGkRac) {
                foreach ($baoCaoGkRacs as $item) {
                    if ($item->nganh_id === $baoCaoGkRac->nganh_id && $item->tieuChi_id === $baoCaoGkRac->tieuChi_id && $item->tieuChuan_id === $baoCaoGkRac->tieuChuan_id && $item->dotDanhGiaGK_id === $baoCaoGkRac->dotDanhGiaGK_id && $item->id !== $baoCaoGkRac->id) {
                        $count++;
                    }
                }
            }

            if (count($baoCaoGks) >= count($baoCaoGkRacs)) {
                foreach ($baoCaoGks as $baoCaoGk) {
                    foreach ($baoCaoGkRacs as $baoCaoGkRac) {
                        if ($baoCaoGk->nganh_id === $baoCaoGkRac->nganh_id && $baoCaoGk->tieuChi_id === $baoCaoGkRac->tieuChi_id && $baoCaoGk->tieuChuan_id === $baoCaoGkRac->tieuChuan_id && $baoCaoGk->dotDanhGiaGK_id === $baoCaoGkRac->dotDanhGiaGK_id && $baoCaoGk->id !== $baoCaoGkRac->id) {
                            $count++;
                        }
                    }
                }
            } else {
                foreach ($baoCaoGkRacs as $baoCaoGkRac) {
                    foreach ($baoCaoGks as $baoCaoGk) {
                        if ($baoCaoGk->nganh_id === $baoCaoGkRac->nganh_id && $baoCaoGk->tieuChi_id === $baoCaoGkRac->tieuChi_id && $baoCaoGk->tieuChuan_id === $baoCaoGkRac->tieuChuan_id && $baoCaoGk->dotDanhGiaGK_id === $baoCaoGkRac->dotDanhGiaGK_id && $baoCaoGk->id !== $baoCaoGkRac->id) {
                            $count++;
                        }
                    }
                }
            }

            if ($count === 0) {
                $this->baoCaoGkModel->onlyTrashed()->restore();
                return response()->json(['err' => 0, 'message' => 'success',], 200);
            } else {
                return response()->json(['err' => 1, 'message' => 'Báo cáo đã tồn tại không thể phục hồi',], 200);
            }

        } catch (Exception $e) {
            return response()->json(['err' => -1, 'message' => 'fail',], 500);
        }
    }

    public function forceDestroy(Request $request, $id)
    {
        try {
            $this->baoCaoGkModel->onlyTrashed()->find($id)->forceDelete();
            return response()->json(['code' => 200, 'message' => 'success',], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'fail',], 500);
        }
    }

    public function forceDestroyAll(Request $request)
    {
        try {
            $this->baoCaoGkModel->onlyTrashed()->forceDelete();
            return response()->json(['code' => 200, 'message' => 'success',], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'fail',], 500);
        }
    }

    public function finish(Request $request, $id)
    {
        try {
            $this->baoCaoGkModel->find($id)->update(['trangThai' => 1]);
            return response()->json(['code' => 200, 'message' => 'success',], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'fail',], 500);
        }
    }

    public function reopen(Request $request, $id)
    {
        try {
            $this->baoCaoGkModel->find($id)->update(['trangThai' => 0]);
            return response()->json(['code' => 200, 'message' => 'success',], 200);
        } catch (Exception $e) {
            return response()->json(['code' => 500, 'message' => 'fail',], 500);
        }
    }

    public function publish($nganh_id, $dotDanhGiaGK_id)
    {
        $baoCaoGKs = $this->baoCaoGkModel->where('nganh_id', $nganh_id)->where('dotDanhGiaGK_id', $dotDanhGiaGK_id)->where('trangThai', 1)->get();

        $needle = '<a class="is-minhchung" style="color: #000; font-weight: bold; text-decoration: none;"';
        $from = 'target="_blank" rel="nofollow noopener">';
        $to = '</a>';
        $hopMCs = array();

        $check = $this->baoCaoGkModel->where('nganh_id', $nganh_id)->where('dotDanhGiaGK_id', $dotDanhGiaGK_id)->where('congKhai', 1)->count();

        if ($check === 0) {
            if (!empty($baoCaoGKs) && count($baoCaoGKs) > 0) {
                foreach ($baoCaoGKs as $baoCao) {
                    $baoCao->update(['congKhai' => 1]);
                    $html = $baoCao->hoatDongDaCaiTien;
                    $lastPos = 0;
                    $key = 1;
                    while (($lastPos = strpos($html, $needle, $lastPos)) !== false) {
                        $textFrom = strpos($html, $from, $lastPos);
                        $textTo = strpos($html, $to, $lastPos);
                        $text = html_entity_decode(substr($html, $textFrom + strlen($from) + 1, $textTo - $textFrom - strlen($from) - 2));
                        $minhChung = $this->minhChungModel->where('ten', $text)->first();
                        $existMC = array_filter($hopMCs, function ($e) use (&$text) {
                            return $e->text == $text;
                        });
                        if (!empty($existMC) && count($existMC) > 0) {
                            break;
                        } else {
                            $maHMC = $baoCao->tieuChuan->stt . '.' . $baoCao->tieuChi->stt . '.' . $key;
                            $key++;
                        }
                        $hopMCs[] = (object)['text' => $text, 'minhChung_id' => $minhChung->id, 'tieuChuan_id' => $baoCao->tieuChuan_id, 'tieuChi_id' => $baoCao->tieuChi_id, 'baoCaoGk_id' => $baoCao->id, 'nganh_id' => $baoCao->nganh_id, 'dotDanhGiaGk_id' => $baoCao->dotDanhGiaGK_id, 'maMC' => $maHMC];
                        $saveDatas[] = (object)['text' => $text, 'minhChung_id' => $minhChung->id, 'tieuChuan_id' => $baoCao->tieuChuan_id, 'tieuChi_id' => $baoCao->tieuChi_id, 'baoCaoGk_id' => $baoCao->id, 'nganh_id' => $baoCao->nganh_id, 'dotDanhGiaGk_id' => $baoCao->dotDanhGiaGK_id, 'maMC' => $maHMC];
                        $lastPos = $lastPos + strlen($needle);
                    }
                    $datas = array();
                    foreach ($saveDatas as $saveData) {
                        $dataItem = array('baoCaoGk_id' => $saveData->baoCaoGk_id, 'minhChung_id' => $saveData->minhChung_id, 'tieuChuan_id' => $saveData->tieuChuan_id, 'tieuChi_id' => $saveData->tieuChi_id, 'nganh_id' => $saveData->nganh_id, 'dotDanhGiaGk_id' => $saveData->dotDanhGiaGk_id, 'maMC' => $saveData->maMC);
                        array_push($datas, $dataItem);
                    }
                }

                foreach ($datas as $item) {
                    $this->baoCaoGkMinhChungModel->create(['baoCaoGk_id' => $item['baoCaoGk_id'], 'minhChung_id' => $item['minhChung_id'], 'tieuChuan_id' => $item['tieuChuan_id'], 'tieuChi_id' => $item['tieuChi_id'], 'nganh_id' => $item['nganh_id'], 'dotDanhGiaGk_id' => $item['dotDanhGiaGk_id'], 'maMC' => $item['maMC'],]);
                }

                return redirect()->route('baocaogiuaky.index')->with('message', 'Công khai thành công!');
            }
            return redirect()->route('baocaogiuaky.index')->with('message', 'Lỗi công khai! (Lý do: Cần có ít nhất 1 bản báo cáo giữa kỳ hoàn thành)');
        }
        return redirect()->route('baocaogiuaky.index')->with('message', 'Lỗi công khai! (Lý do: Bạn đã công khai trước đó)');

    }

    public function unpublish($nganh_id, $dotDanhGiaGK_id)
    {
        $baoCaoGKs = $this->baoCaoGkModel->where('nganh_id', $nganh_id)->where('dotDanhGiaGK_id', $dotDanhGiaGK_id)->where('congKhai', 1)->get();

        $baoCaoGkMinhChungs = $this->baoCaoGkMinhChungModel->where('nganh_id', $nganh_id)->where('dotDanhGiaGK_id', $dotDanhGiaGK_id)->get();
        foreach ($baoCaoGKs as $baoCao) {
            $baoCao->update(['congKhai' => 0]);
        }
        foreach ($baoCaoGkMinhChungs as $baoCao) {
            $baoCao->find($baoCao->id)->forceDelete();
        }
        return redirect()->route('baocaogiuaky.index')->with('message', 'Hủy công khai thành công!');
    }

    public  function  createPermission() {
        $now = Carbon::now();
        $yearNow = Carbon::now()->format('Y');
        $dotDanhGiaGKs = $this->dotDanhGiaGKModel
            ->Join('dot_danh_gias', 'dot_danh_gia_gks.dotDanhGia_id', '=', 'dot_danh_gias.id')
            ->Join('giai_doans', 'dot_danh_gias.id', '=', 'giai_doans.dotDanhGia_id')
            ->where('giai_doans.ngayBD', '<', $now)
            ->where('giai_doans.ngayKT', '>', $now)
            ->where('dot_danh_gia_gks.namHoc', $yearNow)
            ->Select('dot_danh_gia_gks.id', 'dot_danh_gia_gks.tenDotDanhGia')
            ->groupBy('dot_danh_gia_gks.id', 'dot_danh_gia_gks.tenDotDanhGia')
            ->get();
        return view('pages.baocaogiuaky.createPermission', compact('dotDanhGiaGKs'));
    }

    public function handleSelectNganh($id)
    {
        try {
            $nganhs = $this->dotDanhGiaGKModel->Join('dot_danh_gias', 'dot_danh_gia_gks.dotDanhGia_id', '=', 'dot_danh_gias.id')->Join('nganh_dot_danh_gias', 'dot_danh_gias.id', '=', 'nganh_dot_danh_gias.dotDanhGia_id')->Join('nganhs', 'nganh_dot_danh_gias.nganh_id', '=', 'nganhs.id')->where('dot_danh_gia_gks.id', $id)->Select('nganhs.ten as tenNganh', 'nganhs.id as nganh_id')->get();
            return response()->json(['err' => 0, 'message' => 'Ok', 'data' => $nganhs], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['err' => -1, 'message' => $e->getMessage(),], 500);
        }
    }

    public function handleSelectTieuChuan($dotDanhGiaGK_id)
    {
        try {
            $boTieuChuan = $this->dotDanhGiaGKModel->Join('dot_danh_gias', 'dot_danh_gia_gks.dotDanhGia_id', '=', 'dot_danh_gias.id')->Join('bao_caos', 'bao_caos.dotDanhGia_id', '=', 'dot_danh_gias.id')->Join('tieu_chuans', 'bao_caos.tieuChuan_id', '=', 'tieu_chuans.id')->where('dot_danh_gia_gks.id', $dotDanhGiaGK_id)->Select('tieu_chuans.boTieuChuan_id')->groupBy('tieu_chuans.boTieuChuan_id')->get();
            $boTieuChuan_id = $boTieuChuan[0]['boTieuChuan_id'];

            $tieuChuans = $this->tieuChuanModel->where('boTieuChuan_id', $boTieuChuan_id)->get();
            return response()->json(['err' => 0, 'message' => 'Ok', 'data' => $tieuChuans], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['err' => -1, 'message' => $e->getMessage(),], 500);
        }
    }

    public function handleSelectTieuChi($dotDanhGiaGK_id, $nganh_id,$tieuChuan_id)
    {
        try {
            $finalTieuChi = [];
            $baoCaoGk = $this->baoCaoGkModel
                ->where('tieuChuan_id', $tieuChuan_id)
                ->where('nganh_id', $nganh_id)
                ->where('dotDanhGiaGK_id', $dotDanhGiaGK_id)
                ->select('tieuChi_id')->get();
            $tieuChis = $this->tieuChiModel
                ->Join('tieu_chuans', 'tieu_chis.tieuChuan_id', '=', 'tieu_chuans.id')
                ->where('tieu_chuans.id', $tieuChuan_id)
                ->Select('tieu_chis.id as id', 'tieu_chis.ten as ten', 'tieu_chis.stt as stt', 'tieu_chuans.stt as sttTieuChuan')->get();
             foreach ($tieuChis as $value) {
                $string = 'Tổng kết tiêu chuẩn' . ' ' . $value['sttTieuChuan'];
                $check = strcmp($value['ten'], $string,);
                if ($check !== 0) {
                    if ($baoCaoGk->isEmpty()) {
                        array_push($finalTieuChi, $value);
                    } else {
                        for ($i = 0; $i < count($baoCaoGk); $i++) {
                            if ($baoCaoGk[$i]['tieuChi_id'] === $value['id']) {
                                break;
                            } else {
                                if ($i === (count($baoCaoGk) - 1)) {
                                    array_push($finalTieuChi, $value);
                                    break;
                                } else {
                                    continue;
                                }
                            }
                        }
                    }
                }
            }
            return response()->json(['err' => 0, 'message' => 'Ok', 'data' => $finalTieuChi], 200);
        } catch (ModelNotFoundException $e) {
            return response()->json(['err' => -1, 'message' => $e->getMessage(),], 500);
        }
    }

    public  function wordGk($nganh_id, $dotDanhGiaGK_id) {
        $botieuChuan = $this->baoCaoGkModel->Join('dot_danh_gia_gks', 'bao_cao_gks.dotDanhGiaGK_id', '=', 'dot_danh_gia_gks.id')
            ->Join('nganhs', 'bao_cao_gks.nganh_id', '=', 'nganhs.id')->Join('tieu_chuans', 'bao_cao_gks.tieuChuan_id', '=', 'tieu_chuans.id')
            ->where('nganh_id', $nganh_id)
            ->where('dotDanhGiaGK_id', $dotDanhGiaGK_id)
            ->Select('tieu_chuans.boTieuChuan_id')
            ->groupBy('nganhs.ten', 'dot_danh_gia_gks.namHoc', 'nganhs.id', 'dotDanhGiaGK_id', 'tieu_chuans.boTieuChuan_id')->first();

        $baoCaoGiuaKy = $this->baoCaoGkModel->where('nganh_id', $nganh_id)
            ->where('dotDanhGiaGK_id', $dotDanhGiaGK_id)->get();

        $tieuChuans = $this->tieuChuanModel->where('boTieuChuan_id', $botieuChuan->boTieuChuan_id)->get();
        $nganh = $this->nganhModel->where('id', $nganh_id)->first();
        $dotDanhGiaGk = $this->dotDanhGiaGKModel->where('id', $dotDanhGiaGK_id)->first();
        return view('pages.baocaogiuaky.word-gk', compact('dotDanhGiaGk', 'nganh', 'tieuChuans', 'baoCaoGiuaKy'));
    }

    public  function wordPhucLuc($nganh_id, $dotDanhGiaGK_id) {

        $tieuChuans = $this->tieuChuanModel
            ->Join('bao_cao_gks', 'bao_cao_gks.tieuChuan_id', '=', 'tieu_chuans.id')
            ->where('bao_cao_gks.nganh_id', $nganh_id)
            ->where('bao_cao_gks.dotDanhGiaGK_id', $dotDanhGiaGK_id)
            ->Select('tieu_chuans.id', 'tieu_chuans.ten', 'tieu_chuans.stt')
            ->GroupBy('tieu_chuans.id', 'tieu_chuans.ten', 'tieu_chuans.stt')
            ->get();


        $baoCaos = $this->baoCaoGkModel
            ->where('nganh_id', $nganh_id)
            ->where('dotDanhGiaGK_id', $dotDanhGiaGK_id)
            ->get();

        $minhChungs = $this->baoCaoGkMinhChungModel
            ->Join('minh_chungs', 'bao_cao_gk_minh_chungs.minhChung_id', '=', 'minh_chungs.id')
            ->where('nganh_id', $nganh_id)
            ->where('dotDanhGiaGK_id', $dotDanhGiaGK_id)
            ->Select('bao_cao_gk_minh_chungs.id','bao_cao_gk_minh_chungs.maMC','bao_cao_gk_minh_chungs.tieuChi_id', 'minh_chungs.link','minh_chungs.isUrl',
                'minh_chungs.id as minhChung_id', 'minh_chungs.ten')
            ->get();

        return view('pages.baocaogiuaky.word-phucluc', compact('tieuChuans', 'baoCaos', 'minhChungs'));
    }
}
