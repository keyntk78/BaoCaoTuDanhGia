@extends('layouts.index', ['title' => 'Thêm mới đợt đánh giá'])

@php
$controller = (object) [
    'name' => 'Đợt đánh giá',
    'href' => '/dotdanhgia',
];
$action = (object) [
    'name' => 'Thêm mới',
];
@endphp

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
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('dotdanhgia.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="ten">Tên đợt đánh giá</label>
                    <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                        name="ten" value="{{ old('ten', '') }}">
                    @if ($errors->has('ten'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ten') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="ten">Năm đánh giá</label>
                    <select class="form-control {{ $errors->has('namHoc') ? 'is-invalid' : '' }}" name="namHoc">
                        @foreach ($namHocs as $item)
                            <option value="{{ $item }}"
                                {{ (old('namHoc', '') == '' && $item == date('Y')) || old('namHoc', '') == $item ? 'selected' : '' }}>
                                {{ $item }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('namHoc'))
                        <div class="invalid-feedback">
                            {{ $errors->first('namHoc') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="giaiDoan">Giai đoạn</label>
                    <input type="text" class="form-control {{ $errors->has('giaiDoan') ? 'is-invalid' : '' }}" id="giaiDoan"
                        name="giaiDoan" value="{{ old('giaiDoan', '') }}">
                    @if ($errors->has('giaiDoan'))
                        <div class="invalid-feedback">
                            {{ $errors->first('giaiDoan') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nganh">Ngành</label>
                    <select class="form-control tags-select-only" multiple="multiple" name="nganh[]">
                        @php $nganhIds = old('nganh', '') != '' ? old('nganh', '') : [] @endphp
                        @foreach ($nganhs as $item)
                            <option value="{{ $item->id }}" {{ in_array($item->id, $nganhIds) ? 'selected' : '' }}>
                                {{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-row pl-1 wrap-select">
                    <p>Các giai đoạn</p>
                    <div class="form-row pl-1 w-100">
                        <div class="form-group col-md-4">
                            <label>Hoạt động</label>
                            <select class="form-select form-control" id="select-1" aria-label="Chọn quyền">
                                <option value="" selected>Chọn hoạt động</option>
                                @foreach ($hoatDongs as $item)
                                    <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ml-3 form-group col-md-3">
                            <label>Ngày bắt đầu</label>
                            <input type="datetime-local" class="form-control" id="input-1">
                        </div>
                        <div class="ml-3 form-group col-md-3">
                            <label>Ngày kết thúc</label>
                            <input type="datetime-local" class="form-control" id="input-2">
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
                        $hoatDong_id = old('hoatDong_id', '') != '' ? old('hoatDong_id', '') : [];
                        $ngayBD = old('ngayBD', '') != '' ? old('ngayBD', '') : [];
                        $ngayKT = old('ngayKT', '') != '' ? old('ngayKT', '') : [];
                    @endphp
                    @foreach ($hoatDong_id as $key => $item)
                        @foreach ($hoatDongs as $hoatDong)
                            @if ($hoatDong->id == $item)
                                @php $text1 = $hoatDong->ten @endphp
                            @endif
                        @endforeach
                        <div class="form-row pl-1 w-100 wrap-selected">
                            <div class="form-group col-md-4">
                                <input type="text" class="form-control" value="{{ $text1 }}" readonly>
                                <input type="hidden" class="value-1" name="hoatDong_id[]"
                                    value="{{ $item }}">
                            </div>
                            <div class="ml-3 form-group col-md-3">
                                <input type="text" class="form-control" value="{{ $ngayBD[$key] }}" readonly>
                                <input type="hidden" class="value-2" name="ngayBD[]" value="{{ $ngayBD[$key] }}">
                            </div>
                            <div class="ml-3 form-group col-md-3">
                                <input type="text" class="form-control" value="{{ $ngayKT[$key] }}" readonly>
                                <input type="hidden" class="value-3" name="ngayKT[]" value="{{ $ngayKT[$key] }}">
                            </div>
                            <div class="ml-3 mb-0 form-group col-md-1">
                                <div class="input-group-prepend">
                                    <span class="input-group-text btn-primary btn-remove" role="button"><i
                                            class="fa fa-minus"></i></span>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/handleMultipleSelect.js"></script>
    <script src="js/handleSelectWithTwoInputs.js"></script>
@endsection
