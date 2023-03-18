@extends('layouts.index', ['title' => 'Thông tin cá nhân'])

@php
$controller = (object) [
    'name' => 'Thông tin cá nhân',
    'href' => '/thongtincanhan',
];
$action = (object) [
    'name' => 'Chi tiết',
];
$user = optional(auth()->user());
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
    <div class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Ảnh đại diện:</th>
                            <td><img width="200" height="200" src="{{ $user->hinhAnh }}" alt="Avatar"></td>
                        </tr>
                        <tr>
                            <th>Họ tên:</th>
                            <td>{{ $user->hoTen }}</td>
                        </tr>
                        <tr>
                            <th>Giới tính:</th>
                            <td>{{ $user->gioiTinh == 1 ? 'Nam' : 'Nữ' }}</td>
                        </tr>
                        <tr>
                            <th>Ngày sinh:</th>
                            <td>{{ date("d-m-Y", strtotime($user->ngaySinh)) }}</td>
                        </tr>
                        <tr>
                            <th>Chức vụ:</th>
                            <td>{{ $user->chucVu }}</td>
                        </tr>
                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Số điện thoại:</th>
                            <td>{{ $user->sdt }}</td>
                        </tr>
                        <tr>
                            <th>Đơn vị:</th>
                            <td>{{ $user->donVi->ten }}</td>
                        </tr>
                        <tr>
                            <th>Chức năng:</th>
                            <td>
                                <a href="{{ route('thongtincanhan.edit') }}"
                                    class="btn btn-secondary">Sửa</a>
                                <a href="{{ route('thongtincanhan.changepassword') }}"
                                    class="btn btn-primary">Đổi mật khảu</a>
                            </td>
                        </tr>
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
