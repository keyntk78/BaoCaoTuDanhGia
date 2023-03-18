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
                    <select class="form-select form-control {{ $errors->has('nganh_id') ? 'is-invalid' : '' }}"
                        id="nganh_id" name="nganh_id" aria-label="Chọn ngành">
                        <option {{ old('nganh_id', '') == '' ? 'selected' : '' }}>Chọn ngành</option>
                        @foreach ($nganhs as $item)
                            <option value="{{ $item->id }}" {{ old('nganh_id', '') == $item->id ? 'selected' : '' }}>{{ $item->ten }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('nganh_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nganh_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tieuChi_id">Tiêu chí</label>
                    <select class="form-select form-control {{ $errors->has('tieuChi_id') ? 'is-invalid' : '' }}"
                        id="tieuChi_id" name="tieuChi_id" aria-label="Chọn tiêu chí">
                        <option {{ old('tieuChi_id', '') == '' ? 'selected' : '' }}>Chọn tiêu chí</option>
                        @foreach ($tieuChis as $item)
                            <option value="{{ $item->id }}" {{ old('tieuChi_id', '') == $item->id ? 'selected' : '' }}>Tiêu chí số {{ $item->tieuChuan->stt }}.{{ $item->stt }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('tieuChi_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tieuChi_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="moTa">Mô tả</label>
                    <textarea class="form-control tiny-editor" id="moTa" name="moTa"
                        rows="8">{{ old('moTa', '') }}</textarea>
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
                    <input type="number" class="form-control" id="diemTDG"
                        name="diemTDG" value="{{ old('diemTDG', '') }}">
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="js/customTinyMCE.js"></script>
    <script src="js/callTinyMCE.js"></script>
@endsection
