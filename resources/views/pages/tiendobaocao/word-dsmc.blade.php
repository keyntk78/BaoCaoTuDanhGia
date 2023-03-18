@php
$date = new \DateTime('now');
$tenNganh = implode('', array_map(function($v) { return $v[0]; }, explode(' ', ucwords($nganh->ten))));
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

        p {
            font-size: 17.333333px;
            margin: 10px 0;
            padding: 0;
            line-height: 150%;
        }

        table {
            font-size: 17.333333px;
        }

        h1 {
            font-size: 18.6666666667px;
            margin: 10px 0;
            padding: 0;
            line-height: 150%;
        }

        h2,
        h3,
        .h3 {
            font-size: 17.333333px;
            margin: 0;
            padding: 0;
            text-indent: 37.467px;
            line-height: 150%;
        }

        h1,
        h2 {
            text-transform: uppercase;
            font-weight: bold;
        }

        h3,
        .h3 {
            font-weight: bold;
        }

        a.is-minhchung,
        a.is-minhchung:visited,
        a.is-minhchung:focus,
        a.is-minhchung:hover {
            color: #000;
            font-weight: bold;
            text-decoration: none;
        }

        table {
            margin-left: 3.95pt;
            border-collapse: collapse;
            mso-table-layout-alt: fixed;
            border: none;
            mso-border-alt: solid windowtext .75pt;
            mso-padding-alt: 0cm 2.55pt 0cm 2.55pt;
            mso-border-insideh: .75pt solid windowtext;
            mso-border-insidev: .75pt solid windowtext;
        }
    </style>
</head>

<body>
    <div id="page-content" class="Section1">
        <h1 style="text-align:center">Danh mục minh chứng</h1>
        <table border="1" width="968" cellspacing="0" cellpadding="0">
            <tbody>
                <tr style="mso-yfti-irow: 0; mso-yfti-firstrow: yes;">
                    <td style="width: 72.2pt; border: solid windowtext 1.0pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt;"
                        width="96">
                        <p align="center"><strong>Tiêu Chí</strong></p>
                    </td>
                    <td style="width: 35.45pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt;"
                        width="47">
                        <p align="center"><strong>Số TT</strong>
                        </p>
                    </td>
                    <td style="width: 92.15pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt;"
                        width="123">
                        <p align="center"><strong>Mã minh chứng</strong></p>
                    </td>
                    <td style="width: 207.25pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt;"
                        width="276">
                        <p align="center"><strong>Tên minh chứng</strong></p>
                    </td>
                    <td style="width: 154.2pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt;"
                        width="206">
                        <p align="center"><strong>Ngày ban hành, nơi ban hành, ngày khảo sát</strong></p>
                    </td>
                    <td style="width: 4.0cm; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt;"
                        width="151">
                        <p align="center"><strong>Đơn vị</strong></p>
                    </td>
                    <td style="width: 51.15pt; border: solid windowtext 1.0pt; border-left: none; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt;"
                        width="68">
                        <p align="center"><strong>Ghi chú</strong></p>
                    </td>
                </tr>
                {{-- Tiêu chuẩn --}}
                @foreach ($tieuChuans as $tieuChuan)
                <tr>
                    <td style="width: 725.8pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt;"
                        colspan="7" valign="top" width="968">
                        <h1 align="left" style="font-size: 17.333333px;">TIÊU CHUẨN {{ $tieuChuan->stt }}: {{ $tieuChuan->ten }}</h1>
                    </td>
                </tr>
                    {{-- Tiêu chí --}}
                    @foreach ($tieuChuan->tieuChi as $tieuChi)
                    @if ($loop->first) @continue @endif
                    @php
                        $count = 1;
                        foreach ($hopMCs as $hopMC) {
                            if ($hopMC->tieuChi_id == $tieuChi->id) {
                                $count++;
                            }
                        }
                    @endphp
                    <tr>
                        <td style="width: 72.2pt; border: solid windowtext 1.0pt; border-top: none; mso-border-top-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt;"
                            rowspan="{{ $count }}" valign="top" width="96">
                            <p><strong>Tiêu chí {{ $tieuChuan->stt }}.{{ $tieuChi->stt }}</strong></p>
                        </td>
                        <td style="width: 653.6pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .75pt; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt;"
                            colspan="6" width="871">
                            <p><strong>{{ $tieuChi->ten }}</strong></p>
                        </td>
                    </tr>
                    @php $sttMC = 1; @endphp
                    @foreach ($hopMCs as $key => $hopMC)
                    @if ($hopMC->tieuChi_id == $tieuChi->id)
                    <tr>
                        <td style="width: 35.45pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .75pt; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt; height: 14.15pt;"
                            width="47">
                            <p align="center">{{ $sttMC }}</p>
                        </td>
                        <td style="width: 92.15pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .75pt; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt; height: 14.15pt;"
                            width="123">
                            <p>{{ $hopMC->maHMC }}</p>
                        </td>
                        <td style="width: 207.25pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .75pt; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt; height: 14.15pt;"
                            width="276">
                            <p>{!! $hopMC->tenMinhChung !!}</p>
                        </td>
                        <td style="width: 154.2pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .75pt; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt; height: 14.15pt;"
                            width="206">
                            @empty(!$hopMC->ngayBH)
                            <p>Ngày BH: {{ date("d-m-Y", strtotime($hopMC->ngayBH)) }}</p>
                            @endempty
                            @empty(!$hopMC->noiBH)
                            <p>Nơi BH: {{ $hopMC->noiBH }}</p>
                            @endempty
                            @empty(!$hopMC->ngayKS)
                            <p>Ngày KS: {{ date("d-m-Y", strtotime($hopMC->ngayKS)) }}</p>
                            @endempty
                        </td>
                        <td style="width: 4.0cm; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .75pt; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt; height: 14.15pt;"
                            width="151">
                            @empty(!$hopMC->donVi)
                            <p>{{ $hopMC->donVi }}</p>
                            @endempty
                        </td>
                        <td style="width: 51.15pt; border-top: none; border-left: none; border-bottom: solid windowtext 1.0pt; border-right: solid windowtext 1.0pt; mso-border-top-alt: solid windowtext .75pt; mso-border-left-alt: solid windowtext .75pt; mso-border-alt: solid windowtext .75pt; padding: 0cm 2.55pt 0cm 2.55pt; height: 14.15pt;"
                            valign="top" width="68">
                            <p></p>
                        </td>
                    </tr>
                    @php $sttMC++; @endphp
                    @endif
                    @endforeach
                    @php $sttMC = 1; @endphp
                    @endforeach
                    {{-- End tiêu chí --}}
                @endforeach
                {{-- End tiêu chuẩn --}}
            </tbody>
        </table>
    </div>
</body>

</html>
