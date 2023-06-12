@extends('layouts.index', ['title' => 'Chi tiết người dùng'])

@php
$controller = (object) [
    'name' => 'Người dùng',
    'href' => '/nguoidung',
];
$action = (object) [
    'name' => 'Chi tiết',
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
    <div class="card shadow mb-4 w-50">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Ảnh đại diện:</th>
                            <td><img width="200" height="auto" src="{{ $user->hinhAnh }}" alt="Avatar"></td>
                        </tr>
                        <tr>
                            <th>Họ tên:</th>
                            <td>{{ $user->hoTen }}</td>
                        </tr>
                        <tr>
                            <th>Giới tính:</th>
                            <td>{{ $user->gioiTinh == 1 ? 'Nam' : 'Nữ' }}</td>
                        </tr>
                        @if($user->ngaySinh !== null)
                            <tr>
                                <th>Ngày sinh:</th>
                                <td>{{ date("d-m-Y", strtotime($user->ngaySinh)) }}</td>
                            </tr>
                        @else
                            <tr>
                                <th>Ngày sinh:</th>
                                <td></td>
                            </tr>
                        @endif
                        @if($user->chucVu_id !== null)
                            <tr>
                                <th>Chức vụ:</th>
                                <td>{{ $user->chucVu->ten }}</td>
                            </tr>
                        @else
                            <tr>
                                <th>Chức vụ:</th>
                                <td></td>
                            </tr>
                        @endif

                        <tr>
                            <th>Email:</th>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <th>Số điện thoại:</th>
                            <td>{{ $user->sdt }}</td>
                        </tr>
                        @if($user->donVi_id !== null)
                            <tr>
                                <th>Đơn vị:</th>
                                <td>{{ $user->donVi->ten }}</td>
                            </tr>
                        @else
                            <tr>
                                <th>Đơn vị:</th>
                                <td></td>
                            </tr>
                        @endif
                        <tr>
                            <th>Vai trò hệ thống:</th>
                            <td>
                                <ul class="pl-3">
                                    @foreach ($user->vaiTroHT as $item)
                                        <li>{{ $item->ten }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Chức năng:</th>
                            <td>
                                <a href="{{ route('nguoidung.edit', ['id' => $user->id]) }}"
                                    class="btn btn-secondary">Sửa</a>
                                <a href="#" class="btn btn-danger btn-delete" data-url="{{ route('nguoidung.destroy') }}"
                                    data-id="{{ $user->id }}" data-redirect="{{ route('nguoidung.index') }}">Xóa</a>
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
