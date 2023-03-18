@extends('layouts.index', ['title' => 'Chi tiết nhóm'])

@php
$controller = (object) [
    'name' => 'Quản lý nhóm',
    'href' => '/quanlynhom',
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
                            <th>Tên ngành:</th>
                            <td>{{ $nhom->nganh->ten }}</td>
                        </tr>
                        <tr>
                            <th>Tên nhóm:</th>
                            <td>{{ $nhom->ten }}</td>
                        </tr>
                        <tr>
                            <th>Quyền:</th>
                            <td>
                                <ul class="pl-3">
                                    @foreach ($nhom->nhomQuyen as $item)
                                        @foreach ($tieuChuans as $tieuChuan)
                                            @if ($item->pivot->tieuChuan_id == $tieuChuan->id)
                                                <li>{{ $item->ten }} cho tiêu chuẩn {{ $tieuChuan->stt }}</li>
                                            @endif
                                        @endforeach
                                    @endforeach
                                </ul>
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
