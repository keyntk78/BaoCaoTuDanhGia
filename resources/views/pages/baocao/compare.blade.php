@extends('layouts.index', ['title' => 'Chi tiết báo cáo'])

@php
$controller = (object) [
    'name' => 'Báo cáo',
    'href' => '/baocao',
];
$action = (object) [
    'name' => 'Chi tiết',
];
@endphp

@section('styles')
    <link rel="stylesheet" href="css/style-word.css">
    <style>
        .minhchung {
            display: block;
            text-decoration: none;
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
    <pre id="display"></pre>
    {{-- Content --}}
    <div class="row">
        <div class="card shadow mb-4 col mx-3 p-0">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark text-uppercase">Báo cáo hiện tại</h6>
            </div>
            <div class="wrap-current wrap-word-content card-body p-5">
                <h3>Tiêu chí số {{ $baoCao->tieuChi->tieuChuan->stt }}.{{ $baoCao->tieuChi->stt }}. {{ $baoCao->tieuChi->ten }}</h3>
                @if ($baoCao->tieuChi->stt !== 0)
                <p class="h3">1. Mô tả hiện trạng</p>
                <div class="mota">
                    {!! $baoCao->moTa !!}
                </div>
                <p class="h3">2. Điểm mạnh</p>
                <div class="diemmanh">
                    {!! $baoCao->diemManh !!}
                </div>
                <p class="h3">3. Điểm tồn tại</p>
                <div class="diemtontai">
                    {!! $baoCao->diemTonTai !!}
                </div>
                <p class="h3">4. Kế hoạch hành động</p>
                <div class="kehoachhanhdong">
                    {!! $baoCao->keHoachHanhDong !!}
                </div>
                <p class="h3">5. Tự đánh giá</p>
                <div class="diemTDG">
                    <p>{!! $baoCao->diemTDG >= 4 ? 'Đạt' : 'Chưa đạt' !!} (Điểm TĐG: {!! $baoCao->diemTDG !!}/7)</p>
                </div>
                @else
                <h3>Mở đầu</h3>
                <div class="modau">
                    {!! $baoCao->moDau !!}
                </div>
                <h3>Kết luận</h3>
                <div class="ketluan">
                    {!! $baoCao->ketLuan !!}
                </div>
                <h3>Số tiêu chí đạt</h3>
                <div class="soTCDat">
                    <p>{!! $baoCao->soTCDat !!}</p>
                </div>
                @endif
            </div>
        </div>
        <div class="card shadow mb-4 col mx-3 p-0">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-dark text-uppercase">Báo cáo sao lưu ngày {{ date("d/m/Y H:i", strtotime($baoCaoSL->updated_at)) }}</h6>
            </div>
            <div class="wrap-backup wrap-word-content card-body p-5">
                <h3>Tiêu chí số {{ $baoCaoSL->tieuChi->tieuChuan->stt }}.{{ $baoCaoSL->tieuChi->stt }}. {{ $baoCaoSL->tieuChi->ten }}</h3>
                @if ($baoCaoSL->tieuChi->stt !== 0)
                <p class="h3">1. Mô tả hiện trạng</p>
                <div class="mota">
                    {!! $baoCaoSL->moTa !!}
                </div>
                <p class="h3">2. Điểm mạnh</p>
                <div class="diemmanh">
                    {!! $baoCaoSL->diemManh !!}
                </div>
                <p class="h3">3. Điểm tồn tại</p>
                <div class="diemtontai">
                    {!! $baoCaoSL->diemTonTai !!}
                </div>
                <p class="h3">4. Kế hoạch hành động</p>
                <div class="kehoachhanhdong">
                    {!! $baoCaoSL->keHoachHanhDong !!}
                </div>
                <p class="h3">5. Tự đánh giá</p>
                <div class="diemTDG">
                    <p>{!! $baoCaoSL->diemTDG >= 4 ? 'Đạt' : 'Chưa đạt' !!} (Điểm TĐG: {!! $baoCaoSL->diemTDG !!}/7)</p>
                </div>
                @else
                <h3>Mở đầu</h3>
                <div class="modau">
                    {!! $baoCaoSL->moDau !!}
                </div>
                <h3>Kết luận</h3>
                <div class="ketluan">
                    {!! $baoCaoSL->ketLuan !!}
                </div>
                <h3>Số tiêu chí đạt</h3>
                <div class="soTCDat">
                    <p>{!! $baoCaoSL->soTCDat !!}</p>
                </div>
                @endif
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
    <script src="js/handleScrollToMinhChung.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jsdiff/5.1.0/diff.min.js"></script>
    <script>
        function handleCompare($backup, $current) {
            let span = null;
            const diff = Diff.diffWords($backup.text(), $current.text()),
                fragment = document.createDocumentFragment();
            diff.forEach((part, index) => {
                span = document.createElement('span');
                const color = part.added ? span.style.backgroundColor = '#acf2bd' :
                    part.removed ? span.style.display = 'none' : '';
                if (index === 0) {
                    span.style.marginLeft = '37.467px';
                }
                span.innerHTML = part.value;
                fragment.appendChild(span);
            });
            $current.html(fragment);

            span = null;
            const fragment2 = document.createDocumentFragment();
            diff.forEach((part, index) => {
                span = document.createElement('span');
                const color = part.added ? span.style.display = 'none' :
                    part.removed ? span.style.backgroundColor = '#fdb8c0' : '';
                if (index === 0) {
                    span.style.marginLeft = '37.467px';
                }
                span.innerHTML = part.value;
                fragment2.appendChild(span);
            });
            $backup.html(fragment2);
        }
        handleCompare($('.wrap-backup .mota'), $('.wrap-current .mota'));
        handleCompare($('.wrap-backup .diemmanh'), $('.wrap-current .diemmanh'));
        handleCompare($('.wrap-backup .diemtontai'), $('.wrap-current .diemtontai'));
        handleCompare($('.wrap-backup .kehoachhanhdong'), $('.wrap-current .kehoachhanhdong'));
        handleCompare($('.wrap-backup .diemTDG'), $('.wrap-current .diemTDG'));
        handleCompare($('.wrap-backup .modau'), $('.wrap-current .modau'));
        handleCompare($('.wrap-backup .ketluan'), $('.wrap-current .ketluan'));
        handleCompare($('.wrap-backup .soTCDat'), $('.wrap-current .soTCDat'));
    </script>
@endsection
