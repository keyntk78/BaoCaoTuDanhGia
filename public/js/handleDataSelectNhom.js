$('#nganh_id').on('change', (e) => {
    if ($('#nganh_id').val() !== '') {
        $('#boTieuChuan_id').empty()
        $('#boTieuChuan_id').append(
            `<option value=""  selected>Chọn bộ tiêu chuẩn</option>--}}`
        )
        $.ajax({
            type: 'GET',
            url: 'nhom/getAllBoTieuChuan',
            success: function (res) {
                var respone = res.data
                respone.forEach((element) => {
                    $('#boTieuChuan_id').append(
                        `<option value="${element.id}" >${element.ten}</option>--}}`
                    )
                })
            },
        })



    }
    else {
        $('#boTieuChuan_id').empty()
        $('#boTieuChuan_id').append(
            `<option value="" disabled selected>Chọn bộ tiêu chuẩn</option>--}}`
        )
    }
})


$('#boTieuChuan_id').on('change', (e) => {
    if ($(e.currentTarget).val() !== '') {
        $('#select-1').prop('disabled', false)
        $('#select-1').val('').change()

        $('#select-1').empty()
        $('#select-1').append(
            `<option value="" selected>Chọn quyền</option>--}}`
        )

        $.ajax({
            type: 'GET',
            url: 'nhom/getAllQuuyenNhom',
            success: function (res) {
                var quyenNhom = res.data
                quyenNhom.forEach((element) => {
                    $('#select-1').append(
                        `<option value="${element.id}" >${element.ten}</option>--}}`
                    )
                })
            },
        })


    } else {
        $('#select-1').prop('disabled', true)
        $('#select-1').removeClass('is-invalid', true)
        $('#select-2').prop('disabled', true)
        $('#select-2').removeClass('is-invalid', true)
        $('.btn-add').addClass('d-none')
        $('.wrap-selected').hide('slow', () => {
            $('.wrap-selected').remove()
        })
    }
})


$('#select-1').on('change', (e) => {
    if ($(e.currentTarget).val() !== '') {
         const quyenId = $(e.target).val();
         const nganhId = $('#nganh_id').val();
         const nhomId = $('#nhom_id').length !== 0 ? $('#nhom_id').val() : null;
         const  boTieuChuanId = $('#boTieuChuan_id').val();
         const _token = $('meta[name="csrf-token"]').attr('content');

        $('#select-2').prop('disabled', false)
        $('#select-2').val('').change()
        $('.btn-add').removeClass('d-none')

        $('#select-2').empty()
        $('#select-2').append(
            `<option value="" selected>Chọn tiêu chuẩn</option>--}}`
        )

        $.ajax({
            type: 'POST',
            data: { nganhId, boTieuChuanId, quyenId, nhomId, _token },
            url: 'nhom/getTieuChuans',
            success: function (res) {

                var tieuChuan = res.data;
                tieuChuan.forEach(element => {
                    $('#select-2').append(`<option value="${element.id}" >Tiêu chẩn số ${element.stt}</option>--}}`);
                })
            },
        })

    } else {
        $('#select-2').prop('disabled', true)
        $('#select-2').removeClass('is-invalid', true)
        $('.btn-add').addClass('d-none')
        $('.wrap-selected').hide('slow', () => {
            $('.wrap-selected').remove()
        })
    }
})

