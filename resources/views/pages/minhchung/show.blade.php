@extends('layouts.index', ['title' => 'Chi tiết minh chứng'])

@php
$controller = (object) [
    'name' => 'Minh chứng',
    'href' => '/minhchung',
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
        @if ($minhChung->isMCGop)
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                @can('minhchung-them')
                    <a href="{{ route('minhchung.add-detail', ['id' => $minhChung->id] ) }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                        <span class="text">Quản lý MCTP</span>
                    </a>
                @endcan
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <tbody>
                        <tr>
                            <th>Tên minh chứng:</th>
                            <td>{{ $minhChung->ten }}</td>
                        </tr>
                        <tr>
                            <th>Ngày khảo sát:</th>
                            <td>{{ date("d-m-Y", strtotime($minhChung->ngayKhaoSat)) }}</td>
                        </tr>
                        <tr>
                            <th>Ngày ban hành:</th>
                            <td>{{ date("d-m-Y", strtotime($minhChung->ngayBanHanh)) }}</td>
                        </tr>
                        <tr>
                            <th>Nơi ban hành:</th>
                            <td>{{ $minhChung->noiBanHanh }}</td>
                        </tr>
                        <tr>
                            <th>Đơn vị:</th>
                            <td>{{ $minhChung->donVi->ten }}</td>
                        </tr>
{{--                        <tr>--}}
{{--                            <th>Loại minh chứng:</th>--}}
{{--                            <td>{{ $minhChung->loaiMinhChung->ten }}</td>--}}
{{--                        </tr>--}}
                        @if ($minhChung->isMCGop)
                        <tr>
                            <th>Minh chứng thành phần:</th>
                            <td>
                                <ul class="pl-3">
                                    @foreach ($minhChung->cTMinhChung as $item)
                                        <li><a href="{{ $item->link }}">{{ $item->ten }}</a></li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        @else
                        <tr>
                            <th>Link minh chứng:</th>
                            <td><a href="{{ $minhChung->link }}">{{ $minhChung->ten }}</a></td>
                        </tr>
                        @endif
                        <tr>
                            <th>Chức năng:</th>
                            <td>
                                @can('minhchung-sua')
                                <a href="{{ route('minhchung.edit', ['id' => $minhChung->id]) }}"
                                    class="btn btn-secondary">Sửa</a>
                                @endcan
                                @can('minhchung-xoa')
                                <a href="#" class="btn btn-danger btn-delete" data-url="{{ route('minhchung.destroy') }}"
                                    data-id="{{ $minhChung->id }}" data-redirect="{{ route('minhchung.index') }}">Xóa</a>
                                @endcan
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
