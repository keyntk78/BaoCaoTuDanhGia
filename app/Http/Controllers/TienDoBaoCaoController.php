<?php

namespace App\Http\Controllers;

use App\Models\BaoCao;
use App\Models\BaoCaoSaoLuu;
use App\Models\DotDanhGia;
use App\Models\Nganh;
use App\Models\NguoiDungQuyen;
use App\Models\Nhom;
use App\Models\NhomNguoiDung;
use App\Models\NhomQuyen;
use App\Models\TieuChi;
use App\Models\TieuChuan;
use App\Models\User;
use App\Models\MinhChung;
use Illuminate\Http\Request;
use Carbon\Carbon;

class TienDoBaoCaoController extends Controller
{
    private $baoCaoModel;
    private $nganhModel;
    private $tieuChuanModel;
    private $tieuChiModel;
    private $baoCaoSLModel;
    private $nhomNguoiDungModel;
    private $nguoiDungQuyenModel;
    private $nhomQuyenModel;
    private $nhomModel;
    private $userModel;
    private $minhChungModel;
    public function __construct(User $userModel, BaoCao $baoCaoModel, Nganh $nganhModel, TieuChuan $tieuChuanModel, TieuChi $tieuChiModel, BaoCaoSaoLuu $baoCaoSLModel, NhomNguoiDung $nhomNguoiDungModel, NguoiDungQuyen $nguoiDungQuyenModel, NhomQuyen $nhomQuyenModel, Nhom $nhomModel, MinhChung $minhChungModel)
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
        $this->userModel = $userModel;
        $this->minhChungModel = $minhChungModel;
    }

    public function index()
    {
        $vaiTroHTs = auth()->user()->vaiTroHT;

        $nganhIds = [];
        foreach ($vaiTroHTs as $vaiTroHT) {
            foreach ($vaiTroHT->quyenHT as $quyenHT) {
                if (!empty($quyenHT->pivot->nganh_id)) {
                    $nganhIds[] = $quyenHT->pivot->nganh_id;
                }
            }
        }
        $nganhs = [];
        foreach ($nganhIds as $nganhId) {
            $nganh = DotDanhGia::orderBy('namHoc')
                        ->join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
                        ->join('nganhs', 'nganhs.id', '=', 'nganh_dot_danh_gias.nganh_id')
                        ->where('nganh_dot_danh_gias.nganh_id', $nganhId)->first();
            $nganhs[] = $nganh;
        }

        $tieuChuans = $this->tieuChuanModel->all();

        return view('pages.tiendobaocao.index', compact('nganhs', 'tieuChuans'));
    }

    public function wordAll($id) {
        $nganh = DotDanhGia::orderBy('namHoc')
                        ->join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
                        ->join('nganhs', 'nganhs.id', '=', 'nganh_dot_danh_gias.nganh_id')
                        ->where('nganh_dot_danh_gias.nganh_id', $id)->first();


        $tieuChuans = $this->tieuChuanModel->all();

        $needle = '<a class="is-minhchung" style="color: #000; font-weight: bold; text-decoration: none;"';

        $from = 'target="_blank" rel="nofollow noopener">';
        $to = '</a>';
        $hopMCs = array();
        foreach ($tieuChuans as $tieuChuan) {
            foreach ($tieuChuan->tieuChi as $key => $tieuChi) {
                $saveDatas = array();
                if ($key == 0) {
                    continue;
                }
                $baoCao = $tieuChi->baoCao->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->first();
                $html = $baoCao->moTa;
                $lastPos = 0;
                $key = 1;
                while (($lastPos = strpos($html, $needle, $lastPos))!== false) {
                    $textFrom = strpos($html, $from, $lastPos);
                    $textTo = strpos($html, $to, $lastPos);
                    $text = html_entity_decode(substr($html, $textFrom + strlen($from) + 1, $textTo - $textFrom - strlen($from) - 2));
                    $minhChung = $this->minhChungModel->where('ten', $text)->first();
                    $existMC = array_filter(
                        $hopMCs,
                        function ($e) use (&$text) {
                            return $e->text == $text;
                        }
                    );
                    if (!empty($existMC) && count($existMC) > 0) {
                        $found = array_pop($existMC);
                        $maHMC = $found->maHMC;
                    } else {
                        $maHMC = 'H'.$tieuChuan->stt.'.'.sprintf("%02d", $tieuChuan->stt).'.'.sprintf("%02d", $tieuChi->stt).'.'.sprintf("%02d", $key);
                        $key++;
                    }
                    $hopMCs[] = (object) [
                        'text' => $text,
                        'minhChung_id' => $minhChung->id,
                        'tieuChuan_id' => $tieuChuan->id,
                        'tieuChi_id' => $tieuChi->id,
                        'baoCao_id' => $baoCao->id,
                        'nganh_id' => $nganh->nganh_id,
                        'dotDanhGia_id' => $nganh->dotDanhGia_id,
                        'maHMC' => $maHMC
                    ];
                    $saveDatas[] = (object) [
                        'text' => $text,
                        'minhChung_id' => $minhChung->id,
                        'tieuChuan_id' => $tieuChuan->id,
                        'tieuChi_id' => $tieuChi->id,
                        'baoCao_id' => $baoCao->id,
                        'nganh_id' => $nganh->nganh_id,
                        'dotDanhGia_id' => $nganh->dotDanhGia_id,
                        'maHMC' => $maHMC
                    ];
                    $lastPos = $lastPos + strlen($needle);
                }
                $datas = array();
                foreach ($saveDatas as $saveData){
                    $dataItem = array(
                        'minhChung_id' => $saveData->minhChung_id,
                        'tieuChuan_id' => $saveData->tieuChuan_id,
                        'tieuChi_id' => $saveData->tieuChi_id,
                        'nganh_id' => $saveData->nganh_id,
                        'dotDanhGia_id' => $saveData->dotDanhGia_id,
                        'maHMC' => $saveData->maHMC
                    );
                    array_push($datas, $dataItem);
                }
                $baoCao->minhChung()->sync($datas);
            }
        }
        return view('pages.tiendobaocao.word-all', compact('nganh', 'tieuChuans', 'hopMCs'));
    }

    public function wordDSMC($id) {
        $nganh = DotDanhGia::orderBy('namHoc')
                        ->join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
                        ->join('nganhs', 'nganhs.id', '=', 'nganh_dot_danh_gias.nganh_id')
                        ->where('nganh_dot_danh_gias.nganh_id', $id)->first();
        $tieuChuans = $this->tieuChuanModel->all();
        $needle = '<a class="is-minhchung" style="color: #000; font-weight: bold; text-decoration: none;"';
        $from = 'target="_blank" rel="nofollow noopener">';
        $to = '</a>';
        $hopMCs = array();
        foreach ($tieuChuans as $tieuChuan) {
            foreach ($tieuChuan->tieuChi as $key => $tieuChi) {
                if ($key == 0) {
                    continue;
                }
                $baoCao = $tieuChi->baoCao->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->first();
                $html = $baoCao->moTa;
                $lastPos = 0;
                $key = 1;
                while (($lastPos = strpos($html, $needle, $lastPos))!== false) {
                    $textFrom = strpos($html, $from, $lastPos);
                    $textTo = strpos($html, $to, $lastPos);
                    $text = html_entity_decode(substr($html, $textFrom + strlen($from) + 1, $textTo - $textFrom - strlen($from) - 2));
                    $minhChung = $this->minhChungModel->where('ten', $text)->first();
                    $existMC = array_filter(
                        $hopMCs,
                        function ($e) use (&$text) {
                            return $e->text == $text;
                        }
                    );
                    if (!empty($existMC) && count($existMC) > 0) {
                        // Do nothing
                    } else {
                        $maHMC = 'H'.$tieuChuan->stt.'.'.sprintf("%02d", $tieuChuan->stt).'.'.sprintf("%02d", $tieuChi->stt).'.'.sprintf("%02d", $key);
                        $key++;
                        $hopMCs[] = (object) [
                            'text' => $text,
                            'minhChung_id' => $minhChung->id,
                            'tenMinhChung' => $minhChung->ten,
                            'ngayKS' => $minhChung->ngayKhaoSat,
                            'ngayBH' => $minhChung->ngayBanHanh,
                            'noiBH' => $minhChung->noiBanHanh,
                            'donVi' => $minhChung->donVi->ten,
                            'tieuChuan_id' => $tieuChuan->id,
                            'tieuChi_id' => $tieuChi->id,
                            'baoCao_id' => $baoCao->id,
                            'nganh_id' => $nganh->nganh_id,
                            'dotDanhGia_id' => $nganh->dotDanhGia_id,
                            'maHMC' => $maHMC
                        ];
                    }
                    $lastPos = $lastPos + strlen($needle);
                }
            }
        }
        return view('pages.tiendobaocao.word-dsmc', compact('nganh', 'tieuChuans', 'hopMCs'));
    }

    public function publish($id) {
        $nganh = DotDanhGia::orderBy('namHoc')
                        ->join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
                        ->join('nganhs', 'nganhs.id', '=', 'nganh_dot_danh_gias.nganh_id')
                        ->where('nganh_dot_danh_gias.nganh_id', $id)->first();
        $baoCaos = $this->baoCaoModel->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->get();
        if (!empty($baoCaos) && count($baoCaos) > 0) {
            foreach ($baoCaos as $baoCao) {
                $baoCao->update([
                    'congKhai' => 1
                ]);
            }
            return redirect()->route('tiendobaocao.index')->with('message', 'Công khai thành công!');
        }
        return redirect()->route('tiendobaocao.index')->with('message', 'Lỗi công khai! (Lý do: Cần có ít nhất 1 bản báo cáo)');
    }

    public function unpublish($id) {
        $nganh = DotDanhGia::orderBy('namHoc')
                        ->join('nganh_dot_danh_gias', 'nganh_dot_danh_gias.dotDanhGia_id', '=', 'dot_danh_gias.id')
                        ->join('nganhs', 'nganhs.id', '=', 'nganh_dot_danh_gias.nganh_id')
                        ->where('nganh_dot_danh_gias.nganh_id', $id)->first();
        $baoCaos = $this->baoCaoModel->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->get();
        foreach ($baoCaos as $baoCao) {
            $baoCao->update([
                'congKhai' => 0
            ]);
        }
        return redirect()->route('tiendobaocao.index')->with('message', 'Hủy công khai thành công!');
    }
}
