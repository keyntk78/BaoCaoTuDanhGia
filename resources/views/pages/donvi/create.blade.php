@extends('layouts.index', ['title' => 'Thêm mới đơn vị'])

@php
$controller = (object) [
    'name' => 'Đơn vị',
    'href' => '/donvi',
];
$action = (object) [
    'name' => 'Thêm mới',
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
            <form action="{{ route('donvi.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="ten">Tên đơn vị</label>
                    <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                        name="ten" value="{{ old('ten', '') }}">
                    @if ($errors->has('ten'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ten') }}
                        </div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection
