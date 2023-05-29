@extends('layouts.index', ['title' => 'Báo cáo giữa kỳ'])
@php
    $controller = (object) [
        'name' => 'Báo cáo giữa kỳ',
        'href' => '/baocaogiuaky',
    ];
    $action = (object) [
        'name' => 'Danh sách',
    ];
@endphp

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
@endsection

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


@section('message')
    @include('partials.message', [
        'message' => Session::has('message') ? Session::get('message') : null,
    ])
@endsection

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
            @can('baocaogk-them')
                <div>
                    <a href="{{ route('baocaogiuaky.create') }}" class="btn btn-primary btn-icon-split">
                    <span class="icon text-white-50">
                        <i class="fas fa-plus"></i>
                    </span>
                        <span class="text">Thêm mới</span>
                    </a>

                    <a href="{{route('baocaogiuaky.create-permission')}}" class="btn btn-info btn-icon-split ml-2">
                        <span class="text">Phân Công</span>
                    </a>
                </div>
            @endcan
            @can('baocaogk-xoa')
                    <a href="{{ route('baocaogiuaky.trash') }}" class="btn btn-dark btn-icon-split">
                <span class="icon text-white-50">
                    <i class="fas fa-trash"></i>
                </span>
                        <span class="text">Thùng rác
                    <span class="trash-count">{{ $trashCount > 0 ? '(' . $trashCount . ')' : '' }}</span>
                </span>
                    </a>
            @endcan

        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" width="100%" cellspacing="0">
                    <thead>
                    <tr>
                        <th>STT</th>
                        <th>Ngành</th>
                        <th>Năm học</th>
                        <th>Chức năng</th>
                        <th></th>
                    </tr>
                    </thead>
                    <tbody>
                    @php
                        $stt  = 0;
                    @endphp
                    @foreach($nganhs as $key => $nganh)
                        @php
                            $stt++;
                            $check = 0;
                            foreach ($boTieuChuans as $key => $botieuChuan) {
                                foreach ($botieuChuan->tieuChuan as $tieuChuan) {
                                    foreach ($tieuChuan->tieuChi as $tieuChi) {
                                        foreach ($tieuChi->baoCaoGK as $baoCaoGK) {
                                            $check = $baoCaoGK
                                                        ->where('nganh_id', $nganh->id)
                                                        ->where('dotDanhGiaGK_id', $nganh->dotDanhGiaGK_id)
                                                        ->where('congKhai', 1)
                                                        ->count();
                                        }
                                    }
                                }
                            }
                        @endphp
                        <tr data-toggle="collapse" data-target="#nganh-{{$nganh['id']}}{{$key}}"
                            class="accordion-toggle">
                            <td>{{ $stt }}</td>
                            <td>{{ $nganh['ten'] }}</td>
                            <td>{{ $nganh['namHoc'] }}</td>
                            <td>
                                @if($check === 0)
                                    <a href="" class="btn btn-secondary disabled">Xuất báo cáo</a>
                                    <a href="" class="btn btn-secondary disabled">Xuất phục lục</a>
                                    @can('baocaogk-trangthai')
                                        <a href="{{ route('baocaogiuaky.publish', ['nganh_id' => $nganh->id, 'dotDanhGiaGK_id'=>$nganh->dotDanhGiaGK_id]) }}" class="btn btn-in-toggle btn-success">Công khai</a>
                                    @endcan
                                @else
                                    <a href="{{ route('baocaogiuaky.wordPhucLuc', ['nganh_id' => $nganh->id, 'dotDanhGiaGK_id'=>$nganh->dotDanhGiaGK_id]) }}" class="btn btn-primary btn-in-toggle">Xuất phục lục</a>
                                    <a href="{{ route('baocaogiuaky.wordGk', ['nganh_id' => $nganh->id, 'dotDanhGiaGK_id'=>$nganh->dotDanhGiaGK_id]) }}" class="btn btn-primary btn-in-toggle">Xuất báo cáo</a>
                                    @can('baocaogk-trangthai')
                                        <a href="{{ route('baocaogiuaky.unpublish', ['nganh_id' => $nganh->id, 'dotDanhGiaGK_id'=>$nganh->dotDanhGiaGK_id]) }}" class="btn btn-in-toggle btn-success">Hủy công khai</a>
                                    @endcan
                                @endif
                            </td>
                            <td>
                                <button class="btn btn-default btn-xs"><i class="fas fa-plus"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="12" class="hiddenRow">
                                <div class="accordian-body collapse" id="nganh-{{$nganh['id']}}{{$key}}">
                                    <table class="table table-bordered bg-light" width="100%" cellspacing="0">
                                        <thead>
                                        <tr class="info">
                                            <th>STT tiêu chuẩn</th>
                                            <th>Tên tiêu chuẩn</th>
                                            <th>Tiến độ</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($boTieuChuans as $keyBTC => $boTieuChuan)
                                            @php
                                                $tieuChuans = $boTieuChuan->tieuChuan->where('boTieuChuan_id', $nganh['boTieuChuan_id'])
                                            @endphp
                                            @foreach($tieuChuans as $keyTieuChuan => $tieuChuan)
                                                @php
                                                    $count = 0;
                                                    $countTieuChis = count($tieuChuan->tieuChi) - 1;
                                                @endphp
                                                @foreach($tieuChuan->tieuChi as $key => $tieuChi)
                                                    @foreach($baoCaoGkAll as $item)
                                                        @php
                                                            if( $item['tieuChi_id'] == $tieuChi['id']
                                                            && $item['dotDanhGiaGK_id'] == $nganh->dotDanhGiaGK_id
                                                            && $item['nganh_id'] == $nganh->id) {
                                                                $count++;
                                                            }
                                                        @endphp
                                                    @endforeach
                                                @endforeach
                                                @php

                                                    $tienDo = $count / $countTieuChis * 100;
                                                @endphp

                                                <tr data-toggle="collapse" class="accordion-toggle"
                                                    data-target="#tieuChuan-{{ $nganh['id'] }}{{$keyTieuChuan}}">
                                                    <td>Tiêu chuẩn số {{ $tieuChuan->stt }}</td>
                                                    <td>{{ $tieuChuan->ten }}</td>
                                                    <td>
                                                        <h4 class="small font-weight-bold">
                                                            <span
                                                                class="float-right">{{ $tienDo == 100 ? 'Hoàn thành!' : $tienDo.'%' }}</span>
                                                        </h4>
                                                        <div class="progress w-100">
                                                            <div
                                                                class="progress-bar {{ $tienDo == 100 ? 'bg-success' : 'bg-primary' }}"
                                                                role="progressbar" style="width: {{$tienDo}}%"
                                                                aria-valuenow="{{$tienDo}}" aria-valuemin="0"
                                                                aria-valuemax="{{$tienDo}}"></div>
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-default btn-xs"><i
                                                                class="fas fa-plus"></i></button>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="12" class="hiddenRow">
                                                        <div class="accordian-body collapse"
                                                             id="tieuChuan-{{ $nganh['id'] }}{{$keyTieuChuan}}">
                                                            <table class="table table-bordered bg-gradient-light"
                                                                   width="100%" cellspacing="0">
                                                                <thead>
                                                                <tr>
                                                                    <th>STT tiêu chí</th>
                                                                    <th>Tên tiêu chí</th>
                                                                    <th>Báo cáo</th>
                                                                    <th>Chức năng</th>
                                                                </tr>
                                                                </thead>
                                                                <tbody>
                                                                @foreach ($tieuChuan->tieuChi as $key => $tieuChi)
                                                                    @php
                                                                        $string ='Tổng kết tiêu chuẩn'. ' '. $tieuChuan->stt;
                                                                         $check = strcmp( $tieuChi->ten,$string);
                                                                    @endphp
                                                                    @if($check !== 0)
                                                                        <tr>
                                                                            <td>Tiêu chí số {{ $tieuChuan->stt }}
                                                                                .{{ $tieuChi->stt }}</td>
                                                                            <td>{{ $tieuChi->ten }}</td>
                                                                            @php
                                                                                $baoCaoGK = [];
                                                                            @endphp
                                                                            @foreach($baoCaoGkAll as $item)
                                                                                @php
                                                                                    if( $item['tieuChi_id'] == $tieuChi['id']
                                                                                    && $item['dotDanhGiaGK_id'] == $nganh->dotDanhGiaGK_id
                                                                                    && $item['nganh_id'] == $nganh->id) {
                                                                                        array_push($baoCaoGK, $item);
                                                                                    }
                                                                                @endphp
                                                                            @endforeach
                                                                            @php
                                                                                $ten = '<span class="text-danger">Chưa có</span>';
                                                                                $sua = '';
                                                                                $xem = '';
                                                                                $xoa = '';
                                                                                $hoanthanh = '';
                                                                                if (count($baoCaoGK) > 0) {
                                                                                    $route = 'baocaogiuaky/edit/' . $baoCaoGK[0]['id'];
                                                                                    $routeDelete = 'baocaogiuaky/destroy/' . $baoCaoGK[0]['id'];
                                                                                    $routeHoanThanh = 'baocaogiuaky/finish/' . $baoCaoGK[0]['id'];
                                                                                    $routeMoLai = 'baocaogiuaky/reopen/' . $baoCaoGK[0]['id'];
                                                                                    $routeXem = 'baocaogiuaky/show/' . $baoCaoGK[0]['id'];

                                                                                    $ten = 'Báo cáo số ' . $baoCaoGK[0]->tieuChuan->stt . '.' . $baoCaoGK[0]->tieuChi->stt ;
                                                                                    $xem = '<a  href="'.$routeXem.'" class="btn btn-primary">Xem</a>';
                                                                                    if($baoCaoGK[0]['trangThai'] === 0) {
                                                                                          $sua = '<a  href="'.$route.'" class="btn btn-info">Sửa</a>';
                                                                                           $xoa = '<a href="#" class="btn btn-danger btn-delete"
                                                                                            data-url="'.$routeDelete.'" data-id="'.$baoCaoGK[0]['id'].'">Xóa</a>';
                                                                                           $hoanthanh = '<a href="#"  data-url="'.$routeHoanThanh.'" data-id="'.$baoCaoGK[0]['id'].'"
                                                                                            class="btn btn-success btn-finish">Hoàn thành</a>';
                                                                                    } else {
                                                                                         $hoanthanh = '<a href="#"  data-url="'.$routeMoLai.'" data-id="'.$baoCaoGK[0]['id'].'"
                                                                                            class="btn btn-success btn-reopen">Mở lại</a>';
                                                                                    }

                                                                                }
                                                                            @endphp
                                                                            <td>{!! $ten !!}</td>
                                                                            @can('baocaogk-trangthai')
                                                                                <td style="display: flex">{!! $hoanthanh !!}</td>
                                                                            @endcan
                                                                            <td style="display: flex; gap: 12px ">{!! $xem !!}
                                                                                @can('baocaogk-sua') {!! $sua !!}@endcan
                                                                                @can('baocaogk-xoa') {!! $xoa !!}@endcan
                                                                            </td>
                                                                        </tr>
                                                                    @endif
                                                                @endforeach
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
    <script src="js/baocaogiuaky/handleFinishBaoCao.js"></script>

    <script>
        $('.btn-in-toggle').on('click', (e) => {
            e.stopPropagation();
        })
    </script>
@endsection
