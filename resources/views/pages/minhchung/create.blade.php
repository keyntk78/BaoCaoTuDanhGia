@extends('layouts.index', ['title' => 'Thêm mới minh chứng'])

@php
$controller = (object) [
    'name' => 'Minh chứng',
    'href' => '/minhchung',
];
$action = (object) [
    'name' => 'Thêm mới',
];
@endphp

@section('styles')
    <style>
        .btn-add,
        .btn-remove {
            padding: 0.6rem .75rem;
        }

        .none {
            display: none;
        }

        .show {
            display: block;
        }

    </style>
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
            <form action="{{ route('minhchung.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="ten">Tên minh chứng</label>
                    <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                        name="ten" value="{{ old('ten', '') }}">
                    @if ($errors->has('ten'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ten') }}
                        </div>
                    @endif
                </div>

                <div class="form-group">
                    <label for="ngayKhaoSat">Ngày khảo sát</label>
                    <input type="date" class="form-control {{ $errors->has('ngayKhaoSat') ? 'is-invalid' : '' }}" id="ngayKhaoSat"
                        name="ngayKhaoSat" value="{{ old('ngayKhaoSat', now()->format('Y-m-d')) }}">
                    @if ($errors->has('ngayKhaoSat'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ngayKhaoSat') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="ngayBanHanh">Ngày ban hành</label>
                    <input type="date" class="form-control {{ $errors->has('ngayBanHanh') ? 'is-invalid' : '' }}" id="ngayBanHanh"
                        name="ngayBanHanh" value="{{ old('ngayBanHanh', now()->format('Y-m-d')) }}">
                    @if ($errors->has('ngayBanHanh'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ngayBanHanh') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="noiBanHanh">Nơi ban hành</label>
                    <input type="text" class="form-control {{ $errors->has('noiBanHanh') ? 'is-invalid' : '' }}" id="noiBanHanh"
                        name="noiBanHanh" value="{{ old('noiBanHanh', '') }}">
                    @if ($errors->has('noiBanHanh'))
                        <div class="invalid-feedback">
                            {{ $errors->first('noiBanHanh') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="donVi_id">Đơn vị</label>
                    <select class="form-select form-control {{ $errors->has('donVi_id') ? 'is-invalid' : '' }}"
                        id="donVi_id" name="donVi_id" aria-label="Chọn đơn vị">
                        <option {{ old('donVi_id', '') == '' ? 'selected' : '' }} value="">Chọn đơn vị</option>
                        @foreach ($donVis as $item)
                            <option value="{{ $item->id }}" {{ old('donVi_id', '') == $item->id ? 'selected' : '' }}>{{ $item->ten }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('donVi_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('donVi_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" id="isMCGop" name="isMCGop" {{ old('isMCGop', '') == 'on' ? 'checked' : '' }}>
                    <label class="form-check-label" for="isMCGop">Là minh chứng gộp</label>
                </div>

                <div class="form-group single-minhchung {{ old('isMCGop', '') == 'on' ? 'd-none' : '' }}" >
                    <label for="noiBanHanh">Link url</label>
                    <input type="text" class="form-control {{ $errors->has('link') ? 'is-invalid' : '' }}" id="link"
                           name="link" value="{{ old('link', '') }}">
                    @if ($errors->has('link'))
                        <div class="invalid-feedback">
                            {{ $errors->first('link') }}
                        </div>
                    @endif
                </div>

                <div class="form-group single-minhchung isUrl {{ old('isMCGop', '') == 'on' ? 'd-none' : '' }}">
                    <label for="fileMinhChung">Tệp minh chứng</label>
                    <input type="file" class="form-control {{ $errors->has('fileMinhChung') ? 'is-invalid' : '' }}" id="fileMinhChung"
                        name="fileMinhChung" value="{{ old('fileMinhChung', '') }}">
                    @if ($errors->has('fileMinhChung'))
                        <div class="invalid-feedback">
                            {{ $errors->first('fileMinhChung') }}
                        </div>
                    @endif
                </div>

                <div class="multi-minhchung {{ old('isMCGop', '') != 'on' ? 'd-none' : '' }}">
                    <p class="font-italic">Minh chứng thành phần sẽ được thêm ở mục "Xem chi tiết" sau khi tạo thành công minh chứng.</p>
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).ready(function() {
            $('input#isMCGop').on('click', (e) => {
                if ($(e.currentTarget).prop('checked') === true) {
                    $('.single-minhchung').addClass('d-none');
                    $('.multi-minhchung').removeClass('d-none');
                } else {
                    $('.single-minhchung').removeClass('d-none');
                    $('.multi-minhchung').addClass('d-none');
                }
            })
        })
    </script>
@endsection
