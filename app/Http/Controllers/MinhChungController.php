<?php

namespace App\Http\Controllers;

use App\Models\LoaiMinhChung;
use App\Models\MinhChung;
use App\Models\DonVi;
use Illuminate\Http\Request;
use App\Services\HandleUploadFile;
use Illuminate\Support\Facades\Storage;


class MinhChungController extends Controller
{
    private $minhChungModel;
    private $loaiMinhChungModel;
    private $donViModel;
    public function __construct(MinhChung $minhChungModel, DonVi $donViModel, LoaiMinhChung $loaiMinhChungModel)
    {
        $this->minhChungModel = $minhChungModel;
        $this->donViModel = $donViModel;
        $this->loaiMinhChungModel = $loaiMinhChungModel;
    }

    // validate
    protected function callValidate(Request $request, $id = null)
    {
        if ($request->isMCGop == 'on' || $id) {
            $request->validate([
                'ten' => 'required|unique:minh_chungs' . ',ten,' . $id,
                'donVi_id' => 'numeric|min:1',
            ], [
                'ten.required' => 'Bạn chưa nhập tên minh chứng',
                'ten.unique' => 'Tên minh chứng đã tồn tại',
                'donVi_id.min' => 'Bạn chưa chọn đơn vị',
                'donVi_id.numeric' => 'Bạn chưa chọn đơn vị',
            ]);
        } else {
            $request->validate([
                'ten' => 'required|unique:minh_chungs',
                'donVi_id' => 'numeric|min:1',
            ], [
                'ten.required' => 'Bạn chưa nhập tên minh chứng',
                'ten.unique' => 'Tên minh chứng đã tồn tại',
                'donVi_id.min' => 'Bạn chưa chọn đơn vị',
                'donVi_id.numeric' => 'Bạn chưa chọn đơn vị',
            ]);
        }
    }

    public function index(Request $request)
    {
        $filterTen = $request->query('ten');
        $filterNoiBanHanh = $request->query('noiBanHanh');
        $filterDonViId = $request->query('donVi_id');
        $filterIsMCGop = $request->query('isMCGop');

        $minhChungs = $this->minhChungModel->sortable('ten');
        $donVis = $this->donViModel->all();

        if (!empty($filterTen)) {
            $minhChungs->where('minh_chungs.ten', 'like', '%'.$filterTen.'%');
        }
        if (!empty($filterNoiBanHanh)) {
            $minhChungs->where('minh_chungs.noiBanHanh', 'like', '%'.$filterNoiBanHanh.'%');
        }
        if (!empty($filterDonViId)) {
            $minhChungs->where('minh_chungs.donVi_id', $filterDonViId);
        }
        if ($filterIsMCGop != '') {
            $minhChungs->where('minh_chungs.isMCGop', $filterIsMCGop);
        }
        $minhChungs = $minhChungs->paginate(10);
        $trashCount = count($this->minhChungModel->onlyTrashed()->get());
        return view('pages.minhchung.index',
            compact('minhChungs', 'trashCount','donVis' ,'filterTen', 'filterNoiBanHanh', 'filterDonViId', 'filterIsMCGop'));
    }

    public function create()
    {
        $donVis = $this->donViModel->all();
        return view('pages.minhchung.create', compact('donVis'));
    }

