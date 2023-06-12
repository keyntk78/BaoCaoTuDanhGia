@extends('layouts.index', ['title' => 'Thêm nhiều người dùng'])

@php
    $controller = (object) [
        'name' => 'Người dùng',
        'href' => '/nguoidung',
    ];
    $action = (object) [
        'name' => 'Thêm nhiều người dùng',
    ];
@endphp

@section('styles')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
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
    <div class="card shadow mb-4 w-50">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            <div>
                <a href="{{ route('nguoidung.export') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                        <span class="text">File mẩu</span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('nguoidung.import') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group isUrl file-minhchung">
                    <label for="file">Tải file (.xlsx)</label>
                    <input type="file" class="form-control {{ $errors->has('file') ? 'is-invalid' : '' }}" id="file"
                           name="file">
                    @if ($errors->has('fileMinhChung'))
                        <div class="invalid-feedback">
                            {{ $errors->first('file') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection

{{--@section('scripts')--}}
{{--    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>--}}
{{--    <script src="js/handleMultipleSelect.js"></script>--}}
{{--    <script>--}}
{{--        $(document).on("click", ".browse", function() {--}}
{{--            var file = $(this).parents().find(".file");--}}
{{--            file.trigger("click");--}}
{{--        });--}}
{{--        $('input[type="file"]').change(function(e) {--}}
{{--            var fileName = e.target.files[0].name;--}}
{{--            $("#file").val(fileName);--}}
{{--            var reader = new FileReader();--}}
{{--            reader.onload = function(e) {--}}
{{--                document.getElementById("preview").src = e.target.result;--}}
{{--                document.getElementById("preview").classList.remove("d-none");--}}
{{--            };--}}
{{--            reader.readAsDataURL(this.files[0]);--}}
{{--        });--}}
{{--    </script>--}}
{{--@endsection--}}
