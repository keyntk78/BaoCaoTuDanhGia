const dialogConfig = {
    title: "Chèn minh chứng",
    url: "iframe",
    buttons: [
        {
            type: "custom",
            name: "insert",
            text: "Chèn",
            primary: true,
            align: "end",
        },
        {
            type: "cancel",
            name: "cancel",
            text: "Hủy",
        },
    ],
    width: 1000,
    height: 500,
    onAction: function (instance, _trigger) {
        instance.sendMessage({
            mceAction: "customInsertAndClose",
        });
    },
};
tinymce.init({
    selector: "textarea.tiny-editor",
    relative_urls: false,
    content_css: "../../css/tiny-editor.css",
    fontsize_formats: "8pt 10pt 12pt 13pt 14pt 18pt 24pt 36pt",
    plugins:
        "advlist autolink lists link image charmap preview anchor pagebreak searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking save table directionality emoticons template",
    toolbar:
        "insertfile undo redo | styleselect | bold italic | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | link image minhchung",
    link_default_target: "_blank",
    file_picker_callback: function (callback, value, meta) {
        let x =
            window.innerWidth ||
            document.documentElement.clientWidth ||
            document.getElementsByTagName("body")[0].clientWidth;
        let y =
            window.innerHeight ||
            document.documentElement.clientHeight ||
            document.getElementsByTagName("body")[0].clientHeight;
        let type = "image" === meta.filetype ? "Images" : "Files",
            url = "/laravel-filemanager?editor=tinymce5&type=" + type;
        tinymce.activeEditor.windowManager.openUrl({
            url: url,
            title: "Filemanager",
            width: x * 0.8,
            height: y * 0.8,
            onMessage: (api, message) => {
                callback(message.content);
            },
        });
    },
    setup: function (editor) {
        editor.ui.registry.addButton("minhchung", {
            text: "Minh chứng",
            onAction: () => {
                _api = editor.windowManager.openUrl(dialogConfig);
            },
        });

        editor.addCommand("iframeCommand", function (ui, value) {
            editor.insertContent(
                `<a target="_blank" rel="nofollow noopener" href="${value.href}" class="is-minhchung" style="color: #000;font-weight: bold;text-decoration: none;">[${value.title}]</a>`
            );
        });
    },
});