    public function store(Request $request)
    {
        $donVis = $this->donViModel->all();
        $this->callValidate($request);
        if ($request->isMCGop !== 'on') {
            if (is_null($request->fileMinhChung) && is_null($request->link)) {
                return redirect()->route('minhchung.create')->with('message', 'Lỗi: Bạn chưa thêm tệp hoặc link url minh chứng!', compact('donVis'));
            }
            $link = '';
            $isUrl = false;

            if(is_null($request->link)) {
                $link = HandleUploadFile::upload($request, 'fileMinhChung', 'minhchungs');
            }
            else {
                $link = $request->link;
                $isUrl = true;
            }
        }

        $this->minhChungModel->create([
            'ten' => $request->ten,
            'ngayKhaoSat' => $request->ngayKhaoSat,
            'ngayBanHanh' => $request->ngayBanHanh,
            'noiBanHanh' => $request->noiBanHanh,
            'link' => $request->isMCGop == 'on' ? null : $link,
            'isUrl' =>$request->isMCGop == 'on' ? null : $isUrl,
            'donVi_id' => $request->donVi_id,
            'isMCGop' => $request->isMCGop == 'on' ? 1 : 0,
            'nguoiDung_id' => auth()->user()->id
        ]);
        return redirect()->route('minhchung.index')->with('message', 'Thêm thành công!');
    }

    public function edit($id)
    {
        $minhChung = $this->minhChungModel->find($id);
        $donVis = $this->donViModel->all();
        return view('pages.minhchung.edit', compact('minhChung', 'donVis'));
    }

    public function update(Request $request, $id)
    {
        $this->callValidate($request, $id);

        $minhChung = $this->minhChungModel->find($id);
        if (is_null($request->fileMinhChung) && is_null($request->link)) {
            $minhChung->update([
                'ten' => $request->ten,
                'ngayKhaoSat' => $request->ngayKhaoSat,
                'ngayBanHanh' => $request->ngayBanHanh,
                'noiBanHanh' => $request->noiBanHanh,
                'donVi_id' => $request->donVi_id,
            ]);
        } else {
            $link = '';
            $isUrl = false;

            if(is_null($request->link)) {
                $link = HandleUploadFile::upload($request, 'fileMinhChung', 'minhchungs');
            }
            else {
                $link = $request->link;
                $isUrl = true;
            }
            $minhChung->update([
                'ten' => $request->ten,
                'ngayKhaoSat' => $request->ngayKhaoSat,
                'ngayBanHanh' => $request->ngayBanHanh,
                'noiBanHanh' => $request->noiBanHanh,
                'link' => $link,
                'isUrl' => $isUrl,
                'donVi_id' => $request->donVi_id,
            ]);
        }
        return redirect()->route('minhchung.index')->with('message', 'Sửa thành công!');
    }

    public function addDetail($id)
    {
        $minhChung = $this->minhChungModel->find($id);
        if ($minhChung->isMCGop) {
            return view('pages.minhchung.addDetail', compact('minhChung'));
        } else {
            return redirect()->route('minhchung.index')->with('message', 'Bạn đang cố gắng truy cập vào chức năng quản lý MCTP đối với minh chứng đơn!');
        }
    }

    public function show($id)
    {
        $minhChung = $this->minhChungModel->find($id);
        return view('pages.minhchung.show', compact('minhChung'));
    }


    public function destroy(Request $request)
    {
        try {
            $this->minhChungModel->find($request->id)->delete();
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
        $minhChungs = $this->minhChungModel->onlyTrashed()->paginate(10);
        return view('pages.minhchung.trash', compact('minhChungs'));
    }

    public function restore(Request $request)
    {
        try {
            $this->minhChungModel->onlyTrashed()->find($request->id)->restore();
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
            $this->minhChungModel->onlyTrashed()->restore();
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
            $this->minhChungModel->onlyTrashed()->find($request->id)->forceDelete();
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
            $this->minhChungModel->onlyTrashed()->forceDelete();
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

    public  function download($file_name) {
        if(Storage::disk('public')->exists("minhchungs/$file_name")) {
            $path = Storage::disk('public')->path("minhchungs/$file_name");
            $content = file_get_contents($path);
            return  response($content)->withHeaders(['Content-Type' => mime_content_type($path)]);
        }
        return redirect('/404');
    }

    public function getAll() {
        return response()->json($this->minhChungModel->all(), 200);
    }
    public function getTp(Request $request) {
        $minhChung = $this->minhChungModel->find($request->id);
        return response()->json($minhChung->cTMinhChung, 200);
    }
}
