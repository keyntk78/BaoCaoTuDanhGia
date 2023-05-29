@php
    $date = new \DateTime('now');
    $tenNganh = implode('', array_map(function($v) { return $v[0]; }, explode(' ', ucwords("Công nghệ thông tin"))));
    $fileName = 'BaoCaoVanTat' . '_' . $tenNganh . '_' . $date->format('d-m-Y-h-i-s');
    header('Content-Type: application/vnd.msword');
    header('Content-Disposition: attachment; filename="'.$fileName.'.doc"');
    header('Cache-Control: private, max-age=0, must-revalidate');
@endphp
<head>
    <title>Export HTML to WORD</title>
    <style>
        @page Section1 {
            size: A4;
            margin: 2cm 1cm 2cm 2cm;
            mso-header-margin: .5in;
            mso-footer-margin: .5in;
            mso-paper-source: 0;
            mso-column-break-before: always;

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

        .table-row{

        }

        .table-col {
            padding: 10px;
            vertical-align: top;
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
        h3
        {
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

<div id="page-content" style="page-break-after: always" class="Section1">
    <div class="layout">
        <h1 class="h1--uppercase" style="text-align: center" >TỰ ĐÁNH GIÁ THEO CÁC TIÊU CHUẨN, TIÊU CHÍ</h1>
    </div>
    <div>
        <table border="1" class="table-content-1" cellspacing="0" cellpadding="0">
            <thead>
            <tr class="table-row">
                <th class="table-col table__text-center">Tiêu chuẩn, tiêu chí</th>
                <th class="table-col table__text-center">Điểm mạnh</th>
                <th class="table-col table__text-center">Điểm tồn tại</th>
                <th class="table-col table__text-center">
                    Kế hoạch hành động
                </th>
            </tr>
            </thead>
            <tbody>
            @foreach($tieuChuans as $tieuChuan)
                <tr>
                    <td colspan="4" class="table-col"><b>Tiêu chuẩn {{$tieuChuan->stt}}</b></td>
                </tr>
                @foreach($tieuChuan->tieuChi as $tieuChi)
                    @php
                        $string ='Tổng kết tiêu chuẩn'. ' '. $tieuChuan->stt;
                         $check = strcmp( $tieuChi->ten,$string);
                    @endphp
                    @if($check !== 0)
                        <tr>
                            <td class="table-col table__text-center">
                                Tiêu chí {{$tieuChuan->stt}}.{{$tieuChi->stt}}
                            </td>
                            @foreach($baocaos as $item)
                                @if($tieuChi->id === $item->tieuChi_id)
                                    <td style="padding: 5px;vertical-align: top">
                                        {!! $item->diemManh !!}
                                    </td>
                                    <td style="padding: 5px;vertical-align: top">
                                        {!! $item->diemTonTai !!}
                                    </td>
                                    <td style="padding: 5px;vertical-align: top">
                                        {!! $item->keHoachHanhDong !!}
                                    </td>
                                @endif
                            @endforeach
                        </tr>
                    @endif
                @endforeach
            @endforeach
            </tbody>
        </table>
    </div>
</div >
</body>

