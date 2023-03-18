@extends('layouts.index', ['title' => 'Chi tiết tiêu chí'])

@php
$controller = (object) [
    'name' => 'Tiêu chí',
    'href' => '/tieuchi',
];
$action = (object) [
    'name' => 'Chi tiết',
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
                    <tbody>
                        <tr>
                            <th>Tiêu chí số:</th>
                            <td>{{ $tieuChi->tieuChuan->stt }}.{{ $tieuChi->stt }}</td>
                        </tr>
                        <tr>
                            <th>Tên tiêu chí:</th>
                            <td>{{ $tieuChi->ten }}</td>
                        </tr>
                        <tr>
                            <th>Yêu cầu:</th>
                            <td>
                                <ul class="pl-3">
                                    @foreach ($tieuChi->yeuCau as $item)
                                        <li>{!! \App\Filters\HighLightKeyword::handleHighlight($item->noiDung, $tieuChi->tuKhoa) !!}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Mốc chuẩn:</th>
                            <td>
                                <ul class="pl-3">
                                    @foreach ($tieuChi->mocChuan as $item)
                                        <li>{!! \App\Filters\HighLightKeyword::handleHighlight($item->noiDung, $tieuChi->tuKhoa) !!}</li>
                                    @endforeach
                                </ul>
                            </td>
                        </tr>
                        <tr>
                            <th>Từ khóa:</th>
                            <td class="font-weight-bold text-danger">
                                @foreach ($tieuChi->tuKhoa as $item)
                                    @if ($loop->last)
                                        @php echo $item->noiDung @endphp
                                    @else
                                        @php echo $item->noiDung . ', ' @endphp
                                    @endif
                                @endforeach
                            </td>
                        </tr>

                        <tr>
                            <th>Ghi chú:</th>
                            <td>  @php
                                    $ghiChu = str_replace("\n", "<br/>", $tieuChi->ghiChu);
                                    echo $ghiChu;
                                @endphp
                            </td>
                        </tr>
                        <tr>
                            <th>Chức năng:</th>
                            <td>
                                @can('tieuchi-sua')
                                <a href="{{ route('tieuchi.edit', ['id' => $tieuChi->id]) }}"
                                    class="btn btn-secondary">Sửa</a>
                                @endcan
                                @can('tieuchi-xoa')
                                <a href="#" class="btn btn-danger btn-delete" data-url="{{ route('tieuchi.destroy') }}"
                                    data-id="{{ $tieuChi->id }}" data-redirect="{{ route('tieuchi.index') }}">Xóa</a>
                                @endcan
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="js/handleDelete.js"></script>
@endsection
