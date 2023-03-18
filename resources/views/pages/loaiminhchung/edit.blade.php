@extends('layouts.index', ['title' => 'Chỉnh sửa loại minh chứng'])

@php
    $controller = (object) [
        'name' => 'Loại minh chứng',
        'href' => '/loaiminhchung',
    ];
    $action = (object) [
        'name' => 'Chỉnh sửa',
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
            <form action="{{ route('loaiminhchung.update', ['id' => $loaiMinhChung->id]) }}" method="POST">
                @csrf
                <div class="form-row">
                    <div class="form-group col-md-12">
                        <label for="ten">Tên loại minh chứng</label>
                        <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                               name="ten" value="{{ old('ten', $loaiMinhChung->ten) }}">
                        @if ($errors->has('ten'))
                            <div class="invalid-feedback">
                                {{ $errors->first('ten') }}
                            </div>
                        @endif
                    </div>
                </div>
                <button type="submit" class="btn btn-primary">Lưu</button>
            </form>
        </div>
    </div>
@endsection
