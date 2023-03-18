@extends('layouts.index', ['title' => 'Chỉnh sửa báo cáo'])

@php
$controller = (object) [
    'name' => 'Báo cáo',
    'href' => '/baocao',
];
$action = (object) [
    'name' => 'Chỉnh sửa',
];
@endphp

@section('styles')
    <link rel="stylesheet" href="css/tiny-editor.css">
@endsection

@section('breadcrumb')
    @include('partials.breadcrumb', compact('controller', 'action'))
@endsection

@section('page-heading')
    @include('partials.page-heading', compact('controller', 'action'))
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('baocao.update', ['id' => $baoCao->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nganh_id">Ngành</label>
                    <input type="text" class="form-control" id="nganh_id" name="nganh_id"
                        value="{{ $baoCao->nganh->ten }}" readonly>
                </div>
                <div class="form-group">
                    <label for="tieuChuan_id">Tiêu chuẩn</label>
                    <input type="text" class="form-control" id="tieuChuan_id" name="tieuChuan_id"
                        value="Tiêu chuẩn số {{ $baoCao->tieuChi->tieuChuan->stt }}: {{ $baoCao->tieuChi->tieuChuan->ten }}"
                        readonly>
                </div>
                <div class="form-group">
                    @php
                        if (strlen($baoCao->tieuChi->ten) < 150) {
                            $ten = $baoCao->tieuChi->ten;
                        } else {
                            $ten = substr($baoCao->tieuChi->ten, 0, strpos(wordwrap($baoCao->tieuChi->ten, 150), "\n")) . '...';
                        }
                    @endphp
                    <label for="tieuChi_id">Tiêu chí</label>
                    <input type="text" class="form-control" id="tieuChi_id" name="tieuChi_id"
                        value="Tiêu chí số: {{ $baoCao->tieuChi->tieuChuan->stt }}.{{ $baoCao->tieuChi->stt }}: {{ $ten }}"
                        readonly>
                </div>
                @if ($baoCao->tieuChi->stt !== 0)
                <div class="form-group">
                    <label for="moTa">Mô tả</label>
                    <textarea class="form-control tiny-editor" id="moTa" name="moTa" rows="8">{{ old('moTa', $baoCao->moTa) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="diemManh">Điểm mạnh</label>
                    <textarea class="form-control tiny-editor" id="diemManh" name="diemManh"
                        rows="8">{{ old('diemManh', $baoCao->diemManh) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="diemTonTai">Điểm tồn tại</label>
                    <textarea class="form-control tiny-editor" id="diemTonTai" name="diemTonTai"
                        rows="8">{{ old('diemTonTai', $baoCao->diemTonTai) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="keHoachHanhDong">Kế hoạch hành động</label>
                    <textarea class="form-control tiny-editor" id="keHoachHanhDong" name="keHoachHanhDong"
                        rows="8">{{ old('keHoachHanhDong', $baoCao->keHoachHanhDong) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="diemTDG">Điểm tự đánh giá (0 - 7 điểm)</label>
                    <input type="number" class="form-control" id="diemTDG" name="diemTDG"
                        value="{{ old('diemTDG', $baoCao->diemTDG) }}">
                </div>
                @else
                <div class="form-group">
                    <label for="moDau">Mở đầu</label>
                    <textarea class="form-control tiny-editor" id="moDau" name="moDau" rows="8">{{ old('moDau', '') }}</textarea>
                </div>
                <div class="form-group">
                    <label for="ketLuan">Kết luận</label>
                    <textarea class="form-control tiny-editor" id="ketLuan" name="ketLuan" rows="8">{{ old('ketLuan', '') }}</textarea>
                </div>
                @endif
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="js/callTinyMCE.js"></script>
@endsection
