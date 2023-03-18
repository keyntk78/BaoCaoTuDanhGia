@extends('layouts.index', ['title' => 'Chỉnh sửa người dùng'])

@php
$controller = (object) [
    'name' => 'Người dùng',
    'href' => '/nguoidung',
];
$action = (object) [
    'name' => 'Chỉnh sửa',
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
            <form action="{{ route('nguoidung.update', ['id' => $user->id]) }}" method="POST">
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
                                {{ old('gioiTinh', $user->gioiTinh) == '0' ? 'checked' : '' }}>
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
                    <label for="chucVu">Chức vụ</label>
                    <input type="text" class="form-control {{ $errors->has('chucVu') ? 'is-invalid' : '' }}" id="chucVu"
                        name="chucVu" value="{{ old('chucVu', $user->chucVu) }}">
                    @if ($errors->has('chucVu'))
                        <div class="invalid-feedback">
                            {{ $errors->first('chucVu') }}
                        </div>
                    @endif
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
                <div class="form-group">
                    <label for="donVi_id">Đơn vị</label>
                    <select class="form-select form-control {{ $errors->has('donVi_id') ? 'is-invalid' : '' }}"
                        id="donVi_id" name="donVi_id" aria-label="Chọn đơn vị">
                        <option {{ old('donVi_id', $user->donVi_id) == '' ? 'selected' : '' }}>Chọn đơn vị</option>
                        @foreach ($donVis as $item)
                            <option value="{{ $item->id }}"
                                {{ old('donVi_id', $user->donVi_id) == $item->id ? 'selected' : '' }}>
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
                    <select class="form-control tags-select"
                        multiple="multiple" name="vaiTroHT[]">
                        @php
                            $vaiTroHTIds = [];
                            foreach ($user->vaiTroHT as $item) {
                                $vaiTroHTIds[] = $item->id;
                            }
                            $vaiTroHT = old('vaiTroHT', $vaiTroHTIds) != '' ? old('vaiTroHT', $vaiTroHTIds) : [];
                        @endphp
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
@endsection
