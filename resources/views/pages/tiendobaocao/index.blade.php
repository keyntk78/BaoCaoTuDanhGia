@extends('layouts.index', ['title' => 'Tiến độ báo cáo'])

@php
$controller = (object) [
    'name' => 'Tiến độ báo cáo',
    'href' => '/tiendobaocao',
];
$action = (object) [
    'name' => 'Danh sách',
];
@endphp

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
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

@section('content')
    <div class="card shadow mb-4">
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
                        @foreach ($nganhs as $keyNganh => $nganh)
                        @php
                            $canExport = true;
                            $isPublished = false;

                            foreach ($baoCaos as $baoCao) {
                                if($nganh->dotDanhGia_id == $baoCao->dotDanhGia_id){
                                    $tieuChuanBaoCao = $baoCao;
                                }
                            }
                            $boTieuChuanId = $tieuChuanBaoCao->tieuChuan->boTieuChuan_id;
                            foreach ($tieuChuans as $key => $tieuChuan) {
                                foreach ($tieuChuan->tieuChi as $key => $tieuChi) {
                                    $baoCao = $tieuChi->baoCao->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->first();
                                    if (empty($baoCao) || ($baoCao && $baoCao->trangThai == 0)) {
                                        $canExport = false;
                                        break; break;
                                    }
                                }
                                foreach ($tieuChuan->tieuChi as $key => $tieuChi) {
                                    $baoCao = $tieuChi->baoCao->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->first();
                                    if (!empty($baoCao) && $baoCao->congKhai == 1) {
                                        $isPublished = true;
                                        break; break;
                                    }
                                }
                            }
                        @endphp
                        <tr data-toggle="collapse" data-target="#nganh-{{$nganh->id}}{{$keyNganh}}" class="accordion-toggle">
                            <td>{{ $keyNganh + 1 }}</td>
                            <td>{{ $nganh->ten }}</td>
                            <td>{{ $nganh->namHoc }}</td>
                            <td>
                                @if ($canExport)
                                <a href="{{ route('tiendobaocao.word-all', ['id' => $nganh->id]) }}" class="btn btn-primary btn-in-toggle">Xuất báo cáo</a>
                                <a href="{{ route('tiendobaocao.word-dsmc', ['id' => $nganh->id]) }}" class="btn btn-primary btn-in-toggle">Xuất DSMC</a>
                                    <a href="{{ route('tiendobaocao.word-short', ['nganh_id' => $nganh->id, 'dotDanhGia_id'=>$nganh->dotDanhGia_id]) }}" class="btn btn-primary btn-in-toggle">Xuất vắn tắt</a>
                                @else
                                <a href="{{ route('tiendobaocao.word-all', ['id' => $nganh->id]) }}" class="btn btn-secondary disabled">Xuất báo cáo</a>
                                <a href="{{ route('tiendobaocao.word-dsmc', ['id' => $nganh->id]) }}" class="btn btn-secondary disabled">Xuất DSMC</a>
                                    <a href="{{ route('tiendobaocao.word-dsmc', ['id' => $nganh->id]) }}" class="btn btn-secondary disabled">Xuất vắn tắt</a>

                                @endif
                                @if ($isPublished)
                                <a href="{{ route('tiendobaocao.unpublish', ['id' => $nganh->id]) }}" class="btn btn-success btn-in-toggle">Huỷ công khai</a>
                                @else
                                <a href="{{ route('tiendobaocao.publish', ['id' => $nganh->id]) }}" class="btn btn-success btn-in-toggle">Công khai</a>
                                @endif
                            </td>
                            <td><button class="btn btn-default btn-xs"><i class="fas fa-plus"></i></button></td>
                        </tr>
                        <tr>
                            <td colspan="12" class="hiddenRow">
                                <div class="accordian-body collapse" id="nganh-{{$nganh->id}}{{$keyNganh}}">
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
                                            @foreach($botieuchuans as $boTieuChuan)
                                                @php
                                                    $tieuChuanGDDT = $boTieuChuan->tieuChuan->where('boTieuChuan_id', $boTieuChuanId)
                                                @endphp
                                                @foreach ($tieuChuanGDDT as $key => $tieuChuan)
                                                    @php
                                                        $count = 0;
                                                        foreach($tieuChuan->tieuChi as $tieuChi) {
                                                            $baoCao = $tieuChi->baoCao->where('nganh_id', $nganh->id)
                                                                    ->where('dotDanhGia_id', $nganh->dotDanhGia_id)
                                                                    ->where('trangThai', 1)->first();
                                                            if ($baoCao) {
                                                                $count++;
                                                            }
                                                        }
                                                        $tieuChis = $tieuChuan->tieuChi;
                                                        $tienDo = $count / count($tieuChis) * 100;
                                                    @endphp
                                                    <tr data-toggle="collapse" class="accordion-toggle" data-target="#tieuChuan-{{ $nganh->id }}{{$key}}">
                                                        <td>Tiêu chuẩn số {{ $tieuChuan->stt }}</td>
                                                        <td>{{ $tieuChuan->ten }}</td>
                                                        <td>
                                                            <h4 class="small font-weight-bold">
                                                                <span class="float-right">{{ $tienDo == 100 ? 'Hoàn thành!' : $tienDo.'%' }}</span>
                                                            </h4>
                                                            <div class="progress w-100">
                                                                <div class="progress-bar {{ $tienDo == 100 ? 'bg-success' : 'bg-primary' }}" role="progressbar" style="width: {{$tienDo}}%"
                                                                     aria-valuenow="{{$tienDo}}" aria-valuemin="0" aria-valuemax="{{$tienDo}}"></div>
                                                            </div>
                                                        </td>
                                                        <td><button class="btn btn-default btn-xs"><i class="fas fa-plus"></i></button></td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="12" class="hiddenRow">
                                                            <div class="accordian-body collapse" id="tieuChuan-{{ $nganh->id }}{{$key}}">
                                                                <table class="table table-bordered bg-gradient-light" width="100%" cellspacing="0">
                                                                    <thead>
                                                                    <tr>
                                                                        <th>STT tiêu chí</th>
                                                                        <th>Tên tiêu chí</th>
                                                                        <th>Báo cáo</th>
                                                                        <th>Trạng thái</th>
                                                                        <th>Cán bộ đảm nhận</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    @foreach ($tieuChuan->tieuChi as $key => $tieuChi)
                                                                        <tr>
                                                                            <td>Tiêu chí số {{ $tieuChuan->stt }}.{{ $tieuChi->stt }}</td>
                                                                            <td>{{ $tieuChi->ten }}</td>
                                                                            @php
                                                                                $baoCao = $tieuChi->baoCao->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->first();
                                                                                $ten = '<span class="text-danger">Chưa có</span>';
                                                                                $trangThai = '<span class="text-danger">Chưa có</span>';
                                                                                $canBoDamNhan = '<span class="text-danger">Chưa có</span>';
                                                                                if (!empty($baoCao)) {
                                                                                    $ten = 'Báo cáo số ' . $baoCao->tieuChuan->stt . '.' . $baoCao->tieuChi->stt;
                                                                                    $trangThai = $baoCao->trangThai == 0 ? 'Đang tiến hành' : '<span class="text-primary">Đã hoàn thành</span>';
                                                                                    $canBoDamNhan = '<ul class="pl-0" type="none">';
                                                                                    foreach ($baoCao->nhomNguoiDung as $nhomNguoiDung) {
                                                                                        $canBoDamNhan .= '<li>' . $nhomNguoiDung->nguoiDung->hoTen . '</li>';
                                                                                    }
                                                                                    $canBoDamNhan .= '</ul>';
                                                                                }
                                                                            @endphp
                                                                            <td>{!! $ten !!}</td>
                                                                            <td>{!! $trangThai !!}</td>
                                                                            <td>{!! $canBoDamNhan !!}</td>
                                                                        </tr>
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
    <script>
        $('.btn-in-toggle').on('click', (e) => {
            e.stopPropagation();
        })
    </script>
@endsection
