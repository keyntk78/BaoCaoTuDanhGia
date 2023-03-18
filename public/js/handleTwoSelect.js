
const $select1 = $("#select-1");
const $select2 = $("#select-2");
const $wrapSelect = $(".wrap-select");
function eventBtnAdd(name1, name2) {
    $(".btn-add").on("click", (e) => {
        if ($select1.val() === "") {
            addClassIsValid($select1, 'Bắt buộc');
        }
        if ($select2.val() === "") {
            addClassIsValid($select2, 'Bắt buộc');
        }
        if ($select1.val() !== "" && $select2.val() !== "") {
            if (!checkValueHasBeenSelected()) {
                text1 = $("#select-1 :selected").text();
                text2 = $("#select-2 :selected").text();
                $wrapSelect.append(
                    `<div class="form-row pl-1 w-100 wrap-selected">
                        <div class="form-group col-md-5">
                            <input type="text" class="form-control" value="${text1}" readonly>
                            <input type="hidden" class="value-1" name="${name1}" value="${$select1.val()}">
                        </div>
                        <div class="ml-3 form-group col-md-5">
                            <input type="text" class="form-control" value="${text2}" readonly>
                            <input type="hidden" class="value-2" name="${name2}" value="${$select2.val()}">
                        </div>
                        <div class="ml-3 mb-0 form-group col-md-1">
                            <div class="input-group-prepend">
                                <span class="input-group-text btn-primary btn-remove" role="button"><i
                                        class="fa fa-minus"></i></span>
                            </div>
                        </div>
                    </div>`
                );
                $("#select-1").val($("#select-1 option:first").val());
                $("#select-2").val($("#select-2 option:first").val());
                eventBtnRemove();
            } else {
                addClassIsValid($select1, 'Đã tồn tại');
                addClassIsValid($select2, 'Đã tồn tại');
            }
        }
    });
}
function addClassIsValid($el, message) {
    if (!$el.hasClass("is-invalid")) {
        $el.addClass("is-invalid");
        $el.parent().append(
            `<div class="invalid-feedback">
                ${message}
            </div>`
        );
    }
}
function removeClassIsValid($el) {
    $el.on("focus", () => {
        $el.removeClass("is-invalid");
        $el.parent().find(".invalid-feedback").remove();
    });
}
function checkValueHasBeenSelected() {
    const $wrapSelected = $(".wrap-selected");
    let = hasBeenSelected = false;
    if ($wrapSelected.length > 0) {
        $wrapSelected.each((i, el) => {
            value1 = $(el).find(".value-1").eq(0).val();
            value2 = $(el).find(".value-2").eq(0).val();
            if ($select1.val() == value1 && $select2.val() == value2) {
                hasBeenSelected = true;
                return false;
            }
        });
    }
    return hasBeenSelected;
}
function eventBtnRemove() {
    $('.btn-remove').on('click', (e) => {
        const $input = $(e.target).closest('.input-group-prepend').parent().parent();
        $input.hide("slow", function() {
            $(this).remove();
        });
    });
}
eventBtnAdd($select1.data('name'), $select2.data('name'));
eventBtnRemove();
removeClassIsValid($select1);
removeClassIsValid($select2);

