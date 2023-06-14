<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<style>
    .wrap-minhchung-dialog {
        padding: 20px 40px 40px;
    }
    .wrap-minhchung-select {
        display: flex;
        justify-content: center;
        align-items: center;
    }
    .wrap-btn-add-minhchung .btn-add-minhchung {
        background-color: #4e73df;
        border-radius: 6px;
        text-align: center;
        vertical-align: middle;
        display: inline-block;
        user-select: none;
        transition: all .15s;
        padding: 10px 20px;
        color: white;
        text-decoration: none;
        margin-left: 10px;
        white-space: nowrap;
    }
    .wrap-btn-add-minhchung .btn-add-minhchung:hover {
        background-color: #2e59d9;
    }
</style>
<div class="wrap-minhchung-dialog">
    <h3>Chọn minh chứng</h3>
    <div class="wrap-minhchung-select">
        <select class="form-control tags-select-only"id="minhChung">
        </select>
        <div class="wrap-btn-add-minhchung">
            <a class="btn-add-minhchung" target="_blank" href="/minhchung/create" rel="nofollow noopener">Thêm mới</a>
        </div>
    </div>
    @csrf
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    $(document).ready(function() {
        $.ajax({
            method: 'POST',
            url: "/minhchung/getall",
            data: { _token: $('input[name="_token"]').val() },
            success: (data) => {
                data.forEach((item) => {
                    var url = ''
                    if (item.isMCGop) {
                        url = window.location.origin + '/minhchung/detailTP/' + item.id
                        $('#minhChung').append(`<option value="${url}">${item.ten}</option>`)
                    } else if (item.isUrl){
                        url = item.link
                        $('#minhChung').append(`<option value="${url}">${item.ten}</option>`)
                    } else {
                        url = window.location.origin + '/minhchung/download/' + item.link
                        $('#minhChung').append(`<option value="${url}">${item.ten}</option>`)
                    }
                })
            },
        })
        $('.tags-select-only').select2({
            width: '100%'
        });
    });
    window.addEventListener('message', function(event) {
        if (event.data.mceAction === 'customInsertAndClose') {
            var value = {
                href: $('#minhChung').val(),
                title: $('.select2-selection__rendered').text()
            };

            window.parent.postMessage({
                mceAction: 'execCommand',
                cmd: 'iframeCommand',
                value
            }, origin);

            window.parent.postMessage({
                mceAction: 'close'
            }, origin);
        }
    });
</script>
