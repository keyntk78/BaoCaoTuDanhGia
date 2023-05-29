
@php
    $date = new \DateTime('now');
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
        <table style="border: none" >
            <tr style="text-align: center; border: none">
                <td style="border: none; font-weight: normal"><h3>BỘ GIÁO DỤC VÀ ĐÀO TẠO</h3></td>
                <td style="border: none"><h3>CỘNG HÒA XÃ HỘI CHỦ NGHĨA VIỆT NAM</h3></td>
            </tr>
            <tr style="text-align: center; border: none">
                <td style="border: none" ><h3>TRƯỜNG ĐẠI HỌC NHA TRANG</h3></td>
                <td style="border: none"><h3>Độc lập – Tự do – Hạnh phúc</h3></td>
            </tr>
            <tr  style="text-align: center; border: none">
                <td style="border: none">Số: ... /BC-ĐHNT</td>
                <td style="border: none ; font-style: italic ">Khánh Hòa, ...  ngày ...  tháng ...  năm 2022</td>
            </tr>
        </table>

        <h1 class="h1--uppercase" style="text-align: center" >Báo cáo giữa kỳ</h1>
        <h1 style="text-align: center; margin: 0">Kết quả kiểm định chất lượng chương trình đào tạo và kế hoạch cải tiến,
            nâng cao chất lượng chương trình đào tạo ngành {{$nganh->ten}}</h1>
        <p style="margin-bottom: 0" class="text-content">…..</p>
        <p style="margin-top: 0" class="text-content">Song song với hoạt động đảm bảo chất lượng của Nhà trường, Bộ môn cũng thường xuyên tổ chức dự giờ giảng của các học phần và lắng nghe, phân tích,
            tiếp thu ý kiến của sinh viên để hoàn thiện công tác giảng dạy nhằm nâng cao chất lượng. </p>
        <h2 class="h-content">I.	THÔNG TIN VỀ CHƯƠNG TRÌNH ĐÀO TẠO</h2>
        <h3 class="h-content">1.	Thời điểm được công nhận: <span style="font-weight: normal">{{$dotDanhGiaGk->thoiDiemCongNhan}}</span></h3>
        <h3 class="h-content">2.	Tên tổ chức Kiểm định chất lượng giáo dục: <span style="font-weight: normal">{{$dotDanhGiaGk->tenToChucKiemDinh}}</span></h3>
        <h3 class="h-content">3.	Kết quả chung việc thực hiện đánh giá và cải tiến nâng cao chất lượng</h3>

        <div>
            <table border="1" class="table-content-1" cellspacing="0" cellpadding="0">
                <thead>
                <tr class="table-row">
                    <th rowspan="2" class="table-col table__text-center">Tiêu chuẩn, tiêu chí</th>
                    <th colspan="2" class="table-col table__text-center">Đánh giá tiêu chí</th>
                    <th rowspan="2" class="table-col table__text-center">CSGD tự xác định kết quả đạt được sau khi
                        thực hiện cải tiến NCCL
                    </th>
                    <th rowspan="2" class="table-col table__text-center">
                        Ghi chú <br><span style="font-weight: normal; font-style: italic">(Đối với tiêu chí sau khi cải tiến chất lượng có thay đổi kết quả so với ĐGN:
                        nêu vắn tắt lý do)</span>
                    </th>
                </tr>
                <tr>
                    <th class="table-col">TĐG</th>
                    <th class="table-col">ĐGN</th>
                </tr>
                </thead>
                <tbody>
                @foreach($tieuChuans as $tieuChuan)
                    <tr>
                        <td colspan="5" class="table-col"><b>Tiêu chuẩn {{$tieuChuan->stt}}</b></td>
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
                                @foreach($baoCaoGiuaKy as $item)
                                    @if($tieuChi->id === $item->tieuChi_id)
                                        <td style="text-align: center">
                                            {{$item->tdg}}
                                        </td>
                                        <td style="text-align: center">
                                            {{$item->dgn}}
                                        </td>
                                        <td style="text-align: center">
                                            {{$item->tuXacDinhKQ}}
                                        </td>
                                        <td class="table-col" style="">
                                            {!!$item->neuVanTat!!}
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
        <h3 class="h-content" style="margin-top: 10px">4.	Kết quả cải tiến chất lượng theo từng tiêu chí (Theo phụ lục đính kèm)</h3>
        <h2 class="h-content">II.	ĐỀ XUẤT, KIẾN NGHỊ: không</h2>
        <table style="border: 1px; margin-top: 20px; width: 100%"  >
            <tr style="margin: 0; padding: 0; border: 1px">
                <td style="border: 1px;  font-weight: bold; font-style:italic; font-size: 16px ">Nơi nhận:</td>
                <td colspan="4" style="border: 1px; text-align: center; font-weight: bold">HIỆU TRƯỞNG</td>
            </tr>
            <tr style="margin: 0; padding: 0; border: none">
                <td style="border: 1px;margin: 0; padding: 0 ;font-style:italic; font-size: 15.77777px" >- Cục QLCL (để b/c);</td>
            </tr>
            <tr  style="margin: 0; padding: 0; border: 1px">
                <td style="border: 1px; margin: 0; padding: 0; font-style:italic; font-size: 15.7777px">- TT KĐCLGD – ĐHQG TP.HCM (để b/c);</td>
            </tr>
            <tr  style="border: 1px; margin: 0; padding: 0">
                <td style="border: 1px; margin: 0; padding: 0; font-style:italic; font-size: 15.7777px">- Lưu: VT, ĐBCL&KT.</td>
            </tr>
            </table>
    </div>
</div >
</body>

