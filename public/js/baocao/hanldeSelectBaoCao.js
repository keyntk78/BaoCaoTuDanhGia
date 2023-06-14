$('#nganh_id').on('change', (e) => {
    if ($('#nganh_id').val() !== ''){
        const nganhId = $('#nganh_id').val();
        $('#tieuChuan_id').prop('disabled', false)
        $('#tieuChuan_id').val('').change()

        $('#tieuChuan_id').empty()
        $('#tieuChuan_id').append(
            `<option value=""  selected>Chọn tiêu chuẩn</option>--}}`
        )

        const _token = $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            type: 'POST',
            data: { nganhId, _token },
            url: 'baocao/handle-select-nganh',
            success: function (res) {
                var tieuChuan = res.data;
                tieuChuan.forEach(element => {
                    $('#tieuChuan_id').append(`<option value="${element.id}" >Tiêu chuẩn số ${element.stt}</option>--}}`);
                })
            },
        })
    } else {
        $('#tieuChuan_id').prop('disabled', true)
        $('#tieuChuan_id').removeClass('is-invalid', true)
        $('#tieuChi_id').prop('disabled', true)
        $('#tieuChi_id').removeClass('is-invalid', true)
    }
})

$('#tieuChuan_id').on('change', (e) => {
    if ($(e.currentTarget).val() !== '') {
        const tieuChuanId = $(e.target).val();
        const nganhId = $('#nganh_id').val();
        const _token = $('meta[name="csrf-token"]').attr('content');

        $('#tieuChi_id').prop('disabled', false)
        $('#tieuChi_id').val('').change()
        $('.btn-add').removeClass('d-none')

        $('#tieuChi_id').empty()
        $('#tieuChi_id').append(
            `<option value="" selected>Chọn tiêu chí</option>--}}`
        )

        $.ajax({
            type: 'POST',
            data: { tieuChuanId,nganhId, _token },
            url: 'baocao/handle-select-tieuchuan',
            success: function (res) {
                var tieuChi = res.data;
                tieuChi.forEach(element => {
                    if (element.ten.length > 140) {
                        var ten = element.ten.substr(0,140 ) + "...";
                    } else {
                        ten = element.ten
                    }

                    $('#tieuChi_id').append(`<option value="${element.id}" data-stt="${element.stt}" >Tiêu chí số ${element.stt}: ${ten}</option>--}}`);
                })
            },
        })

    } else {
        $('#tieuChi_id').prop('disabled', true)
        $('#tieuChi_id').removeClass('is-invalid', true)
    }
})

