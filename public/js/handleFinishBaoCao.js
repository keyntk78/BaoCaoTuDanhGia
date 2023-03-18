
$(".btn-finish").on("click", (e) => {
    const id = $(e.target).data('id');
    const url = $(e.target).data('url');
    const _token = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    Swal.fire({
        title: "Bạn chắc chắn chứ?",
        text: "Bạn có thể mở lại bản báo cáo nếu muốn chỉnh sửa bổ sung sau đó.",
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
                    Swal.fire("Thành công!", "Bản báo cáo này đã hoàn thành!", "success");
                    $('.swal2-confirm').on('click', () => {
                        location.reload();
                    })
                },
            })
        }
    });
});
$(".btn-reopen").on("click", (e) => {
    const id = $(e.target).data('id');
    const url = $(e.target).data('url');
    const _token = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    Swal.fire({
        title: "Bạn chắc chắn chứ?",
        text: "Bạn có thể đặt lại trạng thái hoàn thành bản báo cáo sau khi kết thúc việc chỉnh sửa bổ sung.",
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
                    Swal.fire("Thành công!", "Bản báo cáo này đã được mở lại!", "success");
                    $('.swal2-confirm').on('click', () => {
                        location.reload();
                    })
                },
            })
        }
    });
});

