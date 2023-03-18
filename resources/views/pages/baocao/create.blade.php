@extends('layouts.index', ['title' => 'Thêm mới báo cáo'])

@php
$controller = (object) [
    'name' => 'Báo cáo',
    'href' => '/baocao',
];
$action = (object) [
    'name' => 'Thêm mới',
];
@endphp

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

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
            <form action="{{ route('baocao.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nganh_id">Ngành</label>
                    <select class="form-select form-control" id="nganh_id" name="nganh_id" aria-label="Chọn ngành">
                        @foreach ($nganhs as $item)
                            <option value="{{ $item->id }}">{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tieuChuan_id">Tiêu chuẩn</label>
                    <select class="form-select form-control" id="tieuChuan_id" name="tieuChuan_id"
                        aria-label="Chọn tiêu chuẩn">
                        @foreach ($tieuChuans as $item)
                            <option value="{{ $item->id }}">Tiêu chuẩn số {{ $item->stt }}: {{ $item->ten }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tieuChi_id">Tiêu chí</label>
                    <select class="form-select form-control" id="tieuChi_id" name="tieuChi_id" aria-label="Chọn tiêu chí">
                        @foreach ($tieuChis as $item)
                            @php
                                if (strlen($item->ten) < 150) {
                                    $ten = $item->ten;
                                } else {
                                    $ten = substr($item->ten, 0, strpos(wordwrap($item->ten, 150), "\n")) . '...';
                                }
                            @endphp
                            <option value="{{ $item->id }}" data-stt="{{ $item->stt }}">Tiêu chí số {{ $item->tieuChuan->stt }}.{{ $item->stt }}: {{ $ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="is-normal-tieuchi d-none">
                    <div class="form-group">
                        <label for="moTa">Mô tả</label>
                        <textarea class="form-control tiny-editor" id="moTa" name="moTa" rows="8">{{ old('moTa', '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="diemManh">Điểm mạnh</label>
                        <textarea class="form-control tiny-editor" id="diemManh" name="diemManh"
                            rows="8">{{ old('diemManh', '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="diemTonTai">Điểm tồn tại</label>
                        <textarea class="form-control tiny-editor" id="diemTonTai" name="diemTonTai"
                            rows="8">{{ old('diemTonTai', '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="keHoachHanhDong">Kế hoạch hành động</label>
                        <textarea class="form-control tiny-editor" id="keHoachHanhDong" name="keHoachHanhDong"
                            rows="8">{{ old('keHoachHanhDong', '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="diemTDG">Điểm tự đánh giá (0 - 7 điểm)</label>
                        <input type="number" class="form-control" id="diemTDG" name="diemTDG"
                            value="{{ old('diemTDG', '') }}">
                    </div>
                </div>
                <div class="is-tieuchi-0">
                    <div class="form-group">
                        <label for="moDau">Mở đầu</label>
                        <textarea class="form-control tiny-editor" id="moDau" name="moDau" rows="8">{{ old('moDau', '') }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="ketLuan">Kết luận</label>
                        <textarea class="form-control tiny-editor" id="ketLuan" name="ketLuan" rows="8">{{ old('ketLuan', '') }}</textarea>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="js/callTinyMCE.js"></script>
    <script src="js/handleDataSelectBaoCao.js"></script>
    <script src="js/handleSelectTieuChi.js"></script>
@endsection
