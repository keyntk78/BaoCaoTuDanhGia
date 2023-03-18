
$(".btn-delete").on("click", (e) => {
    const id = $(e.target).data('id');
    const url = $(e.target).data('url');
    const _token = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    Swal.fire({
        title: "Bạn chắc chắn chứ?",
        text: "Bạn có thể hoàn tác lại bản ghi này ở thùng rác.",
        icon: "warning",
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
                    Swal.fire("Thành công!", "Bản ghi đã được đưa vào thùng rác!", "success");
                    if ($(e.target).data('redirect')) {
                        eventRedirect($(e.target).data('redirect'));
                    } else {
                        if ($('.trash-count').text() !== '') {
                            let count = $('.trash-count').text();
                            count = count.substring(1);
                            count = count.substring(0, count.length - 1);
                            count = parseInt(count);
                            count = count + 1;
                            $('.trash-count').text('(' + count + ')');
                        } else {
                            $('.trash-count').text('(1)');
                        }
                        appendRowEmptyText('Chưa có bản ghi nào!', $(e.target));
                        $(e.target).parent().parent().remove();
                    }
                },
            })
        }
    });
});

$(".btn-force-delete").on("click", (e) => {
    const id = $(e.target).data('id');
    const url = $(e.target).data('url');
    const _token = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    Swal.fire({
        title: "Xóa vĩnh viễn?",
        text: "Bạn không thể hoàn tác lại bản ghi này sau khi nhấn xác nhận.",
        icon: "warning",
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
                    Swal.fire("Thành công!", "Bản ghi đã được xóa vĩnh viễn!", "success");
                    appendRowEmptyText('Thùng rác trống!', $(e.target));
                    $(e.target).parent().parent().remove();
                },
            })
        }
    });
});

$(".btn-force-delete-all").on("click", (e) => {
    const url = $(e.target).closest('.btn-force-delete-all').data('url');
    const _token = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    Swal.fire({
        title: "Xóa vĩnh viễn?",
        text: "Bạn không thể hoàn tác lại tất cả các bản ghi này sau khi nhấn xác nhận.",
        icon: "warning",
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
                    Swal.fire("Thành công!", "Toàn bộ bản ghi đã được xóa vĩnh viễn!", "success");
                    appendRowEmptyText('Thùng rác trống!', null, true);
                    eventRedirect($(e.target).closest('.btn-force-delete-all').data('redirect'));
                },
            })
        }
    });
});

$(".btn-delete-backup").on("click", (e) => {
    const id = $(e.target).data('id');
    const url = $(e.target).data('url');
    const _token = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    Swal.fire({
        title: "Bạn chắc chắn chứ?",
        text: "Bạn không thể hoàn tác lại bản ghi này.",
        icon: "warning",
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
                    Swal.fire("Thành công!", "Bản ghi đã được xóa hoàn toàn!", "success");
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

