
$('.multiple-input').keypress((e) => {
    var keyCode = e.keyCode || e.which;
    if (keyCode === 13) {
        e.preventDefault();
        appendInputElement($(e.target));
    }
});
$('.btn-add').on('click', (e) => {
    const $input = $(e.target).closest('.input-group-prepend').prev('input[type="text"]');
    appendInputElement($input);
});
function appendInputElement($input) {
    const val = $input.val();
    const name = $input.data('name');
    if (val) {
        const $formGroup = $input.parent().parent();
        $formGroup.append(
            `<div class="input-group mt-1">
                <input type="text" class="form-control" name="${name}" value="${val}">
                <div class="input-group-prepend">
                    <span class="input-group-text btn-secondary btn-remove" role="button"><i class="fa fa-minus"></i></span>
                </div>
            </div>`
        )
        $input.val('');
        eventBtnRemove();
    }
}
function eventBtnRemove() {
    $('.btn-remove').on('click', (e) => {
        const $input = $(e.target).closest('.input-group-prepend').parent();
        $input.hide("slow", function() {
            $(this).remove();
        });
    });
}
eventBtnRemove();

