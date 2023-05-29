@php
$date = new \DateTime('now');
$tenNganh = implode('', array_map(function($v) { return $v[0]; }, explode(' ', ucwords($nganh->ten))));
$fileName = 'BaoCaoTDG' . '_' . $tenNganh . '_' . $date->format('d-m-Y-h-i-s');
header('Content-Type: application/vnd.msword');
header('Content-Disposition: attachment; filename="'.$fileName.'.doc"');
header('Cache-Control: private, max-age=0, must-revalidate');
@endphp

<head>
    <title>Export HTML to WORD</title>
    <style>
        body {
            text-align: justify;
            line-height: 150%;
        }
        p {
            font-size: 17.333333px;
            margin: 0;
            padding: 0;
            text-align: justify;
            text-indent: 37.467px;
            line-height: 150%;
        }

        table {
            font-size: 17.333333px;
        }

        h1 {
            font-size: 18.6666666667px;
            margin: 0;
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
            text-align: center;
            text-transform: uppercase;
            font-weight: bold;
        }
        h3, .h3 {
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

    </style>
</head>

<body>
    <div id="page-content">
        <h1>TỰ ĐÁNH GIÁ THEO CÁC TIÊU CHUẨN, TIÊU CHÍ</h1>
        @foreach ($tieuChuans as $tieuChuan)
            <h2>TIÊU CHUẨN {{ $tieuChuan->stt }}. {{ $tieuChuan->ten }}</h2>
            <h3>Mở đầu</h3>
            @php
                $ketLuanBaoCao = $tieuChuan->tieuChi[0]->baoCao->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->first();
            @endphp
            {!! $ketLuanBaoCao->moDau !!}
            @foreach ($tieuChuan->tieuChi as $tieuChi)
                @if ($loop->first) @continue @endif
                <h3>Tiêu chí số {{ $tieuChuan->stt }}.{{ $tieuChi->stt }}. {{ $tieuChi->ten }}</h3>
                @php
                    $baoCao = $tieuChi->baoCao->where('nganh_id', $nganh->id)->where('dotDanhGia_id', $nganh->dotDanhGia_id)->first();
                    $html = html_entity_decode($baoCao->moTa);
                    foreach($hopMCs as $hopMC) {
                        $html = str_replace($hopMC->text, $hopMC->maHMC, $html);
                    }
                    $baoCao->moTa = $html;
                @endphp
                <p class="h3">1. Mô tả hiện trạng</p>
                {!! $baoCao->moTa !!}
                <p class="h3">2. Điểm mạnh</p>
                {!! $baoCao->diemManh !!}
                <p class="h3">3. Điểm tồn tại</p>
                {!! $baoCao->diemTonTai !!}
                <p class="h3">4. Kế hoạch hành động</p>
                {!! $baoCao->keHoachHanhDong !!}
                <p class="h3">5. Tự đánh giá</p>
                <p>{!! $baoCao->diemTDG >= 4 ? 'Đạt' : 'Chưa đạt' !!} (Điểm TĐG: {!! $baoCao->diemTDG !!}/7)</p>
            @endforeach
            <h3>Kết luận về Tiêu chuẩn {{ $tieuChuan->stt }}</h3>
            {!! $ketLuanBaoCao->ketLuan !!}
            <p class="h3">Tổng số tiêu chí đạt yêu cầu: {{$ketLuanBaoCao->soTCDat}}/{{$ketLuanBaoCao->tongSoTC}}</p>
        @endforeach
    </div>
</body>
</html>
