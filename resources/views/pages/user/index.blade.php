@extends('layouts.index', ['title' => 'Danh sách người dùng'])

@php
$controller = (object) [
    'name' => 'Người dùng',
    'href' => '/nguoidung',
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
            <h6 class="m-0 text-center">TÌM KIẾM NGƯỜI DÙNG</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('nguoidung.index') }}" method="GET">
                <div class="form-group">
                    <label for="hoTen">Họ tên</label>
                    <input type="text" class="form-control {{ $errors->has('hoTen') ? 'is-invalid' : '' }}" id="hoTen"
                        name="hoTen" value="{{ $filterHoTen }}">
                </div>
                <div class="form-group">
                    <span for="gioiTinh">Giới tính</span>
                    <div class="form-row pl-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioiTinh" value="1"
                                {{ $filterGioiTinh == '1' ? 'checked' : '' }}>
                            <span class="form-check-label">Nam</span>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="gioiTinh" value="0"
                                {{ $filterGioiTinh == '0' ? 'checked' : '' }}>
                            <span class="form-check-label">Nữ</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="chucVu">Chức vụ</label>
                    <input type="text" class="form-control {{ $errors->has('chucVu') ? 'is-invalid' : '' }}" id="chucVu"
                        name="chucVu" value="{{ $filterChucVu }}">
                </div>
                {{-- <div class="form-group">
                    <label for="vaiTroHT_id">Vai trò hệ thống</label>
                    <select class="form-select form-control {{ $errors->has('vaiTroHT_id') ? 'is-invalid' : '' }}"
                        id="vaiTroHT_id" name="vaiTroHT_id" aria-label="Chọn vai trò hệ thống">
                        <option {{ $filterVaiTroHTId == '' ? 'selected' : '' }} value="">Chọn vai trò hệ thống</option>
                        @foreach ($vaiTroHTs as $item)
                            <option value="{{ $item->id }}" {{ $filterVaiTroHTId == $item->id ? 'selected' : '' }}>{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div> --}}
                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mx-2">Tìm kiếm</button>
                    <a href="{{ route('nguoidung.index') }}" class="btn btn-secondary mx-2">Làm mới</a>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div>
                @can('nguoidung-them')
                    <a href="{{ route('nguoidung.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                        <span class="text">Thêm mới</span>
                    </a>
                @endcan
                    @can('nguoidung-them')
                        <a href="{{ route('nguoidung.add-users') }}" class="btn btn-success btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-file-excel"></i>
                    </span>
                            <span class="text">Import excel</span>
                        </a>
                    @endcan
            </div>

            @can('nguoidung-xoa')
                <a href="{{ route('nguoidung.trash') }}" class="btn btn-dark btn-icon-split">
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
                            <th>@sortablelink('hoTen', 'Họ tên')</th>
                            <th>@sortablelink('gioiTinh', 'Giới tính')</th>
                            <th>@sortablelink('ngaySinh', 'Ngày sinh')</th>
                            <th>Chức vụ</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($users) > 0)
                            @foreach ($users as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->hoTen }}</td>
                                    <td>{{ $item->gioiTinh == 1 ? 'Nam' : 'Nữ' }}</td>
                                    @if($item->ngaySinh !== null)
                                        <td>{{ date('d-m-Y', strtotime($item->ngaySinh)) }}</td>
                                    @else
                                        <td></td>
                                    @endif
                                    @if(@$item->chucVu_id !== null)
                                        <td>{{ $item->chucVu->ten}}</td>
                                    @else

                                    @endif

                                    <td>
                                        @can('nguoidung-chitiet')
                                            <a href="{{ route('nguoidung.show', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Xem chi tiết</a>
                                        @endcan
                                        @can('nguoidung-sua')
                                            <a href="{{ route('nguoidung.edit', ['id' => $item->id]) }}"
                                                class="btn btn-secondary">Sửa</a>
                                        @endcan
                                        @can('nguoidung-xoa')
                                            <a href="#" class="btn btn-danger btn-delete"
                                                data-url="{{ route('nguoidung.destroy') }}"
                                                data-id="{{ $item->id }}">Xóa</a>
                                        @endcan
                                            @can('nguoidung-sua')
                                                <a href="#" class="btn btn-info btn-reset"
                                                   data-url="{{ route('nguoidung.reset-password') }}"
                                                   data-id="{{ $item->id }}">Đặt lại mật khẩu</a>
                                            @endcan
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
                    {{ $users->appends(Request::except('page'))->render('pagination::bootstrap-4') }}
                    <div>
                        <a href="{{ route('nguoidung.index') }}" class="btn btn-primary mx-2">Làm mới</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
    <script src="js/handleResetPassword.js"></script>

@endsection
