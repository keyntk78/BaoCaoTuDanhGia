@extends('layouts.index', ['title' => 'Chi tiết đợt đánh giá'])

@php
$controller = (object) [
    'name' => 'Đợt đánh giá',
    'href' => '/dotdanhgia',
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
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Tên đợt đánh giá:</th>
                            <td colspan="3">{{ $dotDanhGia->ten }}</td>
                        </tr>
                        <tr>
                            <th>Giai đoạn</th>
                            <td colspan="3">{{ $dotDanhGia->giaiDoan }}</td>
                        </tr>
                        <tr>
                            <th>Năm đánh giá:</th>
                            <td colspan="3">{{ $dotDanhGia->namHoc }}</td>
                        </tr>
                        <tr>
                            <th>Ngành:</th>
                            <td colspan="3">
                                <ul class="pl-3">
                                    @foreach ($dotDanhGia->nganh as $item)
                                        <li>{{ $item->ten }}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Các giai đoạn:</th>
                            <th>Hoạt động</th>
                            <th>Ngày bắt đầu</th>
                            <th>Ngày kết thúc</th>
                        </tr>
                        @foreach ($dotDanhGia->hoatDong as $item)
                            <tr>
                                <td></td>
                                <td>{{ $item->ten }}</td>
                                <td>{{ date("d-m-Y H:i", strtotime($item->pivot->ngayBD)) }}</td>
                                <td>{{ date("d-m-Y H:i", strtotime($item->pivot->ngayKT)) }}</td>
                            </tr>
                        @endforeach
                        <tr>
                            <th>Chức năng:</th>
                            <td colspan="3">
                                @if ($dotDanhGia->trangThai == 0)
                                @can('dotdanhgia-sua', $dotDanhGia->id)
                                <a href="{{ route('dotdanhgia.edit', ['id' => $dotDanhGia->id]) }}"
                                    class="btn btn-secondary">Sửa</a>
                                @endcan
                                @can('dotdanhgia-xoa')
                                <a href="#" class="btn btn-danger btn-delete" data-url="{{ route('dotdanhgia.destroy') }}"
                                    data-id="{{ $dotDanhGia->id }}"
                                    data-redirect="{{ route('dotdanhgia.index') }}">Xóa</a>
                                @endcan
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row">
        @foreach ($nganhCongKhais as $item)
        <div class="col-xl-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="h5 mb-0 font-weight-bold text-gray-800 text-uppercase">{{ $item->tenNganh }}</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                        @foreach($item->tieuChuans as $childItem)
                        <div class="col-12">
                            <hr class="divider">
                            <div class="text-md font-weight-bold text-primary mb-1">
                                Tiêu chuẩn {{ $childItem->stt }}
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="small font-weight-bold">Tiến độ<span class="float-right">{{ $childItem->tienDo }}%</span></h4>
                                    <div class="progress">
                                        <div class="progress-bar {{ $childItem->tienDo == 100 ? 'bg-success' : 'bg-primary' }}" role="progressbar" style="width: {{ $childItem->tienDo }}%"
                                            aria-valuenow="{{ $childItem->tienDo }}" aria-valuemin="0" aria-valuemax="{{ $childItem->tienDo }}"></div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <h4 class="small font-weight-bold">Số tiêu chí đạt ({{ $childItem->soTCDat }}/{{ $childItem->tongSoTC }})</h4>
                                    <div class="progress">
                                        <div class="progress-bar {{ $childItem->per == 100 ? 'bg-success' : 'bg-primary' }}" role="progressbar" style="width: {{ $childItem->per }}%"
                                            aria-valuenow="{{ $childItem->per }}" aria-valuemin="0" aria-valuemax="{{ $childItem->per }}"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        <div class="col-12">
                            <hr class="divider">
                            <div class="text-right">
                                <a href="{{ route('dotdanhgia.showbaocao', ['dotDanhGia_id' => $item->dotDanhGia_id, 'nganh_id' => $item->nganh_id]) }}" class="btn btn-primary">Xem chi tiết</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
@endsection
