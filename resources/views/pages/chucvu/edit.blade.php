@extends('layouts.index', ['title' => 'Chỉnh sửa chức vụ'])

@php
    $controller = (object) [
        'name' => 'Chức vụ',
        'href' => '/chucvu',
    ];
    $action = (object) [
        'name' => 'Chức vụ',
    ];
@endphp

@section('breadcrumb')
    @include('partials.breadcrumb', compact('controller', 'action'))
@endsection

@section('page-heading')
    @include('partials.page-heading', compact('controller', 'action'))
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('chucvu.update', ['id' => $chucVu->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="ten">Tên chức vụ</label>
                    <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                           name="ten" value="{{ old('ten', $chucVu->ten) }}">
                    @if ($errors->has('ten'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ten') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection
