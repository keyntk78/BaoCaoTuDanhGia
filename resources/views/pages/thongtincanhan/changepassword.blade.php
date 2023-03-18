@extends('layouts.index', ['title' => 'Đổi mật khẩu'])

@php
$controller = (object) [
    'name' => 'Thông tin cá nhân',
    'href' => '/thongtincanhan',
];
$action = (object) [
    'name' => 'Đổi mật khẩu',
];
$user = optional(auth()->user());
$old_password = Session::has('old_password') ? Session::get('old_password') : '';
$new_password = Session::has('new_password') ? Session::get('new_password') : '';
$new_password_confirmation = Session::has('new_password_confirmation') ? Session::get('new_password_confirmation') : '';
@endphp

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
        <div class="card-body">
            <form action="{{ route('thongtincanhan.savepassword') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="old_password">Mật khẩu cũ</label>
                    <input type="password" class="form-control {{ $errors->has('old_password') ? 'is-invalid' : '' }}"
                        id="old_password" name="old_password" value="{{ old('old_password', $old_password) }}">
                    @if ($errors->has('old_password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('old_password') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="new_password">Mật khẩu cũ</label>
                    <input type="password" class="form-control {{ $errors->has('new_password') ? 'is-invalid' : '' }}"
                        id="new_password" name="new_password" value="{{ old('new_password', $new_password) }}">
                    @if ($errors->has('new_password'))
                        <div class="invalid-feedback">
                            {{ $errors->first('new_password') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="new_password_confirmation">Nhập lại mật khẩu mới</label>
                    <input type="password"
                        class="form-control {{ $errors->has('new_password_confirmation') ? 'is-invalid' : '' }}"
                        id="new_password_confirmation" name="new_password_confirmation"
                        value="{{ old('new_password_confirmation', $new_password_confirmation) }}">
                    @if ($errors->has('new_password_confirmation'))
                        <div class="invalid-feedback">
                            {{ $errors->first('new_password_confirmation') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection
