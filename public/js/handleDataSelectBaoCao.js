
$('#nganh_id').on('change', (e) => {
    const _token = $('meta[name="csrf-token"]').attr('content');
    const nganhId = $(e.target).val();
    $.ajax({
        type: 'POST',
        url: 'baocao/handle-select-nganh',
        data: { nganhId , _token},
        success: (datas) => {
            $('#tieuChuan_id').html('');
            for (data of datas.tieuChuans) {
                $('#tieuChuan_id').append(`<option value="${data.id}">Tiêu chuẩn số ${data.stt}: ${data.ten}</option>`);
            }
            $('#tieuChi_id').html('');
            datas.tieuChis.sort((a, b) => {return a.stt - b.stt});
            for (data of datas.tieuChis) {
                const length = data.ten.split(' ').length;
                if (length > 25) {
                    data.ten = data.ten.split(' ').slice(0, 25).join(' ') + '...';
                }
                $('#tieuChi_id').append(`<option value="${data.id}">Tiêu chí số ${data.tieu_chuan.stt}.${data.stt}: ${data.ten}</option>`);
            }
        },
    })
})

$('#tieuChuan_id').on('change', (e) => {
    const _token = $('meta[name="csrf-token"]').attr('content');
    const tieuChuanId = $(e.target).val();
    $.ajax({
        type: 'POST',
        url: 'baocao/handle-select-tieuchuan',
        data: { tieuChuanId , _token},
        success: (datas) => {
            $('#tieuChi_id').html('');
            datas.tieuChis.sort((a, b) => {return a.stt - b.stt});
            for (data of datas.tieuChis) {
                const length = data.ten.split(' ').length;
                if (length > 25) {
                    data.ten = data.ten.split(' ').slice(0, 25).join(' ') + '...';
                }
                $('#tieuChi_id').append(`<option value="${data.id}">Tiêu chí số ${data.tieu_chuan.stt}.${data.stt}: ${data.ten}</option>`);
            }
        },
    })
})

