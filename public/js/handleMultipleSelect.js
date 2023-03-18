
$('.tags-select').select2({
    insertTag: function (data, tag) {
        data.push(tag);
    },
    tags: true,
    tokenSeparators: [','],
    width: '100%'
});
$('.tags-select-only').select2({
    insertTag: function (data, tag) {
        data.push(tag);
    },
    tokenSeparators: [','],
    width: '100%'
});

