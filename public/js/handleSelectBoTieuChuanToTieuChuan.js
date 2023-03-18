$(document).ready(function (){
    $('#boTieuChuan_id').on('change', function (){
       let boTieuChuan_id = $(this).val();
       console.log(boTieuChuan_id);
       if(boTieuChuan_id == 0) {
           $('#tieuChuan_id').empty();
           $('#tieuChuan_id').append(``);
       } else  {
           $('#tieuChuan_id').empty();
           $('#tieuChuan_id').append(`<option value="" disabled selected>Chọn tiêu chuẩn</option>--}}`);
           $.ajax({
               type: 'GET',
               url: 'tieuchi/getAllTieuChuanJson/' + boTieuChuan_id,
               success: function (res) {
                   var respone = JSON.parse(res);
                   respone.forEach(element => {
                       $('#tieuChuan_id').append(`<option value="${element['id']}">Tiêu chuẩn số ${element['stt']}: ${element['ten']}</option>--}}`);
                   })
               }
           })
       }

    });
});
