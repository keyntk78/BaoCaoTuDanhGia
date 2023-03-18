@extends('layouts.index', ['title' => 'Danh sách minh chứng'])

@php
$controller = (object) [
    'name' => 'Minh chứng',
    'href' => '/minhchung',
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
            <h6 class="m-0 text-center">TÌM KIẾM MINH CHỨNG</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('minhchung.index') }}" method="GET">
                <div class="form-group">
                    <label for="ten">Tên minh chứng</label>
                    <input type="text" class="form-control" id="ten"
                        name="ten" value="{{ $filterTen }}">
                </div>
                <div class="form-group">
                    <label for="noiBanHanh">Nơi ban hành</label>
                    <input type="text" class="form-control" id="noiBanHanh"
                        name="noiBanHanh" value="{{ $filterNoiBanHanh }}">
                </div>
                <div class="form-group">
                    <span for="isMCGop">Loại minh chứng</span>
                    <div class="form-row pl-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="isMCGop" value="1"
                                {{ $filterIsMCGop == '1' ? 'checked' : '' }}>
                            <span class="form-check-label">Minh chứng gộp</span>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="isMCGop" value="0"
                                {{ $filterIsMCGop == '0' ? 'checked' : '' }}>
                            <span class="form-check-label">Minh chứng đơn</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="donVi_id">Đơn vị</label>
                    <select class="form-select form-control"
                        id="donVi_id" name="donVi_id" aria-label="Chọn đơn vị">
                        <option {{ $filterDonViId == '' ? 'selected' : '' }} value="">Chọn đơn vị</option>
                        @foreach ($donVis as $item)
                            <option value="{{ $item->id }}" {{ $filterDonViId == $item->id ? 'selected' : '' }}>{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="loaiMinhChung_id">Loại minh chứng</label>
                    <select class="form-select form-control"
                            id="loaiMinhChung_id" name="loaiMinhChung_id" aria-label="Chọn đơn vị">
                        <option {{ $filterLoaiMinhChungId == '' ? 'selected' : '' }} value="">Chọn loại minh chứng</option>
                        @foreach ($loaiMinhChungs as $item)
                            <option value="{{ $item->id }}" {{ $filterLoaiMinhChungId == $item->id ? 'selected' : '' }}>{{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mx-2">Tìm kiếm</button>
                    <a href="{{ route('minhchung.index') }}" class="btn btn-secondary mx-2">Làm mới</a>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            @can('minhchung-them')
                <a href="{{ route('minhchung.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Thêm mới</span>
                </a>
            @endcan
            @can('minhchung-xoa')
                <a href="{{ route('minhchung.trash') }}" class="btn btn-dark btn-icon-split">
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
                            <th>@sortablelink('ten', 'Tên minh chứng')</th>
                            <th>@sortablelink('ngayKhaoSat', 'Ngày khảo sát')</th>
                            <th>@sortablelink('ngayBanHanh', 'Ngày ban hành')</th>
                            <th>@sortablelink('noiBanHanh', 'Nơi ban hành')</th>
                            <th>@sortablelink('donVi.ten', 'Đơn vị')</th>
                            <th>@sortablelink('isMCGop', 'Loại minh chứng')</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($minhChungs) > 0)
                            @foreach ($minhChungs as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->ten }}</td>
                                    <td>{{ $item->ngayKhaoSat ? date("d-m-Y", strtotime($item->ngayKhaoSat)) : ''}}</td>
                                    <td>{{ $item->ngayBanHanh ? date("d-m-Y", strtotime($item->ngayBanHanh)) : ''}}</td>
                                    <td>{{ $item->noiBanHanh }}</td>
                                    <td>{{ $item->donVi->ten }}</td>
                                    <td>{{ $item->isMCGop ? 'Minh chứng gộp' : 'Minh chứng đơn' }}</td>
                                    <td>
                                        @can('minhchung-chitiet')
                                            <a href="{{ route('minhchung.show', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Xem chi tiết</a>
                                        @endcan
                                        @can('minhchung-canhan', $item->id)
                                            <a href="{{ route('minhchung.edit', ['id' => $item->id]) }}"
                                                class="btn btn-secondary">Sửa</a>
                                            @if ($item->isMCGop == 1)
                                                <a href="{{ route('minhchung.add-detail', ['id' => $item->id]) }}"
                                                    class="btn btn-success">Quản lý MCTP</a>
                                            @endif
                                        @endcan
                                        @can('minhchung-canhan', $item->id)
                                            <a href="#" class="btn btn-danger btn-delete"
                                                data-url="{{ route('minhchung.destroy', ['id' => $item->id]) }}"
                                                data-id="{{ $item->id }}">Xóa</a>
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
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
@endsection
