@extends('layouts.index', ['title' => 'Danh sách nhóm'])

@php
$controller = (object) [
    'name' => 'Nhóm',
    'href' => '/nhom',
];
$action = (object) [
    'name' => 'Danh sách',
];

@endphp

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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
    <div class="card shadow mb-4 w-50 mx-auto">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-center">
            <h6 class="m-0 text-center">TÌM KIẾM TIÊU CHÍ</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('nhom.index') }}" method="GET">
                <div class="form-group">
                    <label for="ten">Tên nhóm</label>
                    <input type="text" class="form-control id="ten"
                        name="ten" value="{{ $filterTen }}">
                </div>
                <div class="form-group">
                    <label for="nganh_id">Ngành</label>
                    <select class="form-select form-control"
                        id="nganh_id" name="nganh_id" aria-label="Chọn ngành">
                        <option {{ $filterNganhId == '' ? 'selected' : '' }} value="">Chọn ngành</option>
                        @foreach ($nganhs as $item)
                            <option value="{{ $item->id }}" {{ $filterNganhId == $item->id ? 'selected' : '' }}>{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mx-2">Tìm kiếm</button>
                    <a href="{{ route('nhom.index') }}" class="btn btn-secondary mx-2">Làm mới</a>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <a href="{{ route('nhom.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Thêm mới</span>
            </a>
            <a href="{{ route('nhom.trash') }}" class="btn btn-dark btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Thùng rác
                    <span class="trash-count">{{ $trashCount > 0 ? '(' . $trashCount . ')' : '' }}</span>
                </span>
            </a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>@sortablelink('ten', 'Tên nhóm')</th>
                            <th>@sortablelink('nganh.ten', 'Ngành')</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($nhoms) > 0)
                            @foreach ($nhoms as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->ten }}</td>
                                    <td>{{ $item->nganh->ten }}</td>
                                    <td>
                                        <a href="{{ route('nhom.show', ['id' => $item->id]) }}"
                                            class="btn btn-primary">Xem chi tiết</a>
                                        <a href="{{ route('nhom.edit', ['id' => $item->id]) }}"
                                            class="btn btn-secondary">Sửa</a>
                                        <a href="#" class="btn btn-danger btn-delete"
                                            data-url="{{ route('nhom.destroy') }}" data-id="{{ $item->id }}">Xóa</a>
                                        <a href="{{ route('nhomnguoidung.show', ['id' => $item->id]) }}"
                                            class="btn btn-secondary">Quản lý TV</a>
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="999" class="text-center">Chưa có bản ghi nào!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    {{ $nhoms->appends(Request::except('page'))->render('pagination::bootstrap-4') }}
                    <div>
                        <a href="{{ route('nhom.index') }}" class="btn btn-primary mx-2">Làm mới</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
@endsection
