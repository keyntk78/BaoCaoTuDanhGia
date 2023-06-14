@extends('layouts.index', ['title' => 'Phân quyền người dùng'])

@php
    $controller = (object) [
        'name' => 'Vai trò hệ thống',
        'href' => '/vaitrohethong',
    ];
    $action = (object) [
        'name' => 'Phân quyền người dùng',
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

@section('message')
    @include('partials.message', [
        'message' => Session::has('message') ? Session::get('message') : null,
    ])
@endsection

@section('content')
    <div class="card shadow mb-4  w-50">
        <div class="card-body">
            <p>Phân quyền tiến độ báo cáo</p>
            <form action="{{route('vaitrohethong.create-permission-user')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="nguoiDung_id">Người dùng</label>
                    <select class="form-select form-control {{ $errors->has('nguoiDung_id') ? 'is-invalid' : '' }}"
                            id="nguoiDung_id" name="nguoiDung_id"  aria-label="Chọn bộ người dùng">
                        <option value="0" selected>Chọn người dùng</option>
                        @foreach($users as $item)
                            <option value="{{$item->id}}">{{$item->hoTen}}</option>
                        @endforeach
                    </select>
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
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/handleMultipleSelect.js"></script>
@endsection
