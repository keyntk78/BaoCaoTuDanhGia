@extends('layouts.index', ['title' => 'Chỉnh sửa bộ tiêu chuẩn'])

@php
$controller = (object) [
    'name' => 'Bộ tiêu chuẩn',
    'href' => '/botieuchuan',
];
$action = (object) [
    'name' => 'Chỉnh sửa',
];
@endphp

@section('breadcrumb')
    @include('partials.breadcrumb', compact('controller', 'action'))
@endsection

@section('page-heading')
    @include('partials.page-heading', compact('controller', 'action'))
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('botieuchuan.update', ['id' => $boTieuChuan->id]) }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="ten">Tên bộ tiêu chuẩn</label>
                        <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                            name="ten" value="{{ old('ten', $boTieuChuan->ten) }}">
                        @if ($errors->has('ten'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ten') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-12">
                        <label for="capdanhgia">Cấp đánh giá</label>
                        <select class="form-select form-control {{ $errors->has('capDanhGia_id') ? 'is-invalid' : '' }}"
                            id="capDanhGia_id" name="capDanhGia_id" aria-label="Chọn cấp đánh giá">
                            <option value="">Chọn cấp đánh giá</option>
                            @foreach ($capDanhGias as $item)
                                <option value="{{ $item->id }}" {{ $boTieuChuan->capDanhGia_id == $item->id ? 'selected' : '' }}>{{ $item->ten }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('capDanhGia_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('capDanhGia_id') }}
                            </div>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection
