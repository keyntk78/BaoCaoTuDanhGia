@extends('layouts.index', ['title' => 'Thông tin cá nhân'])

@php
$controller = (object) [
    'name' => 'Thông tin cá nhân',
    'href' => '/thongtincanhan',
];
$action = (object) [
    'name' => 'Chỉnh sửa',
];
$user = optional(auth()->user());
@endphp

@section('breadcrumb')
    @include('partials.breadcrumb', compact('controller', 'action'))
@endsection

@section('page-heading')
    @include('partials.page-heading', compact('controller', 'action'))
@endsection

@section('content')
    <div class="card shadow mb-4 w-50">
        <div class="card-body">
            <form action="{{ route('thongtincanhan.update') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="hoTen">Họ tên người dùng</label>
                    <input type="text" class="form-control {{ $errors->has('hoTen') ? 'is-invalid' : '' }}" id="hoTen"
                        name="hoTen" value="{{ old('hoTen', $user->hoTen) }}">
                    @if ($errors->has('hoTen'))
                        <div class="invalid-feedback">
                            {{ $errors->first('hoTen') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <span for="gioiTinh">Giới tính</span>
                    <div class="form-row pl-2">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="gioiTinh" value="1"
                                {{ old('gioiTinh', $user->gioiTinh) == '' || old('gioiTinh', $user->gioiTinh) == '1' ? 'checked' : '' }}>
                            <span class="form-check-label">Nam</span>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="gioiTinh" value="0"
                                {{ old('gioiTinh', $user->gioiTinh) == '2' ? 'checked' : '' }}>
                            <span class="form-check-label">Nữ</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ngaySinh">Ngày sinh</label>
                    <input type="date" class="form-control {{ $errors->has('ngaySinh') ? 'is-invalid' : '' }}"
                        id="ngaySinh" name="ngaySinh" value="{{ old('ngaySinh', $user->ngaySinh) }}">
                    @if ($errors->has('ngaySinh'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ngaySinh') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="file">Ảnh đại diện</label>
                    <input type="file" name="hinhAnh" class="file" accept="image/*" hidden>
                    <div class="input-group">
                        <input type="text" class="form-control" disabled placeholder="Chọn ảnh đại diện" id="file">
                        <div class="input-group-append">
                            <button type="button" class="browse btn btn-primary">Tải lên...</button>
                        </div>
                    </div>
                    <div class="mt-2 mx-auto col-sm-6">
                        <img src="{{ $user->hinhAnh }}" id="preview" class="img-thumbnail {{ !empty($user->hinhAnh) ? '' : 'd-none'}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" id="email"
                        name="email" value="{{ old('email', $user->email) }}" readonly>
                </div>
                <div class="form-group">
                    <label for="sdt">Số điện thoại</label>
                    <input type="text" class="form-control {{ $errors->has('sdt') ? 'is-invalid' : '' }}" id="sdt"
                        name="sdt" value="{{ old('sdt', $user->sdt) }}">
                    @if ($errors->has('sdt'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sdt') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        $(document).on("click", ".browse", function() {
            var file = $(this).parents().find(".file");
            file.trigger("click");
        });
        $('input[type="file"]').change(function(e) {
            var fileName = e.target.files[0].name;
            $("#file").val(fileName);
            var reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById("preview").src = e.target.result;
                document.getElementById("preview").classList.remove("d-none");
            };
            reader.readAsDataURL(this.files[0]);
        });
    </script>
@endsection
