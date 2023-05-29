@extends('layouts.index', ['title' => 'Danh sách đợt đánh giá'])

@php
$controller = (object) [
    'name' => 'Đợt đánh giá',
    'href' => 'dotdanhgia',
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
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            @can('dotdanhgia-them')
            <a href="{{ route('dotdanhgia.create') }}" class="btn btn-primary btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-plus"></i>
                </span>
                <span class="text">Thêm mới</span>
            </a>
            @endcan
            @can('dotdanhgia-xoa')
            <a href="{{ route('dotdanhgia.trash') }}" class="btn btn-dark btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                <span class="text">Thùng rác
                    <span class="trash-count">{{ $trashCount > 0 ? '(' . $trashCount . ')' : '' }}</span>
                </span>
            </a>
            @endcan
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên đợt đánh giá</th>
                            <th>Năm học</th>
                            <th>Giai đoạn</th>
                            <th>Trạng thái</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($dotDanhGias) > 0)
                            @foreach ($dotDanhGias as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->ten }}</td>
                                    <td>{{ $item->namHoc }}</td>
                                    <td>{{ $item->giaiDoan }}</td>
                                    <td>{{ $item->trangThai == 0 ? 'Đang tiến hành' : 'Đã kết thúc' }}</td>
                                    <td>
                                        @can('dotdanhgia-chitiet')
                                        <a href="{{ route('dotdanhgia.show', ['id' => $item->id]) }}"
                                            class="btn btn-primary">Xem chi tiết</a>
                                        @endcan
                                        @if ($item->trangThai == 0)
                                            @can('dotdanhgia-sua', $item->id)
                                            <a href="{{ route('dotdanhgia.edit', ['id' => $item->id]) }}"
                                                class="btn btn-secondary">Sửa</a>
                                            @endcan
                                            @can('dotdanhgia-xoa')
                                            <a href="#" class="btn btn-danger btn-delete"
                                                data-url="{{ route('dotdanhgia.destroy') }}" data-id="{{ $item->id }}">Xóa</a>
                                            @endcan
                                            @can('dotdanhgia-dieukhien')
                                            <a href="#" class="btn btn-info btn-finish"
                                                data-url="{{ route('dotdanhgia.finish') }}" data-id="{{ $item->id }}">Đóng đợt đánh giá</a>
                                            @endcan
                                        @else
                                            @can('dotdanhgia-dieukhien')
                                            <a href="#" class="btn btn-info btn-reopen"
                                            data-url="{{ route('dotdanhgia.reopen') }}" data-id="{{ $item->id }}">Mở lại đợt đánh giá</a>
                                            @endcan
                                                @can('dotdanhgiagk-xemvathem')
                                                    <a href="{{ route('dotdanhgiagiuaky.create', ['id' => $item->id]) }}"
                                                       class="btn btn-secondary">Đánh giá giữa kỳ</a>
                                                @endcan
                                        @endif
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
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
    <script src="js/handleFinish.js"></script>
@endsection
