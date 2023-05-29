@extends('layouts.index', ['title' => 'Phân Công báo cáo giữa kỳ'])

@php
    $controller = (object) [
        'name' => 'Báo cáo giữa kỳ',
        'href' => '/baocaogiuaky',
    ];
    $action = (object) [
        'name' => 'Phân công',
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
{{--            {{ route('baocaogiuaky.store') }}--}}
            <form action="" method="POST">
                @csrf
                <div class="form-group">
                    <label for="dotDanhGiaGK_id">Đợt đánh giá giữa kỳ</label>
                    <select class="form-select form-control {{ $errors->has('dotDanhGiaGK_id') ? 'is-invalid' : '' }}" id="dotDanhGiaGK_id" name="dotDanhGiaGK_id" aria-label="Chọn đợt đánh giá giữa kỳ">
                        <option value="">Chọn đợt đánh giá</option>
                        @foreach ($dotDanhGiaGKs as $item)
                            <option value="{{ $item->id }}">{{ $item->tenDotDanhGia }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('dotDanhGiaGK_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dotDanhGiaGK_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="nganh_id">Ngành</label>
                    <select class="form-select form-control {{ $errors->has('nganh_id') ? 'is-invalid' : '' }}" id="nganh_id" disabled name="nganh_id" aria-label="Chọn ngành">
                        <option value="0">Chọn ngành</option>
                    </select>
                    @if ($errors->has('nganh_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nganh_id') }}
                        </div>
                    @endif
                </div>

                <div class="form-row pl-1 wrap-select">
                    <div class="form-row pl-1 w-100">
                        <div class="form-group col-md-5">
                            <label>Tiêu Chuấn</label>
                            <select class="form-select form-control" id="select-1" data-name="quyenNhom_id[]" aria-label="Chọn quyền" disabled>
                                <option value="" selected>Chọn tiêu chuẩn</option>
{{--                                @foreach ($quyenNhoms as $item)--}}
{{--                                    <option value="{{ $item->id }}">{{ $item->ten }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                        <div class="ml-3 form-group col-md-5">
                            <label>Tiêu chí</label>
                            <select class="form-select form-control" id="select-2" data-name="tieuChuan_id[]" aria-label="Chọn tiêu chuẩn" disabled>
                                <option value="" selected>Chọn tiêu chí</option>
{{--                                @foreach ($tieuChuans as $item)--}}
{{--                                    <option value="{{ $item->id }}">Tiêu chuẩn số {{ $item->stt }}</option>--}}
{{--                                @endforeach--}}
                            </select>
                        </div>
                        <div class="ml-3 mb-0 form-group col-md-1">
                            <label>&nbsp;</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text btn-primary btn-add d-none" role="button"><i
                                        class="fa fa-plus"></i></span>
                            </div>
                        </div>
                    </div>
{{--                    @php--}}
{{--                        $quyenNhom_id = old('quyenNhom_id', '') != '' ? old('quyenNhom_id', '') : [];--}}
{{--                        $tieuChuan_id = old('tieuChuan_id', '') != '' ? old('tieuChuan_id', '') : [];--}}
{{--                    @endphp--}}
{{--                    @foreach ($quyenNhom_id as $key => $item)--}}
{{--                        @foreach ($quyenNhoms as $quyenNhom)--}}
{{--                            @if ($quyenNhom->id == $item)--}}
{{--                                @php $text1 = $quyenNhom->ten @endphp--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                        @foreach ($tieuChuans as $tieuChuan)--}}
{{--                            @if ($tieuChuan->id == $tieuChuan_id[$key])--}}
{{--                                @php $text2 = $tieuChuan->ten @endphp--}}
{{--                            @endif--}}
{{--                        @endforeach--}}
{{--                        <div class="form-row pl-1 w-100 wrap-selected">--}}
{{--                            <div class="form-group col-md-5">--}}
{{--                                <input type="text" class="form-control" value="{{ $text1 }}" readonly>--}}
{{--                                <input type="hidden" class="value-1" name="quyenNhom_id[]" value="{{ $item }}">--}}
{{--                            </div>--}}
{{--                            <div class="ml-3 form-group col-md-5">--}}
{{--                                <input type="text" class="form-control" value="{{ $text2 }}" readonly>--}}
{{--                                <input type="hidden" class="value-2" name="tieuChuan_id[]" value="{{ $tieuChuan_id[$key] }}">--}}
{{--                            </div>--}}
{{--                            <div class="ml-3 mb-0 form-group col-md-1">--}}
{{--                                <div class="input-group-prepend">--}}
{{--                                    <span class="input-group-text btn-primary btn-remove" role="button"><i--}}
{{--                                            class="fa fa-minus"></i></span>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    @endforeach--}}
                </div>
{{--                <div class="form-group">--}}
{{--                    <label for="thanhVien">Thành viên</label>--}}
{{--                    <select class="form-control tags-select-only" multiple="multiple" name="thanhVien[]">--}}
{{--                        @php $thanhVienIds = old('thanhVien', '') != '' ? old('thanhVien', '') : [] @endphp--}}
{{--                        @foreach ($thanhViens as $item)--}}
{{--                            <option value="{{ $item->id }}" {{ in_array($item->id, $thanhVienIds) ? 'selected' : '' }}>--}}
{{--                                {{ $item->hoTen }}</option>--}}
{{--                        @endforeach--}}
{{--                    </select>--}}
{{--                </div>--}}

                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection
