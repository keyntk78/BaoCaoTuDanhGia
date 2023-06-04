$('#select-1').on('change', (e) => {
    const _token = $('meta[name="csrf-token"]').attr('content');
    const quyen_id = $(e.target).val();
    const nhomNguoiDung_id = $('#nhomNguoiDung_id').val();
    $.ajax({
        type: 'POST',
        url: 'nhomnguoidung/handle-select-quyen',
        data: { quyen_id , nhomNguoiDung_id, _token},
        success: (datas) => {
            console.log(datas.baoCaos)
            $('#select-2').html('');
            for (data of datas.baoCaos) {
                $('#select-2').append(`<option value="${data.id}">Báo cáo số ${data.tieu_chuan.stt}.${data.tieu_chi.stt}</option>`);
            }
        },
    })
})
