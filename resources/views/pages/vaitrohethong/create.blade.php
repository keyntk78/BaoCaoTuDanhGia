@extends('layouts.index', ['title' => 'Thêm mới vai trò hệ thống'])

@php
$controller = (object) [
    'name' => 'Vai trò hệ thống',
    'href' => '/vaitrohethong',
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
    <div class="card shadow mb-4">
        <div class="card-body">
            <form action="{{ route('vaitrohethong.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="ten">Tên vai trò hệ thống</label>
                    <input type="text" class="form-control {{ $errors->has('ten') ? 'is-invalid' : '' }}" id="ten"
                        name="ten" value="{{ old('ten', '') }}">
                    @if ($errors->has('ten'))
                        <div class="invalid-feedback">
                            {{ $errors->first('ten') }}
                        </div>
                    @endif
                </div>
                <p>Phân quyền</p>
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12 px-0">
                            <label>
                                <input type="checkbox" class="checkall">
                                Chọn tất cả
                            </label>
                        </div>
                        @foreach($parentQuyenHTs as $item)
                            @if ($item->slug !== 'quan-ly-tien-do-bao-cao')
                            <div class="card border-primary mb-3 col-md-12 p-0">
                                <div class="card-header">
                                    <label>
                                        <input type="checkbox" value="" class="checkbox_wrapper">
                                        {{ $item->ten }}
                                    </label>
                                </div>
                                <div class="row px-3">
                                    @foreach($item->childQuyenHT as $childItem)
                                        <div class="card-body text-primary col-md-4 py-2 px-3">
                                            <p class="card-title mb-0">
                                                <label>
                                                    <input type="checkbox" name="quyenHT[]"
                                                        class="checkbox_childrent"
                                                        value="{{ $childItem->id }}">
                                                    {{ $childItem->ten }}
                                                </label>
                                            </p>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                            @else
                                <div class="card border-primary mb-3 col-md-12 p-0">
                                    <div class="card-header">
                                        <label>
                                            <input type="checkbox" name="quyenHT[]" value="{{ $item->id }}" class="checkbox_wrapper">
                                            {{ $item->ten }}
                                        </label>
                                    </div>
                                </div>
                            @endif
                        @endforeach
                    </div>
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
        $(document).ready(function() {
            function checkAllCheckboxWrapperChecked() {
                $checkAll = $('.checkall');
                $checkboxWrapper = $('.checkbox_wrapper');
                $checkboxWrapperChecked = $('.checkbox_wrapper').filter(':checked');
                if ($checkboxWrapper.length !== $checkboxWrapperChecked .length) {
                    $checkAll.prop('checked', false);
                } else {
                    $checkAll.prop('checked', true);
                }
            }
            $('.checkbox_wrapper').on('click', (e) => {
                $checkboxChildrent = $(e.currentTarget).parent().closest('.card').find('.checkbox_childrent');
                $checkboxChildrent.prop('checked', $(e.currentTarget).prop('checked'));
                checkAllCheckboxWrapperChecked();
            });

            $('.checkbox_childrent').on('click', (e) => {
                $checkAll = $('.checkall');
                $checkboxWrapper = $(e.currentTarget).parent().closest('.card').find('.checkbox_wrapper');
                $checkboxChildrent = $(e.currentTarget).parent().closest('.card').find('.checkbox_childrent');
                $checkboxChildrentChecked = $(e.currentTarget).parent().closest('.card').find('.checkbox_childrent').filter(':checked');
                if ($checkboxChildrent.length !== $checkboxChildrentChecked .length) {
                    $checkAll.prop('checked', false);
                    $checkboxWrapper.prop('checked', false);
                } else {
                    $checkboxWrapper.prop('checked', true);
                }
                checkAllCheckboxWrapperChecked();
            });

            $('.checkall').on('click', (e) => {
                $(e.currentTarget).parents().find('.checkbox_childrent').prop('checked', $(e.currentTarget).prop('checked'));
                $(e.currentTarget).parents().find('.checkbox_wrapper').prop('checked', $(e.currentTarget).prop('checked'));
            });
        })
    </script>
@endsection
