@extends('layouts.index', ['title' => 'Danh sách minh chứng thành phần'])

@php
$controller = (object) [
    'name' => 'Minh chứng',
    'href' => '/minhchung',
];
$action = (object) [
    'name' => 'Danh sách minh chứng thành phần',
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
            <form action="{{ route('minhchungthanhphan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="minhChung_id" value={{$minhChung->id}}>
                <div class="form-group">
                    <label for="ten">Tên minh chứng thành phần</label>
                    <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                        name="ten" value="{{ old('ten', '') }}">
                    @if ($errors->has('ten'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ten') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="fileMinhChung">Tệp minh chứng thành phần</label>
                    <input type="file" class="form-control {{ $errors->has('fileMinhChung') ? 'is-invalid' : '' }}"
                        id="fileMinhChung" name="fileMinhChung" value="{{ old('fileMinhChung', '') }}">
                    @if ($errors->has('fileMinhChung'))
                        <div class="invalid-feedback">
                            {{ $errors->first('fileMinhChung') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Thêm</button>
            </form>
        </div>
    </div>
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <h6 class="m-0 font-weight-bold text-uppercase">Minh chứng: {{ $minhChung->ten }}</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>STT</th>
                            <th>Tên minh chứng thành phần</th>
                            <th>File</th>
                            <th>Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if (count($minhChung->cTMinhChung) > 0)
                            @foreach ($minhChung->cTMinhChung as $key => $item)
                                <tr>
                                    <td>{{ $key + 1 }}</td>
                                    <td><a href="{{ $item->link }}">{{ $item->ten }}</a></td>
                                    <td>{{ $item->link }}</td>
                                    <td>
                                        <a href="#" class="btn btn-danger btn-delete"
                                            data-url="{{ route('minhchungthanhphan.destroy') }}"
                                            data-id="{{ $item->id }}">Xóa</a>
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
