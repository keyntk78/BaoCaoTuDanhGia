@extends('layouts.index', ['title' => 'Thêm mới tiêu chí'])

@php
$controller = (object) [
    'name' => 'Tiêu chí',
    'href' => '/tieuchi',
];
$action = (object) [
    'name' => 'Thêm mới',
];
@endphp

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
            <form action="{{ route('tieuchi.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="stt">Tiêu chí số</label>
                        <input type="number" class="form-control {{ $errors->has('stt') ? 'is-invalid' : '' }}" id="stt"
                            name="stt" value="{{ old('stt', '') }}">
                        @if ($errors->has('stt'))
                            <div class="invalid-feedback">
                                {{ $errors->first('stt') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-10">
                        <label for="ten">Tên tiêu chí</label>
                        <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                            name="ten" value="{{ old('ten', '') }}">
                        @if ($errors->has('ten'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ten') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <label for="tieuChuan_id">Bộ tiêu chuẩn</label>
                    <select class="form-select form-control {{ $errors->has('boTieuChuan_id') ? 'is-invalid' : '' }}"
                            id="boTieuChuan_id" name="boTieuChuan_id" aria-label="Chọn bộ tiêu chuẩn">
                        <option  value="0">Chọn bộ tiêu chuẩn</option>
                        @foreach ($boTieuChuans as $item)
                            <option value="{{ $item->id }}" {{ old('boTieuChuan_id', '') == $item->id ? 'selected' : '' }}>{{$item->ten}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tieuChuan_id">Tiêu chuẩn</label>
                    <select class="form-select form-control {{ $errors->has('tieuChuan_id') ? 'is-invalid' : '' }}" id="tieuChuan_id"
                             aria-label="Chọn tiêu chuâne" name="tieuChuan_id" disabled>
                        <option value="0" selected>Chọn tiêu chuẩn</option>
                    </select>

                    @if ($errors->has('tieuChuan_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tieuChuan_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="yeuCau">Yêu cầu</label>
                    <div class="input-group">
                        <input type="text"
                            class="multiple-input form-control"
                            id="yeuCau" data-name="yeuCau[]">
                        <div class="input-group-prepend">
                            <span class="input-group-text btn-primary btn-add" role="button"><i
                                    class="fa fa-plus"></i></span>
                        </div>
                    </div>
                    @php $yeuCau = old('yeuCau', '') != '' ? old('yeuCau', '') : [] @endphp
                    @foreach ($yeuCau as $item)
                        <div class="input-group mt-1">
                            <input type="text" class="form-control" name="yeuCau[]" value="{{ $item }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text btn-secondary btn-remove" role="button"><i class="fa fa-minus"></i></span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="mocChuan">Mốc chuẩn</label>
                    <div class="input-group">
                        <input type="text"
                            class="multiple-input form-control"
                            id="mocChuan" data-name="mocChuan[]">
                        <div class="input-group-prepend">
                            <span class="input-group-text btn-primary btn-add" role="button"><i
                                    class="fa fa-plus"></i></span>
                        </div>
                    </div>
                    @php $mocChuan = old('mocChuan', '') != '' ? old('mocChuan', '') : [] @endphp
                    @foreach ($mocChuan as $item)
                        <div class="input-group mt-1">
                            <input type="text" class="form-control" name="mocChuan[]" value="{{ $item }}">
                            <div class="input-group-prepend">
                                <span class="input-group-text btn-secondary btn-remove" role="button"><i class="fa fa-minus"></i></span>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <label for="tuKhoa">Từ khóa</label>
                    <select class="form-control tags-select"
                        multiple="multiple" name="tuKhoa[]">
                        @php $tuKhoa = old('tuKhoa', '') != '' ? old('tuKhoa', '') : [] @endphp
                        @foreach($tuKhoa as $item )
                            <option value="{{ $item }}" selected>{{ $item }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="ghiChu">Ghi chú</label>
                    <textarea class="form-control" rows="10" id="ghiChu" name="ghiChu">{{ old('ghiChu', '') }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/handleMultipleInput.js"></script>
    <script src="js/handleMultipleSelect.js"></script>
{{--    <script src="js/handleSelectBoTieuChuanToTieuChuan.js"></script>--}}
    <script src="js/handleDaTaSelectTieuChuan.js"></script>

@endsection
