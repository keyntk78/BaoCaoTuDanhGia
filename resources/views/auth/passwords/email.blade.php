@extends('layouts.app', ['title' => 'Quên mật khẩu', 'password' => true])

@section('content')
<div class="row">
    <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
    <div class="col-lg-6">
        <div class="p-5">
            <div class="text-center">
                <h1 class="h4 text-gray-900 mb-2">Quên mật khẩu?</h1>
                <p class="mb-4">Chỉ cần nhập địa chỉ email của bạn vào bên dưới và chúng tôi sẽ gửi cho bạn một liên kết đến email của bạn để đặt lại mật khẩu của bạn!</p>
            </div>
            @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            <form class="user" method="POST" action="{{ route('password.email') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-user @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" autocomplete="email" autofocus placeholder="Nhập địa chỉ email...">
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <button type="submit" class="btn btn-primary btn-user btn-block">
                    {{ __('Đặt lại mật khẩu') }}
                </button>
                <a class="btn btn-link d-block mx-auto" href="{{ route('login') }}">
                    {{ __('Đăng nhập') }}
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
