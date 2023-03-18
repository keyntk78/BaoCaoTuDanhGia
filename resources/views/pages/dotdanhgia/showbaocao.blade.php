@extends('layouts.index', [
    'title' => 'Báo cáo tự đánh giá',
    'isShowBaoCao' => true,
    'tieuChuans' => $tieuChuans,
])

@php
$controller = (object) [
    'name' => 'Đợt đánh giá',
    'href' => '/dotdanhgia',
];
$action = (object) [
    'name' => $dotDanhGia->ten,
    'href' => 'dotdanhgia/show/'.$dotDanhGia->id,
];
$childAction = (object) [
    'name' => $nganh->ten,
]
@endphp

@section('styles')
    <link rel="stylesheet" href="css/style-word.css">
    <style>
        .minhchung {
            display: block;
            text-decoration: none;
        }
        .accordionSidebar {
            z-index: 999;
        }
    </style>
@endsection

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('breadcrumb')
    @include('partials.breadcrumb', compact('controller', 'action', 'childAction'))
@endsection

@section('page-heading')
    @include('partials.page-heading', compact('controller', 'childAction'))
@endsection

@section('message')
    @include('partials.message', [
        'message' => Session::has('message') ? Session::get('message') : null,
    ])
@endsection

@section('content')
    {{-- Content --}}
    <div class="row">
        <div class="card shadow mb-4 col mx-3 p-0">
            <div class="wrap-word-content card-body p-5">
                <h1>TỰ ĐÁNH GIÁ THEO CÁC TIÊU CHUẨN, TIÊU CHÍ</h1>
                @foreach ($tieuChuans as $tieuChuan)
                    <h2>TIÊU CHUẨN {{ $tieuChuan->stt }}. {{ $tieuChuan->ten }}</h2>
                    <h3 id="modau-tieuchuan-{{ $tieuChuan->stt }}">Mở đầu</h3>
                    @php
                        $ketLuanBaoCao = $tieuChuan->tieuChi[0]->baoCao
                            ->where('nganh_id', $nganh->id)
                            ->where('dotDanhGia_id', $nganh->dotDanhGia_id)
                            ->first();
                    @endphp
                    {!! $ketLuanBaoCao ?  $ketLuanBaoCao->moDau : '' !!}
                    @foreach ($tieuChuan->tieuChi as $tieuChi)
                        @if ($loop->first)
                            @continue
                        @endif
                        <h3 id="tieuchi-{{ $tieuChuan->stt }}-{{ $tieuChi->stt }}">Tiêu chí số {{ $tieuChuan->stt }}.{{ $tieuChi->stt }}. {{ $tieuChi->ten }}</h3>
                        @php
                            if (count($tieuChi->baoCao) > 0) {
                                $baoCao = $tieuChi->baoCao
                                ->where('nganh_id', $nganh->id)
                                ->where('dotDanhGia_id', $nganh->dotDanhGia_id)
                                ->first();
                                if (!empty($baoCao)) {
                                    $html = html_entity_decode($baoCao->moTa);
                                    foreach ($hopMCs as $hopMC) {
                                        $html = str_replace('>['.$hopMC->text,
                                        'data-toggle="tooltip" data-placement="top" title="'.$hopMC->text.'">['.$hopMC->maHMC, $html);
                                    }
                                    $baoCao->moTa = $html;
                                }
                            } else {
                                $baoCao = null;
                            }
                        @endphp
                        <p class="h3">1. Mô tả hiện trạng</p>
                        {!! $baoCao ? $baoCao->moTa : '' !!}
                        <p class="h3">2. Điểm mạnh</p>
                        {!! $baoCao ? $baoCao->diemManh : '' !!}
                        <p class="h3">3. Điểm tồn tại</p>
                        {!! $baoCao ? $baoCao->diemTonTai : '' !!}
                        <p class="h3">4. Kế hoạch hành động</p>
                        {!! $baoCao ? $baoCao->keHoachHanhDong : '' !!}
                        <p class="h3">5. Tự đánh giá</p>
                        <p>{!! $baoCao && $baoCao->diemTDG >= 4 ? 'Đạt' : 'Chưa đạt' !!} (Điểm TĐG: {!! $baoCao ? $baoCao->diemTDG : '0' !!}/7)</p>
                    @endforeach
                    <h3 id="ketluan-tieuchuan-{{ $tieuChuan->stt }}">Kết luận về Tiêu chuẩn {{ $tieuChuan->stt }}</h3>
                    {!! $ketLuanBaoCao ? $ketLuanBaoCao->ketLuan : '' !!}
                    <p class="h3">Tổng số tiêu chí đạt yêu cầu:
                        {{ $ketLuanBaoCao ? $ketLuanBaoCao->soTCDat : '' }}/{{ $ketLuanBaoCao ? $ketLuanBaoCao->tongSoTC : '' }}</p>
                @endforeach
            </div>
        </div>
        <div class="mb-4 col-md-3 mx-2">
            <div id="wrap-list-minhchung" class="card shadow">
                <div class="card-body py-5">
                    <h6 class="text-uppercase font-weight-bold text-dark text-center text-bold">Minh chứng sử dụng</h6>
                    <hr class="divider">
                    <ul class="list-minhchung pr-2 pl-4">
                        @php $count = 1 @endphp
                        @foreach ($tieuChuans as $tieuChuan)
                            <div class="text-md font-weight-bold text-primary mb-1 text-uppercase">Tiêu chuẩn {{ $tieuChuan->stt }}</div>
                            @foreach ($hopMCs as $hopMC)
                                @if ($hopMC->tieuChuan_id == $tieuChuan->id)
                                <li>
                                    <a class="minhchung" data-id="minhchung-{{$count}}" href="/dotdanhgia/showbaocao/3/3#minhchung-{{$count}}">[{{ $hopMC->maHMC }}] {{ $hopMC->text }}</a>
                                </li>
                                @php $count++ @endphp
                                @endif
                            @endforeach
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <button type="button" class="btn-show-modal btn btn-primary d-none" data-toggle="modal" data-target="#deleteCatModal">
        <span class="sr-only">Show modal</span>
    </button>
    <!-- Modal -->
    <div class="modal fade" id="deleteCatModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Minh chứng thành phần</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <h5 class="title"></h5>
                    <ul class="content"></ul>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Đóng</button>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="js/handleScrollToBaoCao.js"></script>
@endsection
