$(document).ready(function (){
    $('#dotDanhGiaGK_id').on('change', function (){
        let dotDanhGiaGK_id = $(this).val();
        if (dotDanhGiaGK_id === '') {
            $('#nganh_id').prop('disabled', true);
            $('#nganh_id').empty();
            $('#nganh_id').append(`<option value=""  selected>Chọn ngành</option>`);
            $('#tieuChuan_id').prop('disabled', true);
            $('#tieuChuan_id').empty();
            $('#tieuChuan_id').append(`<option value="">Chọn tiêu chuẩn</option>`);
            $('#tieuChi_id').prop('disabled', true);
            $('#tieuChi_id').empty();
            $('#tieuChi_id').append(`<option value="">Chọn tiêu chí</option>`);
        } else  {
            $('#nganh_id').prop('disabled', false);
            $('#nganh_id').empty();
            $('#nganh_id').append(`<option value="">Chọn ngành</option>`);

            $.ajax({
                type: 'GET',
                url: 'baocaogiuaky/handleSelectNganh/' + dotDanhGiaGK_id,
                success: function (res) {
                    if (res.err === 0) {
                        let respone = res.data;

                        respone.forEach(item => {
                            $('#nganh_id').append(`<option value="${item.nganh_id}">${item.tenNganh}</option>--}}`);
                        })
                    } else  {
                        console.log(res.message)
                    }
                }
            })
            $('#nganh_id').on('change', function(){
                let nganh_id = $(this).val();
                if(nganh_id === '') {
                    $('#tieuChuan_id').prop('disabled', true);
                    $('#tieuChuan_id').empty();
                    $('#tieuChuan_id').append(`<option value="">Chọn tiêu chuẩn</option>`);
                } else  {
                    $('#tieuChuan_id').prop('disabled', false);
                    $('#tieuChuan_id').empty();
                    $('#tieuChuan_id').append(`<option value="">Chọn tiêu chuẩn</option>`);
                    $.ajax({
                        type: 'GET',
                        url: 'baocaogiuaky/handleSelectTieuChuan/' + dotDanhGiaGK_id,
                        success: function (res) {
                            if (res.err === 0) {
                                let respone = res.data;

                                respone.forEach(item => {
                                    $('#tieuChuan_id').append(`<option value="${item.id}">Tiêu chuẩn số ${item.stt}: ${item.ten}</option>--}}`);
                                })
                            } else  {
                                console.log(res.message)
                            }
                        }
                    })
                    $('#tieuChuan_id').on('change', function (){
                        let tieuChuan_id = $(this).val();
                        if (tieuChuan_id === '') {
                            $('#tieuChi_id').prop('disabled', true);
                            $('#tieuChi_id').empty();
                            $('#tieuChi_id').append(`<option value=""  selected>Chọn tiêu chí</option>`);
                        } else  {
                            $('#tieuChi_id').prop('disabled', false);
                            $('#tieuChi_id').empty();

                            $.ajax({
                                type: 'GET',
                                url: `baocaogiuaky/handleSelectTieuChi/${dotDanhGiaGK_id}/${nganh_id}/${tieuChuan_id}`,
                                success: function (res) {
                                    if (res.err === 0) {
                                        let respone = res.data;
                                        if(respone.length > 0) {
                                            respone.forEach(item => {
                                                $('#tieuChi_id').append(`<option value="${item.id}">Tiêu chí số ${item.stt}: ${item.ten}</option>--}}`);
                                            })
                                        } else {
                                            $('#tieuChi_id').append(`<option value="">Chọn tiêu chí</option>`);
                                        }
                                    } else  {
                                        console.log(res.message)
                                    }
                                }
                            })
                        }
                    });
                }
            })

        }
    });

});
