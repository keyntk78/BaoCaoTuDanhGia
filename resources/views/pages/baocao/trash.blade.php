@extends('layouts.index', ['title' => 'Thùng rác - Báo cáo'])

@php
$controller = (object) [
    'name' => 'Báo cáo',
    'href' => '/baocao',
];
$action = (object) [
    'name' => 'Thùng rác',
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
        @if (count($baoCaos) > 0)
            <div class="trash-action card-header py-3 d-flex flex-row align-items-center">
                @can('baocao-thungrac')
                <a href="#" class="btn btn-primary btn-icon-split btn-restore-all mr-3"
                    data-url="{{ route('baocao.restore-all') }}"
                    data-redirect="{{ route('baocao.index') }}">
                    <span class="icon text-white-50">
                        <i class="fas fa-undo"></i>
                    </span>
                    <span class="text">Phục hồi tất cả</span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-force-delete-all"
                    data-url="{{ route('baocao.force-destroy-all') }}"
                    data-redirect="{{ route('baocao.index') }}">
                    <span class="icon text-white-50">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="text">Xóa tất cả</span>
                </a>
                @endcan
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Thời gian cập nhật</th>
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
                                        @can('baocao-xoa', $item->id)
                                        <a href="#" class="btn btn-primary btn-restore"
                                            data-url="{{ route('baocao.restore', ['id' => $item->id]) }}" data-id="{{ $item->id }}">Phục
                                            hồi</a>
                                        <a href="#" class="btn btn-danger btn-force-delete"
                                            data-url="{{ route('baocao.force-destroy', ['id' => $item->id]) }}"
                                            data-id="{{ $item->id }}">Xóa vĩnh viễn</a>
                                        @endcan
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr>
                                <td colspan="999" class="text-center">Thùng rác trống!</td>
                            </tr>
                        @endif
                    </tbody>
                </table>
                {{ $baoCaos->render('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
    <script src="js/handleRestore.js"></script>
@endsection
