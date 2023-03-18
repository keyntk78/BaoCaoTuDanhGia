@extends('layouts.index', ['title' => 'Chỉnh sửa nhóm'])

@php
$controller = (object) [
    'name' => 'Nhóm',
    'href' => '/nhom',
];
$action = (object) [
    'name' => 'Chỉnh sửa',
];
@endphp

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <style>
        .btn-add,
        .btn-remove {
            padding: 0.6rem .75rem;
        }

    </style>
@endsection

@section('breadcrumb')
    @include('partials.breadcrumb', compact('controller', 'action'))
@endsection

@section('page-heading')
    @include('partials.page-heading', compact('controller', 'action'))
@endsection

@section('content')
    <div class="card shadow mb-4 w-75">
        <div class="card-body">
            <form action="{{ route('nhom.update', ['id' => $nhom->id]) }}" method="POST">
                @csrf
                <input type="hidden" name="nhom_id" id="nhom_id" value={{$nhom->id}}>
                <div class="form-group">
                    <label for="nganh_id">Ngành</label>
                    <select class="form-select form-control {{ $errors->has('nganh_id') ? 'is-invalid' : '' }}"
                        id="nganh_id" name="nganh_id" aria-label="Chọn ngành" readonly disabled>
                        <option {{ old('nganh_id', $nhom->nganh_id) == '' ? 'selected' : '' }}>Chọn ngành</option>
                        @foreach ($nganhs as $item)
                            <option value="{{ $item->id }}"
                                {{ old('nganh_id', $nhom->nganh_id) == $item->id ? 'selected' : '' }}>
                                {{ $item->ten }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('nganh_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nganh_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="ten">Tên nhóm</label>
                    <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                        name="ten" value="{{ old('ten', $nhom->ten) }}">
                    @if ($errors->has('ten'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ten') }}
                        </div>
                    @endif
                </div>
                <div class="form-row pl-1 wrap-select">
                    <div class="form-row pl-1 w-100">
                        <div class="form-group col-md-5">
                            <label>Quyền</label>
                            <select class="form-select form-control" id="select-1" data-name="quyenNhom_id[]" aria-label="Chọn quyền">
                                <option value="" selected>Chọn quyền</option>
                                @foreach ($quyenNhoms as $item)
                                    <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ml-3 form-group col-md-5">
                            <label>Tiêu chuẩn</label>
                            <select class="form-select form-control" id="select-2" data-name="tieuChuan_id[]" aria-label="Chọn quyền">
                                <option value="" selected>Chọn tiêu chuẩn</option>
                                @foreach ($tieuChuans as $item)
                                    <option value="{{ $item->id }}">Tiêu chuẩn số {{ $item->stt }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ml-3 mb-0 form-group col-md-1">
                            <label>&nbsp;</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text btn-primary btn-add" role="button"><i
                                        class="fa fa-plus"></i></span>
                            </div>
                        </div>
                    </div>
                    @php
                        $quyenNhom_id = old('quyenNhom_id', $current_quyenNhoms) != '' ? old('quyenNhom_id', $current_quyenNhoms) : [];
                        $tieuChuan_id = old('tieuChuan_id', $current_tieuChuans) != '' ? old('tieuChuan_id', $current_tieuChuans) : [];
                    @endphp
                    @if (!empty($quyenNhom_id) && !empty($tieuChuan_id))
                        @foreach ($quyenNhom_id as $key => $item)
                            @foreach ($quyenNhoms as $quyenNhom)
                                @if ($quyenNhom->id == $item)
                                    @php $text1 = $quyenNhom->ten @endphp
                                @endif
                            @endforeach
                            @foreach ($tieuChuans as $tieuChuan)
                                @if ($tieuChuan->id == $tieuChuan_id[$key])
                                    @php $text2 = 'Tiêu chuẩn số ' . $tieuChuan->stt @endphp
                                @endif
                            @endforeach
                            <div class="form-row pl-1 w-100 wrap-selected">
                                <div class="form-group col-md-5">
                                    <input type="text" class="form-control" value="{{ $text1 }}" readonly>
                                    <input type="hidden" class="value-1" name="quyenNhom_id[]"
                                        value="{{ $item }}">
                                </div>
                                <div class="ml-3 form-group col-md-5">
                                    <input type="text" class="form-control" value="{{ $text2 }}" readonly>
                                    <input type="hidden" class="value-2" name="tieuChuan_id[]"
                                        value="{{ $tieuChuan_id[$key] }}">
                                </div>
                                <div class="ml-3 mb-0 form-group col-md-1">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text btn-primary btn-remove" role="button"><i
                                                class="fa fa-minus"></i></span>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @endif
                </div>
                <div class="form-group">
                    <label for="thanhVien">Thành viên</label>
                    <select class="form-control tags-select-only" multiple="multiple" name="thanhVien[]">
                        @php
                            $thanhVienIds = old('thanhVien', $current_thanhViens) != '' ? old('thanhVien', $current_thanhViens) : [];
                        @endphp
                        @foreach ($thanhViens as $item)
                            <option value="{{ $item->id }}" {{ in_array($item->id, $thanhVienIds) ? 'selected' : '' }}>
                                {{ $item->hoTen }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/handleMultipleSelect.js"></script>
    <script src="js/handleTwoSelect.js"></script>
    <script src="js/handleDataSelect.js"></script>
@endsection
