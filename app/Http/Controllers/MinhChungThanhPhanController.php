<?php

namespace App\Http\Controllers;

use App\Models\ChiTietMinhChung;
use App\Models\DonVi;
use Illuminate\Http\Request;
use App\Services\HandleUploadFile;
class MinhChungThanhPhanController extends Controller
{
    private $minhChungTPModel;
    public function __construct(ChiTietMinhChung $minhChungTPModel)
    {
        $this->minhChungTPModel = $minhChungTPModel;
    }

    protected function callValidate(Request $request, $id = null)
    {
        $request->validate([
            'ten' => 'required|unique:minh_chungs',
        ], [
            'ten.required' => 'Bạn chưa nhập tên minh chứng thành phần',
            'ten.unique' => 'Tên minh chứng thành phần đã tồn tại',
        ]);
    }

    public function store(Request $request)
    {
        $this->callValidate($request);
        if (is_null($request->fileMinhChung) && is_null($request->link)) {
            return redirect()->route('minhchung.add-detail', ['id' => $request->minhChung_id])->with('message', 'Lỗi: Bạn chưa thêm tệp hoặc link url minh chứng!');
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
        $this->minhChungTPModel->create([
            'ten' => $request->ten,
            'link' => $link,
            'isUrl' => $isUrl,
            'minhChung_id' => $request->minhChung_id,
        ]);
        return redirect()->route('minhchung.add-detail', ['id' => $request->minhChung_id])->with('message', 'Thêm thành công!');
    }

    public function destroy(Request $request)
    {
        try {
            $this->minhChungTPModel->find($request->id)->delete();
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
}
