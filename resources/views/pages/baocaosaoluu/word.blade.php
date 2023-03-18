{{-- @php
header('Content-Type: application/vnd.msword');
header('Content-Disposition: attachment; filename="test.doc"');
header('Cache-Control: private, max-age=0, must-revalidate');
@endphp --}}

<head>
    <title>Export HTML to WORD</title>
    <link rel="stylesheet" href="http://localhost:8000/css/tiny-editor.css">
    <style>
        @page {
            size: A4 landscape;
            margin: 1.25cm 2cm 1.5cm 2cm;
        }

        p {
            font-size: 16px;
            margin-top: 0;
            padding-top: 0
        }

        table {
            font-size: 14.3px
        }

        h1 {
            font-size: 18.5px;
            text-align: center;
        }

        h2 {
            font-size: 16px;
            text-align: left;
            margin-bottom: 0;
            padding-bottom: 0
        }

    </style>
</head>

<body>
    <div id="page-content">
        <p style="font-weight:bold">Mô tả</p>
        {!! $baoCao->moTa !!}
        <p style="font-weight:bold">Điểm mạnh</p>
        {!! $baoCao->diemManh !!}
        <p style="font-weight:bold">Điểm tồn tại</p>
        {!! $baoCao->diemTonTai !!}
        <p style="font-weight:bold">Kế hoạch hành động</p>
        {!! $baoCao->keHoachHanhDong !!}
        <p style="font-weight:bold">Điểm tự đánh giá</p>
        {!! $baoCao->diemTDG !!}
    </div>
</body>

</html>
