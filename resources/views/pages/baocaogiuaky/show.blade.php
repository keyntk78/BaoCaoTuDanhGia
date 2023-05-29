@extends('layouts.index', ['title' => 'Chi tiết báo cáo giữa kỳ'])

@php
    $controller = (object) [
        'name' => 'Báo cáo giữa kỳ',
        'href' => '/baocaogiuaky',
    ];
    $action = (object) [
        'name' => 'Chi tiết',
    ];
@endphp

@section('styles')
    <link rel="stylesheet" href="css/style-wordGk.css">
    <style>
        .minhchung {
            display: block;
            text-decoration: none;
        }

        .media img {
            width: 60px;
            height: 60px;
        }

        .attach-file .other {
            margin-top: 10px;
            margin-bottom: 15px;
        }

        .attach-file .other .icon {
            width: 100px;
            float: left;
        }

        .attach-file .other .info {
            margin-top: 10px;
            width: calc(100% - 100px);
            float: right;
        }

        .attach-file .other .info p {
            margin-bottom: 5px;
        }

        .attach-file .other img {
            width: 100px;
            height: auto;
        }

        .attach-file .image {
            margin-top: 10px;
            width: 300px;
        }

        .attach-file .image img {
            width: 100%;
            height: auto;
        }

        .attach-file .video {
            margin-top: 10px;
            width: 500px;
            height: auto;
            aspect-ratio: 16/9;
        }

        .attach-file .video video {
            width: 100%;
        }

        .upload-file {
            height: 40px;
            width: 150px;
            position: absolute;
            right: 190px;
            overflow: hidden;
        }

        .upload-file > span {
            position: absolute;
            white-space: nowrap;
            width: 100%;
            top: 50%;
            transform: translateY(-50%);
            display: block;
            text-align: center;
            color: #1c7af1;
            z-index: 1;
        }

        .upload-file > span i.fas {
            padding-right: 5px;
        }

        #attach_file {
            position: relative;
            opacity: 0;
            cursor: pointer;
            z-index: 2;
        }
    </style>
@endsection

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



@section('content')

    <div class="row">
        <div class="card shadow mb-4 col mx-3 p-0">
            <div class="card-header py-3 d-flex flex-row align-items-center">
                @can('baocaogk-sua')
                    <a href="{{ route('baocaogiuaky.edit', ['id'=>$baoCaoGk->id]) }}" class="btn btn-info btn-icon-split">
                        <span class="text">Sửa</span>
                    </a>
                @endcan

                    @can('baocaogk-trangthai')
                        @if($baoCaoGk->trangThai === 1)
                            <a href="#" data-url="{{route('baocaogiuaky.reopen', ['id'=>$baoCaoGk->id])}}"
                               data-id="{{$baoCaoGk->id}}"
                               class="btn btn-success btn-finish ml-2">Mở lại</a>
                        @else
                            <a href="#" data-url="{{route('baocaogiuaky.finish', ['id'=>$baoCaoGk->id])}}"
                               data-id="{{$baoCaoGk->id}}"
                               class="btn btn-success btn-finish ml-2">Hoàn thành</a>
                        @endif
                    @endcan

            </div>
            <div class="wrap-word-content card-body p-5">
                <table border="1" class="table-content">
                    <thead>
                    <tr class="table-row">
                        <th rowspan="2" class="table-col table__text-center">Tiêu chuẩn, tiêu chí</th>
                        <th colspan="2" class="table-col table__text-center">Đánh giá tiêu chí</th>
                        <th rowspan="2" class="table-col table__text-center">CSGD tự xác định kết quả đạt được sau khi
                            thực hiện cải tiến NCCL
                        </th>
                        <th rowspan="2" class="table-col table__text-center">
                            Ghi chú <br>(Đối với tiêu chí sau khi cải tiến chất lượng có thay đổi kết quả so với ĐGN:
                            nêu vắn tắt lý do)
                        </th>
                    </tr>
                    <tr>
                        <th class="table-col">TĐG</th>
                        <th class="table-col">ĐGN</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="5" class="table-col"><b>Tiêu chuẩn {{$baoCaoGk->tieuChuan->stt}}</b></td>
                    </tr>
                    <tr>
                        <td class="table-col table__text-center">
                            Tiêu chí {{$baoCaoGk->tieuChuan->stt}}.{{$baoCaoGk->tieuChi->stt}}
                        </td>
                        <td class="table-col table__text-center">
                            {{$baoCaoGk->tdg}}
                        </td>
                        <td class="table-col table__text-center">
                            {{$baoCaoGk->dgn}}
                        </td>
                        <td class="table-col table__text-center">
                            {{$baoCaoGk->tuXacDinhKQ}}
                        </td>
                        <td class="table-col">
                            {!!$baoCaoGk->neuVanTat!!}
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
        @if ($baoCaoGk->tieuChi->stt !== 0)
            <div class="mb-4 col-md-3 mx-2">
                <div class="card shadow">
                    <div class="card-body py-5">
                        <h6 class="text-uppercase font-weight-bold text-dark text-center text-bold">Minh chứng sử
                            dụng</h6>
                        <hr class="divider">
                        <ul class="list-minhchung pr-2 pl-4"></ul>
                    </div>
                </div>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="card shadow mb-4 col mx-3 p-0">
            <div class="wrap-word-content card-body p-5">
                <table border="1" class="table-content">
                    <thead>
                    <tr class="table-row">
                        <th class="table-col table__text-center">Tiêu chuẩn/ Tiêu chí
                        </th>
                        <th class="table-col table__text-center">Kết quả KĐCLGD</th>
                        <th class="table-col table__text-center">Nội dung cần cải tiến chất lượng theo khuyến nghị của
                            Đoàn ĐGN và Hội đồng KĐCLGD
                        </th>
                        <th class="table-col table__text-center">
                            Các hoạt động cải tiến chất lượng đã thực hiện và kết quả <span
                                style="font-style: italic; font-weight: normal">(kèm theo mã minh chứng)</span>
                        </th>
                        <th class="table-col table__text-center">
                            Nội dung cần cải tiến chất lượng trong nửa kỳ tiếp theo
                        </th>
                        <th class="table-col table__text-center">
                            Đơn vị/ cá nhân thực hiện
                        </th>
                        <th class="table-col table__text-center">
                            Thời gian thực hiện
                        </th>
                        <th class="table-col table__text-center">
                            Ghi chú
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="8" class="table-col"><b>Tiêu chuẩn {{$baoCaoGk->tieuChuan->stt}}
                                : {{$baoCaoGk->tieuChuan->ten}}</b></td>
                    </tr>
                    <tr>
                        <th class="table-col table__text-center">
                            Tiêu chí {{$baoCaoGk->tieuChuan->stt}}.{{$baoCaoGk->tieuChi->stt}}
                        </th>
                        <th class="table-col table__text-center">
                            {{$baoCaoGk->kqKĐCLGD}}
                        </th>
                        <td class="table-col">
                            {!!$baoCaoGk->ndctTheoKN!!}
                        </td>
                        <td class="table-col">
                            {!!$baoCaoGk->hoatDongDaCaiTien!!}
                        </td>
                        <td class="table-col">
                            {!!$baoCaoGk->ndct!!}
                        </td>
                        <td class="table-col">
                            {{$baoCaoGk->donVi}}
                        </td>
                        <td class="table-col">
                            {{$baoCaoGk->thoiGianThucHien}}
                        </td>
                    </tr>
                    </tbody>
                </table>
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
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/baocaogiuaky/handleScrollToMinhChung.js"></script>
    <script src="js/baocaogiuaky/handleFinishBaoCao.js"></script>

@endsection

