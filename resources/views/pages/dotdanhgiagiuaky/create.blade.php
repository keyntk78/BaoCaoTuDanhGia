@extends('layouts.index', ['title' => 'Thêm mới đợt đánh giá giữa kỳ'])

@php
    $controller = (object) [
        'name' => 'Đợt đánh giá giữa kỳ',
        'name2' => 'Đợt đánh giá',
        'href' => '/dotdanhgia',
    ];

    $action = (object) [
        'name' => 'Thêm mới',
    ];
@endphp

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
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

@section('message')
    @include('partials.message', [
        'message' => Session::has('message') ? Session::get('message') : null,
    ])
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            @if($isDanhGiaGK == false)
                <form action="{{ route('dotdanhgiagiuaky.store', ['id' => $dotDanhGia->id]) }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="tenDotDanhGia">Tên đợt đánh giá</label>
                        <input type="text" class="form-control {{ $errors->has('tenDotDanhGia') ? 'is-invalid' : '' }}" id="tenDotDanhGia"
                               name="tenDotDanhGia" readonly value="{{ $dotDanhGia->ten }}">
                        @if ($errors->has('tenDotDanhGia'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tenDotDanhGia') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="namHocs">Năm đánh giá</label>
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
                        <label for="thoiDiemCongNhan">Thời điểm công nhận</label>
                        <input type="date" class="form-control {{ $errors->has('thoiDiemCongNhan') ? 'is-invalid' : '' }}" id="thoiDiemCongNhan"
                               name="thoiDiemCongNhan" value="{{ old('thoiDiemCongNhan', '') }}">
                        @if ($errors->has('thoiDiemCongNhan'))
                            <div class="invalid-feedback">
                                {{ $errors->first('thoiDiemCongNhan') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group">
                        <label for="tenToChucKiemDinh">Tổ chức Kiểm định chất lượng giáo dục:</label>
                        <input type="text" class="form-control {{ $errors->has('tenToChucKiemDinh') ? 'is-invalid' : '' }}" id="tenToChucKiemDinh"
                               name="tenToChucKiemDinh" value="{{ old('tenToChucKiemDinh', '') }}">
                        @if ($errors->has('tenToChucKiemDinh'))
                            <div class="invalid-feedback">
                                {{ $errors->first('tenToChucKiemDinh') }}
                            </div>
                        @endif
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
            @else
                <div class="table-responsive">
                    <div>Thông tin</div>
                    <table class="table table-bordered" width="100%" cellspacing="0">
                        <tbody>
                        <tr>
                            <th>Tên đợt đánh giá:</th>
                            <td colspan="3">{{ $dotDanhGiaGiuaKy[0]->tenDotDanhGia }}</td>
                        </tr>
                        <tr>
                            <th>Năm học:</th>
                            <td colspan="3">{{ $dotDanhGiaGiuaKy[0]->namHoc }}</td>
                        </tr>
                        <tr>
                            <th>Thời điểm công nhận</th>
                            <td colspan="3">{{ date("d-m-Y", strtotime($dotDanhGiaGiuaKy[0]->thoiDiemCongNhan)) }}</td>
                        </tr>
                        <tr>
                            <th>Tên tổ chức kiểm định:</th>
                            <td colspan="3">{{ $dotDanhGiaGiuaKy[0]->tenToChucKiemDinh }}</td>
                        </tr>
                        <tr>
                            <th>Các giai đoạn:</th>
                            <th>Hoạt động</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                        </tr>
                        @foreach($giaiDoans as $giaiDoan)
                            <tr>
                                <td></td>
                                <td>{{ $giaiDoan->tenHoatDong }}</td>
                                <td>{{ date("d-m-Y H:i", strtotime($giaiDoan->ngayBD)) }}</td>
                                <td>{{ date("d-m-Y H:i", strtotime($giaiDoan->ngayKT)) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th>Chức năng:</th>
                            <td colspan="3">
                                <a href="{{route('dotdanhgiagiuaky.edit', ['id'=> $dotDanhGiaGiuaKy[0]->id])}}"
                                   class="btn btn-secondary">Sửa</a>
                                <a href=""
                                   class="btn btn-danger">Xóa</a>
                                @if($dotDanhGiaGiuaKy[0]->trangThai === 1)
                                    <a href="#" data-url="{{route('dotdanhgiagiuaky.reopen')}}"
                                       data-id="{{$dotDanhGiaGiuaKy[0]->id}}"
                                       class="btn btn-success btn-reopen ml-2">Mở lại</a>
                                @else
                                    <a href="#" data-url="{{route('dotdanhgiagiuaky.finish')}}"
                                       data-id="{{$dotDanhGiaGiuaKy[0]->id}}"
                                       class="btn btn-success btn-finish ml-2">Đóng đánh giá giữa kỳ</a>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            @endif
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/handleMultipleSelect.js"></script>
    <script src="js/handleSelectWithTwoInputs.js"></script>
    <script src="js/baocaogiuaky/handleFinishDotDanhGiaGK.js"></script>
@endsection
