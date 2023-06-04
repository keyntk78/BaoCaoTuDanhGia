@extends('layouts.index', ['title' => 'Chi tiết báo cáo sao lưu'])

@php
$controller = (object) [
    'name' => 'Báo cáo',
    'href' => '/baocao',
];
$action = (object) [
    'name' => 'Chi tiết báo cáo sao lưu',
];
@endphp

@section('styles')
    <link rel="stylesheet" href="css/tiny-editor.css">
    <style>
        .minhchung {
            display: block;
            text-decoration: none;
        }

        html {
            scroll-behavior: smooth;
        }

        .media img {
            width: 60px;
            height: 60px;
        }

    </style>
@endsection

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
    {{-- Content --}}
    <div class="row">
        <div class="card shadow mb-4 col mx-3 p-0">
            <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h5 class="m-0">SAO LƯU NGÀY: {{ date("d-m-Y H:i", strtotime($baoCaoSL->created_at)) }}</h5>
            </div>
            <div class="card-body p-5">
                <h6 class="text-uppercase font-weight-bold text-dark text-center text-bold">
                    Tiêu chí số {{$baoCaoSL->tieuChuan->stt}}.{{$baoCaoSL->tieuChi->stt}}. {{$baoCaoSL->tieuChi->ten}}
                </h6>
                @if($baoCaoSL->tieuChi->stt !== 0)
                    <p class="font-weight-bold text-dark">Mô tả</p>
                    {!! $baoCaoSL->moTa !!}
                    <p class="font-weight-bold text-dark">Điểm mạnh</p>
                    {!! $baoCaoSL->diemManh !!}
                    <p class="font-weight-bold text-dark">Điểm tồn tại</p>
                    {!! $baoCaoSL->diemTonTai !!}
                    <p class="font-weight-bold text-dark">Kế hoạch hành động</p>
                    {!! $baoCaoSL->keHoachHanhDong !!}
                    <p class="font-weight-bold text-dark">Điểm tự đánh giá</p>
                    {!! $baoCaoSL->diemTDG !!}
                @else
                    <p class="font-weight-bold text-dark">Mở đầu</p>
                    {!! $baoCaoSL->moDau !!}
                    <p class="font-weight-bold text-dark">Kết luận</p>
                    {!! $baoCaoSL->ketLuan !!}
                @endif


            </div>
            <div class="card-footer p-3">
                <div class="text-right">
                    <a href="{{ route('baocao.compare', ['id' => $baoCaoSL->baoCao_id, 'subid' => $baoCaoSL->id]) }}"
                        class="btn btn-secondary">So sánh</a>
                    <a href="#" class="btn btn-success btn-restore-backup" data-url="{{ route('baocaosaoluu.restore') }}"
                        data-id="{{ $baoCaoSL->id }}"
                        data-redirect="{{ route('baocao.show', ['id' => $baoCaoSL->baoCao_id]) }}">Phục hồi</a>
                    <a href="#" class="btn btn-danger btn-delete-backup" data-url="{{ route('baocaosaoluu.destroy') }}"
                        data-id="{{ $baoCaoSL->id }}"
                        data-redirect="{{ route('baocao.show', ['id' => $baoCaoSL->baoCao_id]) }}">Xóa</a>
                </div>
            </div>
        </div>
        <div class="mb-4 col-md-3 mx-2">
            <div class="card shadow">
                <div class="card-body py-5">
                    <h6 class="text-uppercase font-weight-bold text-dark text-center text-bold">Minh chứng sử dụng</h6>
                    <hr class="divider">
                    <ul class="list-minhchung pr-2 pl-4"></ul>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
    <script src="js/handleRestore.js"></script>
    <script>
        $(document).ready(function() {
            $listMinhChung = $('.list-minhchung');
            $('.is-minhchung').each((i, el) => {
                $(el).attr('id', `minhchung-${i + 1}`);
                $listMinhChung.append(
                    `<li><a class="minhchung" data-id="minhchung-${i + 1}" href="${window.location.href.split(/[?#]/)[0]}#minhchung-${i + 1}">${$(el).text()}</a></li>`
                );
            });
        });
    </script>
@endsection
