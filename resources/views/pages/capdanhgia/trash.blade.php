@extends('layouts.index', ['title' => 'Thùng rác cấp đánh giá'])

@php
$controller = (object) [
    'name' => 'Cấp đánh giá',
    'href' => '/capdanhgia',
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
        @if (count($capDanhGias) > 0)
            <div class="trash-action card-header py-3 d-flex flex-row align-items-center">
                <a href="#" class="btn btn-primary btn-icon-split btn-restore-all mr-3"
                    data-url="{{ route('capdanhgia.restore-all') }}"
                    data-redirect="{{ route('capdanhgia.index') }}">
                    <span class="icon text-white-50">
                        <i class="fas fa-undo"></i>
                    </span>
                    <span class="text">Phục hồi tất cả</span>
                </a>
                <a href="#" class="btn btn-danger btn-icon-split btn-force-delete-all"
                    data-url="{{ route('capdanhgia.force-destroy-all') }}"
                    data-redirect="{{ route('capdanhgia.index') }}">
                    <span class="icon text-white-50">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="text">Xóa tất cả</span>
                </a>
            </div>
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên cấp đánh giá</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($capDanhGias) > 0)
                            @foreach ($capDanhGias as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->ten }}</td>
                                    <td>
                                        <a href="#" class="btn btn-primary btn-restore"
                                            data-url="{{ route('capdanhgia.restore') }}" data-id="{{ $item->id }}">Phục
                                            hồi</a>
                                        <a href="#" class="btn btn-danger btn-force-delete"
                                            data-url="{{ route('capdanhgia.force-destroy') }}"
                                            data-id="{{ $item->id }}">Xóa vĩnh viễn</a>
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
                {{ $capDanhGias->render('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
    <script src="js/handleRestore.js"></script>
@endsection
