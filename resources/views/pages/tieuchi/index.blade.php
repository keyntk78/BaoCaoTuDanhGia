@extends('layouts.index', ['title' => 'Danh sách tiêu chí'])

@php
$controller = (object) [
    'name' => 'Tiêu chí',
    'href' => '/tieuchi',
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
            <form action="{{ route('tieuchi.index') }}" method="GET">
                <div class="form-row">
                    <div class="form-group col-md-2">
                        <label for="stt">Tiêu chí số</label>
                        <input type="number" class="form-control {{ $errors->has('stt') ? 'is-invalid' : '' }}" id="stt"
                            name="stt" value="{{ $filterStt }}">
                    </div>
                    <div class="form-group col-md-10">
                        <label for="ten">Tên tiêu chí</label>
                        <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                            name="ten" value="{{ $filterTen }}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="tieuChuan_id">Bộ Tiêu chuẩn</label>
                    <select class="form-select form-control {{ $errors->has('boTieuChuan_id') ? 'is-invalid' : '' }}"
                            id="boTieuChuan_id" name="boTieuChuan_id" aria-label="Chọn bộ tiêu chuẩn">
                        <option {{ $filterBoTieuChuanId == '' ? 'selected' : '' }} value="0">Chọn bộ tiêu chuẩn</option>
                        @foreach ($boTieuChuans as $item)
                            <option value="{{ $item->id }}" {{ $filterBoTieuChuanId == $item->id ? 'selected' : '' }}>
                                 {{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="tieuChuan_id">Tiêu chuẩn</label>
                    <select class="form-select form-control {{ $errors->has('tieuChuan_id') ? 'is-invalid' : '' }}"
                        id="tieuChuan_id" name="tieuChuan_id" disabled aria-label="Chọn tiêu chuẩn">
                        @if(!empty($filterTieuChuanId)){
                         <option value="{{$tieuChuan['id']}}">
                                 Tiêu chuẩn số {{$tieuChuan['stt']}} : {{$tieuChuan['ten']}} </option>
                        }@else
                            <option value="0" selected>Chọn tiêu chuẩn</option>
                        @endif
                    </select>
                </div>
                <div class="form-group d-flex justify-content-center">
                    <button type="submit" class="btn btn-primary mx-2">Tìm kiếm</button>
                    <a href="{{ route('tieuchi.index') }}" class="btn btn-secondary mx-2">Làm mới</a>
                </div>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            @can('tieuchi-them')
                <a href="{{ route('tieuchi.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                    <span class="text">Thêm mới</span>
                </a>
            @endcan
            @can('tieuchi-xoa')
                <a href="{{ route('tieuchi.trash') }}" class="btn btn-dark btn-icon-split">
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
                        <tr align="center">
                            <th>Tiêu chí</th>
                            <th>@sortablelink('ten', 'Tên tiêu chí')</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($tieuChis) > 0)
                            @foreach ($tieuChis as $item)
                                <tr>
                                    <td width="120" align="center">{{ $item->tieuchuan->stt }}.{{ $item->stt }}</td>
                                    <td>{!! \App\Filters\HighLightKeyword::addStrongTag($item->ten, $filterTen) !!}</td>
                                    <td width="300">
                                        @can('tieuchi-chitiet')
                                            <a href="{{ route('tieuchi.show', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Xem chi tiết</a>
                                        @endcan
                                        @can('tieuchi-sua')
                                            <a href="{{ route('tieuchi.edit', ['id' => $item->id]) }}"
                                                class="btn btn-secondary">Sửa</a>
                                        @endcan
                                        @can('tieuchi-xoa')
                                            <a href="#" class="btn btn-danger btn-delete"
                                                data-url="{{ route('tieuchi.destroy') }}"
                                                data-id="{{ $item->id }}">Xóa</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                @if (!empty($filterStt) || !empty($filterTen) || !empty($filterTieuChuanId))
                                    <td colspan="999" class="text-center">Không có bản ghi nào phù hợp với bộ tìm kiếm!
                                    </td>
                                @else
                                    <td colspan="999" class="text-center">Chưa có bản ghi nào!</td>
                                @endif
                            </tr>
                        @endif
                    </tbody>
                </table>
                <div class="d-flex justify-content-between">
                    {{ $tieuChis->appends(Request::except('page'))->render('pagination::bootstrap-4') }}
                    <div>
                        <a href="{{ route('tieuchi.index') }}" class="btn btn-primary mx-2">Làm mới</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
{{--    <script src="js/handleSelectBoTieuChuanToTieuChuan.js"></script>--}}
    <script src="js/handleDaTaSelectTieuChuan.js"></script>
@endsection
