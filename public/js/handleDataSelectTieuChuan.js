$(document).ready(function (){

    $('#boTieuChuan_id').on('change', function (){
        var boTieuChuan_id = $(this).val();
        if(boTieuChuan_id == 0) {
            $('#tieuChuan_id').empty();
            $('#tieuChuan_id').prop('disabled', true);
            $('#tieuChuan_id').append(`<option value="0" selected>Chọn tiêu chuẩn</option>`);
        } else  {
            $('#tieuChuan_id').prop('disabled', false);
            $("#tieuChuan_id").val('').change();
            $('#tieuChuan_id').empty();
            $('#tieuChuan_id').append(`<option value="" disabled selected>Chọn tiêu chuẩn</option>--}}`);
            $.ajax({
                type: 'GET',
                url: 'tieuchi/handleSelectTieuChuan/' + boTieuChuan_id,
                success: function (res) {
                    var respone = res.tieuChuans;
                    respone.forEach(element => {
                        $('#tieuChuan_id').append(`<option value="${element['id']}">Tiêu chuẩn số ${element['stt']}: ${element['ten']}</option>--}}`);
                    })
                }
            })
        }
    });
});
