$(".btn-backup").on("click", (e) => {
    const id = $(e.target).data('id');
    const url = $(e.target).data('url');
    const _token = $('meta[name="csrf-token"]').attr('content');
    e.preventDefault();
    Swal.fire({
        title: "Xác nhận sao lưu?",
        text: "Nhấn xác nhận bên dưới để thực hiện sao lưu",
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
                    Swal.fire("Thành công!", "Sao lưu thành công", "success");
                },
            })
        }
    });
});
