@extends('layouts.index', ['title' => 'Thêm mới người dùng'])

@php
$controller = (object) [
    'name' => 'Người dùng',
    'href' => '/nguoidung',
];
$action = (object) [
    'name' => 'Thêm mới',
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

@section('content')
    <div class="card shadow mb-4 w-50">
        <div class="card-body">
            <form action="{{ route('nguoidung.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="hoTen">Họ tên người dùng</label>
                    <input type="text" class="form-control {{ $errors->has('hoTen') ? 'is-invalid' : '' }}" id="hoTen"
                        name="hoTen" value="{{ old('hoTen', '') }}">
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
                                {{ old('gioiTinh', '') == '' || old('gioiTinh', '') == '1' ? 'checked' : '' }}>
                            <span class="form-check-label">Nam</span>
                        </div>
                        <div class="form-check ml-2">
                            <input class="form-check-input" type="radio" name="gioiTinh" value="0"
                                {{ old('gioiTinh', '') == '0' ? 'checked' : '' }}>
                            <span class="form-check-label">Nữ</span>
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label for="ngaySinh">Ngày sinh</label>
                    <input type="date" class="form-control {{ $errors->has('ngaySinh') ? 'is-invalid' : '' }}"
                        id="ngaySinh" name="ngaySinh" value="{{ old('ngaySinh', '') }}">
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
                        <img src="" id="preview" class="img-thumbnail d-none">
                    </div>
                </div>
                <div class="form-group">
                    <label for="chucVu">Chức vụ</label>
                    <input type="text" class="form-control {{ $errors->has('chucVu') ? 'is-invalid' : '' }}" id="chucVu"
                        name="chucVu" value="{{ old('chucVu', '') }}">
                    @if ($errors->has('chucVu'))
                        <div class="invalid-feedback">
                            {{ $errors->first('chucVu') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control {{ $errors->has('email') ? 'is-invalid' : '' }}" id="email"
                        name="email" value="{{ old('email', '') }}">
                    @if ($errors->has('email'))
                        <div class="invalid-feedback">
                            {{ $errors->first('email') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="sdt">Số điện thoại</label>
                    <input type="text" class="form-control {{ $errors->has('sdt') ? 'is-invalid' : '' }}" id="sdt"
                        name="sdt" value="{{ old('sdt', '') }}">
                    @if ($errors->has('sdt'))
                        <div class="invalid-feedback">
                            {{ $errors->first('sdt') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password">Mật khẩu</label>
                    <input type="password" class="form-control {{ $errors->has('password') ? 'is-invalid' : '' }}"
                        id="password" name="password" value="{{ old('password', '') }}">
                    @if ($errors->has('password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="password_confirmation">Nhập lại mật khẩu</label>
                    <input type="password"
                        class="form-control {{ $errors->has('password_confirmation') ? 'is-invalid' : '' }}"
                        id="password_confirmation" name="password_confirmation"
                        value="{{ old('password_confirmation', '') }}">
                    @if ($errors->has('password_confirmation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('password_confirmation') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="donVi_id">Đơn vị</label>
                    <select class="form-select form-control {{ $errors->has('donVi_id') ? 'is-invalid' : '' }}"
                        id="donVi_id" name="donVi_id" aria-label="Chọn đơn vị">
                        <option {{ old('donVi_id', '') == '' ? 'selected' : '' }}>Chọn đơn vị</option>
                        @foreach ($donVis as $item)
                            <option value="{{ $item->id }}"
                                {{ old('donVi_id', '') == $item->id ? 'selected' : '' }}>
                                {{ $item->ten }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('donVi_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('donVi_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="vaiTroHT">Vai trò hệ thống</label>
                    <select class="form-control tags-select-only" multiple="multiple" name="vaiTroHT[]">
                        @php $vaiTroHTIds = old('vaiTroHT', '') != '' ? old('vaiTroHT', '') : [] @endphp
                        @foreach ($vaiTroHTs as $item)
                            <option value="{{ $item->id }}" {{ in_array($item->id, $vaiTroHTIds) ? 'selected' : '' }}>
                                {{ $item->ten }}</option>
                        @endforeach
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="js/handleMultipleSelect.js"></script>
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
