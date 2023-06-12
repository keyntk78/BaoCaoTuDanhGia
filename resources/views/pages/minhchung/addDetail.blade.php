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
                <div class="form-group single-minhchung {{ old('isMCGop', '') == 'on' ? 'd-none' : '' }}">
                    <label for="isFileOrUrl">Nguồi minh chứng</label>
                    <select class="form-select form-control {{ $errors->has('isFileOrUrl') ? 'is-invalid' : '' }}"
                            id="isFileOrUrl" name="isFileOrUrl" aria-label="Chọn nguồn minh chứng">
                        <option  value="">Chọn nguồn minhh chứng</option>
                        <option value="1">Đường dẫn minh chứng</option>
                        <option value="2">Tệp minh chứng</option>
                    </select>
                    @if ($errors->has('isFileOrUrl'))
                        <div class="invalid-feedback">
                            {{ $errors->first('isFileOrUrl') }}
                        </div>
                    @endif
                </div>

                <div class="form-group link-url d-none" >
                    <label for="noiBanHanh">Link url</label>
                    <input type="text" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" id="link"
                           name="link" value="">
                    @if ($errors->has('link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('link') }}
                        </div>
                    @endif
                </div>

                <div class="form-group isUrl file-minhchung d-none ">
                    <label for="fileMinhChung">Tệp minh chứng</label>
                    <input type="file" class="form-control {{ $errors->has('fileMinhChung') ? 'is-invalid' : '' }}" id="fileMinhChung"
                           name="fileMinhChung">
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
                                    <td>
                                        @if($item->isUrl == 0)
                                            <a href="{{ route('minhchung.download', ['file_name'=> $item->link]) }}">{{ $item->ten }}</a>
                                        @else
                                            <a href="{{  $item->link }}">{{ $item->ten }}</a>
                                        @endif

                                    </td>
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
    <script>
        $(document).ready(function() {
            $('#isFileOrUrl').on('change', (e) => {
                if ($(e.currentTarget).val() === '') {
                    $('.link-url').addClass('d-none');
                    $('.file-minhchung').addClass('d-none');

                }
                if($(e.currentTarget).val() === '1'){
                    $('.link-url').removeClass('d-none');
                    $('.file-minhchung').addClass('d-none');

                }
                if($(e.currentTarget).val() === '2') {
                    $('.file-minhchung').removeClass('d-none');
                    $('.link-url').addClass('d-none');
                }
            })

        })
    </script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
@endsection
