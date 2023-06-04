
$('#nganh_id').on('change', (e) => {


    if ($(e.currentTarget).val() !== '') {
        $('#select-1').prop('disabled', false);
        $("#select-1").val('').change();
        $('#select-2').prop('disabled', false);
        $("#select-2").val('').change();
        $('.btn-add').removeClass('d-none');
    } else {
        $('#select-1').prop('disabled', true);
        $('#select-1').removeClass('is-invalid', true);
        $('#select-2').prop('disabled', true);
        $('#select-2').removeClass('is-invalid', true);
        $('.btn-add').addClass('d-none');
        $('.wrap-selected').hide("slow", () => {
            $('.wrap-selected').remove();
        });
    }
})

$('#select-1').on('change', (e) => {
    if ($('#select-2').val() === '') {
        const quyenId = $(e.target).val();
        const nganhId = $('#nganh_id').val();
        const nhomId = $('#nhom_id').length !== 0 ? $('#nhom_id').val() : null;
        const _token = $('meta[name="csrf-token"]').attr('content');
        if ($('#select-1').val() !== '') {
            $.ajax({
                type: 'POST',
                url: 'nhom/handle-select',
                data: { nhomId, quyenId, nganhId , _token},
                success: (datas) => {
                    console.log(datas.nhoms)
                    $('#select-2').html('').append('<option value="" selected>Chọn tiêu chuẩn</option>');
                    for (data of datas.tieuChuans) {
                        if (!datas.tieuChuanIds.includes(data.id)) {
                            $('#select-2').append(`<option value="${data.id}">Tiêu chuẩn số ${data.stt}</option>`);
                        }
                    }
                },
            })
        } else {
            $.ajax({
                type: 'POST',
                url: 'nhom/handle-select',
                data: { _token },
                success: (datas) => {
                    $('#select-1').html('').append('<option value="" selected>Chọn quyền</option>');
                    for (data of datas.quyenNhoms) {
                        $('#select-1').append(`<option value="${data.id}">${data.ten}</option>`);
                    }
                    $('#select-2').html('').append('<option value="" selected>Chọn tiêu chuẩn</option>');
                    for (data of datas.tieuChuans) {
                        $('#select-2').append(`<option value="${data.id}">Tiêu chuẩn số ${data.stt}</option>`);
                    }
                },
            })
        }
    }
})

$('#select-2').on('change', (e) => {
    if ($('#select-1').val() === '') {
        const tieuChuanId = $(e.target).val();
        const nganhId = $('#nganh_id').val();
        const nhomId = $('#nhom_id').length !== 0 ? $('#nhom_id').val() : null;
        const _token = $('meta[name="csrf-token"]').attr('content');
        if ($('#select-2').val() !== '') {
            $.ajax({
                type: 'POST',
                url: 'nhom/handle-select',
                data: { nhomId, tieuChuanId, nganhId , _token},
                success: (datas) => {
                    $('#select-1').html('').append('<option value="" selected>Chọn quyền</option>');
                    for (data of datas.quyenNhoms) {
                        if (!datas.quyenIds.includes(data.id)) {
                            $('#select-1').append(`<option value="${data.id}">${data.ten}</option>`);
                        }
                    }
                },
            })
        } else {
            $.ajax({
                type: 'POST',
                url: 'nhom/handle-select',
                data: { _token },
                success: (datas) => {
                    $('#select-1').html('').append('<option value="" selected>Chọn quyền</option>');
                    for (data of datas.quyenNhoms) {
                        $('#select-1').append(`<option value="${data.id}">${data.ten}</option>`);
                    }
                    $('#select-2').html('').append('<option value="" selected>Chọn tiêu chuẩn</option>');
                    console.log(datas.tieuChuans)
                    for (data of datas.tieuChuans) {
                        $('#select-2').append(`<option value="${data.id}">Tiêu chuẩn số ${data.stt}</option>`);
                    }
                },
            })
        }
    }
})

