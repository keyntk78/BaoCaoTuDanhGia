$('#tieuChi_id').on('change', () => {
    const stt = $('#tieuChi_id').find('option:selected').data('stt');
    $('.is-normal-tieuchi').removeClass('d-none');
    $('.is-tieuchi-0').removeClass('d-none');
    if (stt == 0) {
        $('.is-normal-tieuchi').addClass('d-none');
    } else {
        $('.is-tieuchi-0').addClass('d-none');
    }
})
