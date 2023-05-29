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
                    if(data.err == 0) {
                        Swal.fire("Thành công!", "Bản ghi đã được phục hồi!", "success");
                        appendRowEmptyText('Thùng rác trống!', $(e.target));
                        $(e.target).parent().parent().remove();
                    } else if (data.err == 1) {
                        Swal.fire("Thất bại!", data.message, "error");
                    }  else {
                        Swal.fire("Thất bại!", "Phục hồi thất bại", "error");
                    }
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
                    if(data.err == 0) {
                         Swal.fire("Thành công!", "Toàn bộ bản ghi đã được phục hồi!", "success");
                        appendRowEmptyText('Thùng rác trống!', null, true);
                        eventRedirect($(e.target).closest('.btn-restore-all').data('redirect'));
                        $(e.target).parent().parent().remove();
                    } else if (data.err == 1) {
                        Swal.fire("Thất bại!", data.message, "error");
                    }  else {
                        Swal.fire("Thất bại!", "Phục hồi thất bại", "error");
                    }
                },
            })
        }
    });
});
