@extends('layouts.index', ['title' => 'Phân quyền thành viên nhóm'])

@php
$controller = (object) [
    'name' => 'Quản lý nhóm',
    'href' => '/quanlynhom/',
];
$action = (object) [
    'name' => $nhomNguoiDung->nhom->ten,
    'href' => '/quanlynhom/member/'.$nhomNguoiDung->nhom_id,
];
$childAction = (object) [
    'name' => $nhomNguoiDung->nguoiDung->hoTen,
]
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
    @include('partials.breadcrumb', compact('controller', 'action', 'childAction'))
@endsection

@section('page-heading')
    @include('partials.page-heading', compact('controller', 'childAction'))
@endsection

@section('message')
    @include('partials.message', [
        'message' => Session::has('message') ? Session::get('message') : null,
    ])
@endsection

@section('content')
    <div class="card shadow mb-4 w-75">
        <div class="card-body">
            <form action="{{ route('quanlynhom.update', ['id' => $nhomNguoiDung->id]) }}" method="POST">
                @csrf
                <input type="hidden" id="nhomNguoiDung_id" name="nhomNguoiDung_id" value="{{ $nhomNguoiDung->id }}">
                <div class="form-row pl-1">
                    <div class="form-group col-md-5">
                        <label for="vaiTro_id">Vai trò</label>
                        <select class="form-select form-control {{ $errors->has('vaiTro_id') ? 'is-invalid' : '' }}"
                            id="vaiTro_id" name="vaiTro_id" aria-label="Chọn Vai trò">
                            @foreach ($vaiTros as $item)
                                <option value="{{ $item->id }}"
                                    {{ old('vaiTro_id', $nhomNguoiDung->vaiTro_id) == $item->id ? 'selected' : '' }}>
                                    {{ $item->ten }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('vaiTro_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('nganh_id') }}
                            </div>
                        @endif
                    </div>
                </div>
                <div class="form-row pl-1 wrap-select">
                    <div class="form-row pl-1 w-100">
                        <div class="form-group col-md-5">
                            <label>Quyền</label>
                            <select class="form-select form-control" id="select-1" data-name="quyenNguoiDung_id[]" aria-label="Chọn quyền">
                                @foreach ($quyenNguoiDungs as $item)
                                    <option value="{{ $item->id }}">{{ $item->ten }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="ml-3 form-group col-md-5">
                            <label>Báo cáo</label>
                            <select class="form-select form-control" id="select-2" data-name="baoCao_id[]" aria-label="Chọn quyền">
                                @foreach ($baoCaos as $item)
                                    <option value="{{ $item->id }}">Báo cáo số {{$item->tieuChi->tieuChuan->stt}}.{{$item->tieuChi->stt}}</option>
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
                        $quyenNguoiDung_id = old('quyenNguoiDung_id', $current_quyenNguoiDungs) != '' ? old('quyenNguoiDung_id', $current_quyenNguoiDungs) : [];
                        $baoCao_id = old('baoCao_id', $current_baoCaos) != '' ? old('baoCao_id', $current_baoCaos) : [];
                    @endphp
                    @if (!empty($quyenNguoiDung_id) && !empty($baoCao_id))
                        @foreach ($quyenNguoiDung_id as $key => $item)
                            @foreach ($quyenNguoiDungs as $quyenNguoiDung)
                                @if ($quyenNguoiDung->id == $item)
                                    @php $text1 = $quyenNguoiDung->ten @endphp
                                @endif
                            @endforeach
                            @foreach ($baoCaoAlls as $baoCao)
                                @if ($baoCao->id == $baoCao_id[$key])
                                    @php $text2 = 'Báo cáo số ' . $baoCao->tieuChi->tieuChuan->stt . '.' . $baoCao->tieuChi->stt @endphp
                                @endif
                            @endforeach
                            <div class="form-row pl-1 w-100 wrap-selected">
                                <div class="form-group col-md-5">
                                    <input type="text" class="form-control" value="{{ $text1 }}" readonly>
                                    <input type="hidden" class="value-1" name="quyenNguoiDung_id[]"
                                        value="{{ $item }}">
                                </div>
                                <div class="ml-3 form-group col-md-5">
                                    <input type="text" class="form-control" value="{{ $text2 }}" readonly>
                                    <input type="hidden" class="value-2" name="baoCao_id[]"
                                        value="{{ $baoCao_id[$key] }}">
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
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/handleMultipleSelect.js"></script>
    <script src="js/handleTwoSelect.js"></script>
    <script src="js/handleDataSelectQuyen.js"></script>
@endsection
