@extends('layouts.index', ['title' => 'Chỉnh sửa cấp đánh giá'])

@php
$controller = (object) [
    'name' => 'Cấp đánh giá',
    'href' => '/capdanhgia',
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
            <form action="{{ route('capdanhgia.update', ['id' => $capDanhGia->id]) }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="ten">Tên cấp đánh giá</label>
                        <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                            name="ten" value="{{ old('ten', $capDanhGia->ten) }}">
                        @if ($errors->has('ten'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ten') }}
                            </div>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection
