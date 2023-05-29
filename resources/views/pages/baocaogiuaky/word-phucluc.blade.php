@php
    $date = new DateTime('now');
    $tenNganh = implode('', array_map(function($v) { return $v[0]; }, explode(' ', ucwords("Công nghệ thông tin"))));
    $fileName = 'DSMC' . '_' . $tenNganh . '_' . $date->format('d-m-Y-h-i-s');
    header('Content-Type: application/vnd.msword');
    header('Content-Disposition: attachment; filename="'.$fileName.'.doc"');
    header('Cache-Control: private, max-age=0, must-revalidate');
@endphp

<head>
    <title>Export HTML to WORD</title>
    <style>

        @page Section1 {
            size: 841.7pt 595.45pt;
            mso-page-orientation: landscape;
            margin: 3cm 2cm 2cm 2cm;
            mso-header-margin: .5in;
            mso-footer-margin: .5in;
            mso-paper-source: 0;
        }

        div.Section1 {
            page: Section1;
        }

        body {
            line-height: 150%;
        }

        .table-content-1 {
            width: 100%;
            font-size: 17.333333px;
            border-collapse: collapse;
            mso-table-layout-alt: fixed;
            border: none;
            mso-border-alt: solid windowtext .75pt;
            mso-padding-alt: 0cm 2.55pt 0cm 2.55pt;
            mso-border-insideh: .75pt solid windowtext;
            mso-border-insidev: .75pt solid windowtext;
        }

        .table-row {

        }

        .table-col {
            padding: 8px;
        }

        .table-col2{
            padding: 0 4px;
            text-align: center;
            vertical-align: top;
        }

        .table-col3{
            padding: 0 4px;
        }

        .table__text-center {
            text-align: center;
        }

        ul, li {
            margin: 0;
            padding: 0;
            list-style: none;
        }

        h2,
        h3 {
            margin: 0;
            padding: 0;
            font-size: 17.333333px;
        }

        h1 {
            margin-bottom: 0;
            font-size: 18.6666666667px;
            line-height: 150%;
        }

        h1,
        h2 {

            font-weight: bold;
        }

        .h1--uppercase {
            text-transform: uppercase;
        }

        h3,
        .h3 {
            font-weight: bold;
        }

        .text-content {
            font-size: 17.333333px;
            margin: 0;
            padding: 0;
            text-align: justify;
            text-indent: 37.467px;
            line-height: 150%;
        }

        .h-content {
            text-indent: 37.467px;
        }
    </style>
</head>

<body>
<div  id="page-content2"  class="Section1">
    <h1 style="text-align:center">KẾT QUẢ CẢI TIẾN CHẤT LƯỢNG THEO TỪNG TIÊU CHÍ</h1>
    <p style="text-align:center; font-weight: normal; font-style: italic; margin: 0 0 15px 0; padding: 0">(Kèm theo Báo cáo số…. ngày ………….. của Trường Đại học Nha Trang)</p>
    <table border="1" class="table-content-1" width="968" cellspacing="0" cellpadding="0" style="margin-top: 15px">
        <thead>
        <tr class="table-row" >
            <th class="table-col2" width="100">Tiêu chuẩn, tiêu chí</th>
            <th class="table-col2" width="100">Kết quả KĐCLGD</th>
            <th class="table-col2 " width="160">Nội dung cần cải tiến chất lượng theo khuyến nghị của Đoàn ĐGN và Hội đồng KĐCLGD</th>
            <th class="table-col2" width="200">Các hoạt động cải tiến chất lượng đã thực hiện và kết quả
                <span style="font-weight: normal; font-style: italic">(kèm theo mã minh chứng)</span></th>
            <th class="table-col2" width="160">Nội dung cần cải tiến chất lượng trong nửa kỳ tiếp theo</th>
            <th class="table-col2" width="100">Đơn vị/ cá nhân thực hiện</th>
            <th class="table-col2" width="100">Thời gian thực hiện</th>
            <th class="table-col2" width="100">Ghi chú</th>
        </tr>
        </thead>
        <tbody>
        @foreach($tieuChuans as $tieuChuan)
            <tr>
                <td colspan="8" class="table-col"><b>Tiêu chuẩn {{$tieuChuan->stt}}: {{$tieuChuan->ten}}</b></td>
            </tr>
            @foreach($tieuChuan->tieuChi as $tieuChi)

                @foreach($baoCaos as $item)
                    @if($tieuChi->id === $item->tieuChi_id)
                        <tr>
                            <td  class="table-col table__text-center">
                                Tiêu chí {{$tieuChuan->stt}}.{{$tieuChi->stt}}
                            </td>
                            <td class="table-col3" width="100" style="text-align: center; vertical-align: middle">
                                {{$item->kqKĐCLGD}}
                            </td>
                            <td class="table-col3" width="160" style="vertical-align: top">
                                {!!$item->ndctTheoKN!!}
                            </td>
                            @php
                                $html = html_entity_decode($item->hoatDongDaCaiTien);
                                 foreach($minhChungs as $minhChung){
                                    $html = str_replace($minhChung->ten, $minhChung->maMC, $html);
                                }
                                 $item->hoatDongDaCaiTien = $html;

                            @endphp
                            <td class="table-col3"  width="200" style="vertical-align: top">
                                {!!$item->hoatDongDaCaiTien!!}
                            </td>
                            <td class="table-col3"  width="160" style="vertical-align: top">
                                {!!$item->ndct!!}
                            </td>
                            <td class="table-col3" width="100" style="vertical-align: top">
                                {{$item->donVi}}
                            </td>
                            <td class="table-col3" width="100" style="vertical-align: top">
                                {{$item->thoiGianThucHien}}
                            </td>
                            <td class="table-col3" width="100" style="vertical-align: top">
                                {!!$item->ghiChu!!}
                            </td>
                        </tr>
                    @endif
                @endforeach
            @endforeach
        @endforeach
        </tbody>
    </table>
</div>
<div id="page-content" style="page-break-before: always" class="Section1">
    <h1 style="text-align:center">DANH MỤC MÃ MINH CHỨNG BÁO CÁO GIỮA KỲ</h1>
    <div style="margin-top: 15px">
        <table border="1" class="table-content-1" cellspacing="0" cellpadding="0">
            <thead>
            <tr class="table-row">
                <th class="table-col table__text-center" width="130">Tiêu chuẩn, tiêu chí</th>
                <th class="table-col table__text-center" width="100">Mã Minh Chứng</th>
                <th class="table-col table__text-center">Tên minh chứng (số tên, ngày tháng năm ban hành)</th>
            </tr>
            </thead>
            <tbody>
            @foreach($tieuChuans as $tieuChuan)
                <tr>
                    <td colspan="3" class="table-col"><b>Tiêu chuẩn {{$tieuChuan->stt}}: {{$tieuChuan->ten}}</b></td>
                </tr>
                @php

                    @endphp
                @foreach($tieuChuan->tieuChi as $tieuChi)

                    @foreach($baoCaos as $item)

                        @if($tieuChi->id === $item->tieuChi_id)
                            @php
                                $count = 1;
                                foreach($minhChungs as $minhChung){
                                    if ($item->tieuChi_id === $minhChung->tieuChi_id) {
                                        $count++;
                                    }
                                }
                            @endphp
                            <tr>
                                <td rowspan="{{$count}}" class="table-col table__text-center">
                                    Tiêu chí {{$tieuChuan->stt}}.{{$tieuChi->stt}}
                                </td>
                                <td colspan="2">{{$tieuChi->ten}}</td>
                            </tr>
                            @foreach($minhChungs as $minhChung)
                                @if($tieuChi->id === $minhChung->tieuChi_id)
                                    <tr>
                                        <td>{{$minhChung->maMC}}</td>
                                        @if($minhChung->isUrl === 1)
                                            <td>{{$minhChung->link}}</td>
                                        @else
                                            <td>{{$minhChung->ten}}</td>
                                        @endif

                                    </tr>
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</div>
</body>
