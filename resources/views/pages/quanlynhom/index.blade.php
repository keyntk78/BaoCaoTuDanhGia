@extends('layouts.index', ['title' => 'Quản lý nhóm'])

@php
$controller = (object) [
    'name' => 'Quản lý nhóm',
    'href' => '/quanlynhom',
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
    <div class="card shadow mb-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên nhóm</th>
                            <th>Ngành</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($nhoms) > 0)
                            @foreach ($nhoms as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td>{{ $item->ten }}</td>
                                    <td>{{ $item->nganh->ten }}</td>
                                    <td>
                                        <a href="{{ route('quanlynhom.show', ['id' => $item->nhom_id]) }}"
                                            class="btn btn-primary">Xem chi tiết</a>
                                        <a href="{{ route('quanlynhom.member', ['id' => $item->nhom_id]) }}"
                                            class="btn btn-secondary">Quản lý TV</a>
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
