@extends('layouts.index', ['title' => 'Nhận xét báo cáo'])

@php
$controller = (object) [
    'name' => 'Nhận xét báo cáo',
    'href' => '/nhanxetbaocao',
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
            <h6 class="m-0 text-center">TÌM KIẾM BÁO CÁO</h6>
        </div>
        <div class="card-body">
            <form action="{{ route('nhanxetbaocao.index') }}" method="GET">
                <div class="form-group">
                    <span for="trangThai">Trạng thái</span>
                    <div class="form-row pl-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="trangThai" value="0"
                                {{ $filterTrangThai == '0' ? 'checked' : '' }}>
                            <span class="form-check-label">Đang tiến hành</span>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="trangThai" value="1"
                                {{ $filterTrangThai == '1' ? 'checked' : '' }}>
                            <span class="form-check-label">Đã hoàn thành</span>
                        </div>
                    </div>
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
                    <a href="{{ route('nhanxetbaocao.index') }}" class="btn btn-secondary mx-2">Làm mới</a>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Thời gian cập nhật</th>
                            <th>Cán bộ đảm nhận viết</th>
                            <th>@sortablelink('nganh_id', 'Ngành')</th>
                            <th>@sortablelink('trangThai', 'Trạng thái')</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($baoCaos) > 0)
                            @foreach ($baoCaos as $item)
                                <tr>
                                    <td>Báo cáo số {{ $item->tieuChi->tieuChuan->stt }}.{{ $item->tieuChi->stt }}</td>
                                    <td>{{ date("d-m-Y H:i", strtotime($item->updated_at)) }}</td>
                                    <td>
                                        <ul class="pl-0" type="none">
                                        @foreach ($item->nhomNguoiDung as $nhomNguoiDung)
                                            <li>{{ $nhomNguoiDung->nguoiDung->hoTen }}</li>
                                        @endforeach
                                        </ul>
                                    </td>
                                    <td>{{ $item->nganh->ten }}</td>
                                    <td>{{ $item->trangThai == 0 ? 'Đang tiến hành' : 'Đã hoàn thành' }}</td>
                                    <td>
                                        @can('nhanxetbaocao-binhluan', $item->id)
                                        <a href="{{ route('nhanxetbaocao.show', ['id' => $item->id]) }}"
                                            class="btn btn-primary">Nhận xét</a>
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
                    {{ $baoCaos->appends(Request::except('page'))->render('pagination::bootstrap-4') }}
                    <div>
                        <a href="{{ route('nhanxetbaocao.index') }}" class="btn btn-primary mx-2">Làm mới</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
    <script src="js/handleBackup.js"></script>
    <script src="js/handleFinishBaoCao.js"></script>
@endsection
