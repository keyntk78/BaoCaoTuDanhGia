
$(".btn-reset").on("click", (e) => {
    const id = $(e.target).data('id');
    const url = $(e.target).data('url');


    const _token = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    Swal.fire({
        title: "Bạn chắc chắn chứ?",
        text: "Người dùng sẽ được đặt lại mật khẩu mặt định.",
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
                    Swal.fire("Thành công!", "Người dùng đã đặt lại mật khẩu mặt định!", "success");
                },
            })
        }
    });
});
