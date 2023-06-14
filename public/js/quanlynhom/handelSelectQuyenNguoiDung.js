$('#select-1').on('change', (e) => {
    var duongDanHienTai = window.location.href;
    var url = new URL(duongDanHienTai);
    var nhomNguoiDung_id = url.pathname.split("/").pop();
    if ($('#select-1').val() !== ''){
        const quyen_id = $('#select-1').val();
        const _token = $('meta[name="csrf-token"]').attr('content');

        $('#select-2').prop('disabled', false)
        $('#select-2').val('').change()

        $('#select-2').empty()
        $('#select-2').append(
            `<option value=""  selected>Chọn báo cáo</option>--}}`
        )

        $.ajax({
            type: 'POST',
            data: { nhomNguoiDung_id,quyen_id, _token },
            url: 'quanlynhom/handle-select-quyen',
            success: function (res) {
                var baoCao = res.data
                console.log(res.nguoiDungQuyenModel)
                baoCao.forEach(element => {
                    $('#select-2').append(`<option value="${ element.id }">Báo cáo số ${element.tieu_chuan.stt}.${element.tieu_chi.stt}</option>`);
                })
            },
        })

    } else {
        $('#select-2').prop('disabled', true)
        $('#select-2').removeClass('is-invalid', true)
    }
})
