
$(".btn-restore").on("click", (e) => {
    const id = $(e.target).data('id');
    const url = $(e.target).data('url');
    const _token = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    Swal.fire({
        title: "Bạn chắc chắn chứ?",
        text: "Hành động này sẽ phục hồi bản ghi hiện tại.",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xác nhận",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url,
                data: { id, _token},
                success: (data) => {
                    Swal.fire("Thành công!", "Bản ghi đã được phục hồi!", "success");
                    appendRowEmptyText('Thùng rác trống!', $(e.target));
                    $(e.target).parent().parent().remove();
                },
            })
        }
    });
});
$(".btn-restore-all").on("click", (e) => {
    const url = $(e.target).closest('.btn-restore-all').data('url');
    const _token = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    Swal.fire({
        title: "Bạn chắc chắn chứ?",
        text: "Hành động này sẽ phục hồi toàn bộ bản ghi trong thùng rác.",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xác nhận",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url,
                data: { _token },
                success: (data) => {
                    Swal.fire("Thành công!", "Toàn bộ bản ghi đã được phục hồi!", "success");
                    appendRowEmptyText('Thùng rác trống!', null, true);
                    eventRedirect($(e.target).closest('.btn-restore-all').data('redirect'));
                },
            })
        }
    });
});
$(".btn-restore-backup").on("click", (e) => {
    const id = $(e.target).data('id');
    const url = $(e.target).data('url');
    const _token = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    Swal.fire({
        title: "Bạn chắc chắn chứ?",
        text: "Hành động này sẽ ghi đè bản sao lưu lên báo cáo hiện tại.",
        icon: "info",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Xác nhận",
        cancelButtonText: "Hủy",
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                type: "POST",
                url,
                data: { id, _token},
                success: (data) => {
                    Swal.fire("Thành công!", "Báo cáo đã được phục hồi!", "success");
                    if ($(e.target).data('redirect')) {
                        eventRedirect($(e.target).data('redirect'));
                    }
                },
            })
        }
    });
});

function eventRedirect(href) {
    $('.swal2-confirm').on('click', () => {
        window.location.href = href;
    })
}

function appendRowEmptyText(message, $el = null, isEmpty = null) {
    if ($el) {
        if ($el.parent().parent().next().length === 0 && $el.parent().parent().prev().length === 0) {
            $el.parent().parent().parent().append(`<tr><td colspan="999" class="text-center">${message}</td><tr>`);
            if ($('.trash-action').length > 0) {
                $('.trash-action').remove();
            }
        }
    }
    if (isEmpty) {
        if ($('.trash-action').length > 0) {
            $('.trash-action').remove();
        }
        $('tbody').html(`<tr><td colspan="999" class="text-center">${message}</td><tr>`);
    }
}

