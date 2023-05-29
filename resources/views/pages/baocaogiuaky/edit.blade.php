
@extends('layouts.index', ['title' => 'Sữa báo cáo giữa kỳ'])

@php
    $controller = (object) [
        'name' => 'Báo cáo giữa kỳ',
        'href' => '/baocaogiuaky',
    ];
    $action = (object) [
        'name' => 'Chỉnh sữa',
    ];
@endphp

@section('head')
    <meta name="csrf-token" content="{{ csrf_token() }}" />
@endsection

@section('styles')
    <link rel="stylesheet" href="css/tiny-editor.css">
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
            <form action="{{ route('baocaogiuaky.update', ['id' => $baoCaoGk->id]) }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="dotDanhGiaGK_id">Đợt đánh giá giữa kỳ</label>
                    <select class="form-select form-control {{ $errors->has('dotDanhGiaGK_id') ? 'is-invalid' : '' }}" disabled id="dotDanhGiaGK_id" name="dotDanhGiaGK_id" aria-label="Chọn đợt đánh giá giữa kỳ">
                        <option value="">Chọn đợt đánh giá</option>
                        @foreach ($dotDanhGiaGKs as $item)
                            <option value="{{ $item->id }}"  {{ $baoCaoGk->dotDanhGiaGK_id == $item->id ? 'selected' : '' }}>
                                {{ $item->tenDotDanhGia }}</option>
                        @endforeach
                    </select>
                    @if ($errors->has('dotDanhGiaGK_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('dotDanhGiaGK_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="nganh_id">Ngành</label>
                    <select class="form-select form-control {{ $errors->has('nganh_id') ? 'is-invalid' : '' }}" id="nganh_id" disabled name="nganh_id" aria-label="Chọn ngành">
                        @if(isset($nganh_curent))
                            <option value="{{ $nganh_curent->id }}">
                                {{ $nganh_curent->ten }}</option>
                        @else
                            <option value="0">Chọn ngành</option>
                        @endif
                    </select>
                    @if ($errors->has('nganh_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('nganh_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tieuChuan_id">Tiêu chuẩn</label>
                    <select class="form-select form-control  {{ $errors->has('tieuChuan_id') ? 'is-invalid' : '' }}" id="tieuChuan_id" disabled  name="tieuChuan_id"
                            aria-label="Chọn tiêu chuẩn">
                        @if(isset($tieuChuan_curent))
                            <option value="{{ $tieuChuan_curent->id }}">
                                Tiêu chuẩn số {{$tieuChuan_curent->stt}} :
                                {{ $tieuChuan_curent->ten }}</option>
                        @else
                            <option value="">Chọn tiêu chuẩn</option>
                        @endif

                    </select>
                    @if ($errors->has('tieuChuan_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tieuChuan_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tieuChi_id">Tiêu chí</label>
                    <select class="form-select form-control {{ $errors->has('tieuChi_id') ? 'is-invalid' : '' }}" id="tieuChi_id" disabled name="tieuChi_id" aria-label="Chọn tiêu chí">
                        @if(isset($tieuChi_curent))
                            <option value="{{ $tieuChi_curent->id }}">
                                Tiêu chí số {{ $tieuChi_curent->stt}} :
                                {{ $tieuChi_curent->ten }}</option>
                        @else
                            <option value="">Chọn tiêu chí</option>
                        @endif
                    </select>
                    @if ($errors->has('tieuChi_id'))
                        <div class="invalid-feedback">
                            {{ $errors->first('tieuChi_id') }}
                        </div>
                    @endif
                </div>
                <div class="form-group">
                    <label for="tdg">TĐG</label>
                    <input type="number" class="form-control" id="tdg" name="tdg"
                           value="{{ old('tdg', $baoCaoGk->tdg) }}">
                </div>
                <div class="form-group">
                    <label for="dgn">ĐGN</label>
                    <input type="number" class="form-control" id="dgn" name="dgn"
                           value="{{ old('dgn', $baoCaoGk->dgn) }}">
                </div>
                <div class="form-group">
                    <label for="tuXacDinhKQ">CSGD tự xác định kết quả đạt được sau khi thực hiện cải tiến NCCL</label>
                    <input type="number" class="form-control" id="tuXacDinhKQ" name="tuXacDinhKQ"
                           value="{{ old('tuXacDinhKQ', $baoCaoGk->tuXacDinhKQ) }}">
                </div>
                <div class="form-group">
                    <label for="neuVanTat">Ghi chú</label>
                    <span>(Đối với tiêu chí sau khi cải tiến chất lượng có thay đổi kết quả so với ĐGN: nêu vắn tắt lý do)</span>
                    <textarea class="form-control tiny-editor" id="neuVanTat" name="neuVanTat"
                              rows="8">{{ old('neuVanTat', $baoCaoGk->neuVanTat) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="kqKĐCLGD">Kết quả KĐCLGD</label>
                    <input type="number" class="form-control" id="kqKĐCLGD" name="kqKĐCLGD"
                           value="{{ old('kqKĐCLGD', $baoCaoGk->kqKĐCLGD) }}">
                </div>
                <div class="form-group">
                    <label for="tuXacDinhKQ">Đơn vị/ cá nhân thực hiện</label>
                    <input type="text" class="form-control" id="donVi" name="donVi"
                           value="{{ old('donVi', $baoCaoGk->donVi) }}">
                </div>
                <div class="form-group">
                    <label for="thoiGianThucHien">Thời gian thực hiện</label>
                    <input type="text" class="form-control" id="thoiGianThucHien" name="thoiGianThucHien"
                           value="{{ old('thoiGianThucHien',  $baoCaoGk->thoiGianThucHien) }}">
                </div>

                <div class="form-group">
                    <label for="ndctTheoKN">Nội dung cần cải tiến chất lượng theo khuyến nghị của Đoàn ĐGN và Hội đồng KĐCLGD</label>
                    <textarea class="form-control tiny-editor" id="ndctTheoKN" name="ndctTheoKN"
                              rows="8">{{ old('ndctTheoKN', $baoCaoGk->ndctTheoKN) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="hoatDongDaCaiTien">Các hoạt động cải tiến chất lượng đã thực hiện và kết quả </label>
                    <span>(kèm theo mã minh chứng)</span>
                    <textarea class="form-control tiny-editor" id="hoatDongDaCaiTien" name="hoatDongDaCaiTien"
                              rows="8">{{ old('hoatDongDaCaiTien', $baoCaoGk->hoatDongDaCaiTien) }}</textarea>
                </div>
                <div class="form-group">
                    <label for="ndct">Nội dung cần cải tiến chất lượng trong nửa kỳ tiếp theo </label>
                    <textarea class="form-control tiny-editor" id="ndct" name="ndct"
                              rows="8">{{ old('ndct', $baoCaoGk->ndct) }}</textarea>
                </div>

                <div class="form-group">
                    <label for="ghiChu">Ghi chú </label>
                    <textarea class="form-control tiny-editor" id="ghiChu" name="ghiChu"
                              rows="8">{{ old('ghiChu', $baoCaoGk->ghiChu) }}</textarea>
                </div>

                <button type="submit" class="btn btn-primary">Xác nhận</button>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('js/tinymce/tinymce.min.js') }}" referrerpolicy="origin"></script>
    <script src="js/callTinyMCEGK.js"></script>
    <script src="js/baocaogiuaky/handleDataSelectNganh.js"></script>
@endsection
