@extends('layouts.index', ['title' => 'Chi tiết nhóm người dùng'])

@php
$controller = (object) [
    'name' => 'Nhóm',
    'href' => '/nhom',
];
$action = (object) [
    'name' => 'Nhóm người dùng',
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
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên thành viên</th>
                            <th>Vai trò</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($nhomNguoiDungs) > 0)
                            @foreach ($nhomNguoiDungs as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->nguoidung->hoTen }}</td>
                                    <td>{{ $item->vaiTro->ten }}</td>
                                    <td>
                                        <a href="{{ route('nhomnguoidung.edit', ['id' => $item->id]) }}"
                                            class="btn btn-secondary">Sửa</a>
                                        <a href="#" class="btn btn-danger btn-delete"
                                            data-url="{{ route('nhomnguoidung.destroy') }}" data-id="{{ $item->id }}">Xóa</a>
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
@endsection
