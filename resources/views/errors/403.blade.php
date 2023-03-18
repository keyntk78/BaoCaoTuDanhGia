@extends('layouts.index', ['title' => '403 - Forbidden'])

@section('content')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- 403 Error Text -->
    <div class="text-center">
        <div class="error mx-auto" data-text="403">403</div>
        <p class="lead text-gray-800 mb-5">Bạn không có quyền truy cập</p>
        <p class="text-gray-500 mb-0">Có vẻ như bạn đang cố gắng truy cập vào chức năng mình không được cấp quyền...</p>
        <a href="/">&larr; Trở lại trang chủ</a>
    </div>

</div>
<!-- /.container-fluid -->
@endsection
