@extends('layouts.index', ['title' => 'Thêm mới tiêu chuẩn'])

@php
$controller = (object) [
    'name' => 'Tiêu chuẩn',
    'href' => '/tieuchuan',
];
$action = (object) [
    'name' => 'Thêm mới',
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
            <form action="{{ route('tieuchuan.store') }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="stt">Tiêu chuẩn số</label>
                        <input type="number" class="form-control {{ $errors->has('stt') ? 'is-invalid' : '' }}" id="stt"
                            name="stt" value="{{ old('stt', '') }}">
                        @if ($errors->has('stt'))
                            <div class="invalid-feedback">
                                {{ $errors->first('stt') }}
                            </div>
                        @endif
                    </div>
                    <div class="form-group col-md-10">
                        <label for="ten">Tên tiêu chuẩn</label>
                        <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                            name="ten" value="{{ old('ten', '') }}">
                        @if ($errors->has('ten'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ten') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group col-md-12">
                        <label for="botieuchuan">Bộ tiêu chuẩn</label>
                        <select class="form-select form-control {{ $errors->has('boTieuChuan_id') ? 'is-invalid' : '' }}"
                            id="boTieuChuan_id" name="boTieuChuan_id" aria-label="Chọn bộ tiêu chuẩn">
                            <option value="">Chọn bộ tiêu chuẩn</option>
                            @foreach ($boTieuChuans as $item)
                                <option value="{{ $item->id }}">{{ $item->ten }}</option>
                            @endforeach
                        </select>

                        @if ($errors->has('boTieuChuan_id'))
                            <div class="invalid-feedback">
                                {{ $errors->first('boTieuChuan_id') }}
                            </div>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection
