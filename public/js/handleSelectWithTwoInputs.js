
const $select1 = $("#select-1");
const $input1 = $("#input-1");
const $input2 = $("#input-2");
const $wrapSelect = $(".wrap-select");
function eventBtnAdd(name1, name2, name3) {
    $(".btn-add").on("click", (e) => {
        if ($select1.val() === "") {
            addClassIsValid($select1, 'Bắt buộc');
        }
        if ($input1.val() === "") {
            addClassIsValid($input1, 'Bắt buộc');
        }
        if ($input2.val() === "") {
            addClassIsValid($input2, 'Bắt buộc');
        }
        if ($select1.val() !== "" && $input1.val() !== "" && $input2.val() !== "") {
            if (!checkValueHasBeenSelected()) {
                if (checkDateBetween($input1.val(), $input2.val())) {
                    return;
                }
                text1 = $("#select-1 :selected").text();
                text2 = $("#input-1").val();
                text3 = $("#input-2").val();
                $wrapSelect.append(
                    `<div class="form-row pl-1 w-100 wrap-selected">
                        <div class="form-group col-md-4">
                            <input type="text" class="form-control" value="${text1}" readonly>
                            <input type="hidden" class="value-1" name="${name1}" value="${$select1.val()}">
                        </div>
                        <div class="ml-3 form-group col-md-3">
                            <input type="text" class="form-control" value="${text2}" readonly>
                            <input type="hidden" class="value-2" name="${name2}" value="${$input1.val()}">
                        </div>
                        <div class="ml-3 form-group col-md-3">
                            <input type="text" class="form-control" value="${text3}" readonly>
                            <input type="hidden" class="value-3" name="${name3}" value="${$input2.val()}">
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
                $("#input-1").val("");
                $("#input-2").val("");
                eventBtnRemove();
            } else {
                addClassIsValid($select1, 'Đã tồn tại');
                addClassIsValid($input1, 'Đã tồn tại');
                addClassIsValid($input2, 'Đã tồn tại');
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
    let hasBeenSelected = false;
    if ($wrapSelected.length > 0) {
        $wrapSelected.each((i, el) => {
            value1 = $(el).find(".value-1").eq(0).val();
            value2 = $(el).find(".value-2").eq(0).val();
            value3 = $(el).find(".value-3").eq(0).val();
            console.log(value1, value2, value3);
            console.log($select1.val(), $input1.val(), $input2.val());
            if ($select1.val() == value1 && $input1.val() == value2 && $input2.val() == value3) {
                hasBeenSelected = true;
                return false;
            }
        });
    }
    return hasBeenSelected;
}
function checkDateBetween(date1, date2) {
    let isGt = false;
    const d1 = new Date(date1);
    const d2 = new Date(date2);
    if (d1 > d2) {
        isGt = true;
        addClassIsValid($input2, 'Cần lớn hơn ngày bắt đầu');
    }
    return isGt;
}
function eventBtnRemove() {
    $('.btn-remove').on('click', (e) => {
        const $input = $(e.target).closest('.input-group-prepend').parent().parent();
        $input.hide("slow", function() {
            $(this).remove();
        });
    });
}
eventBtnAdd("hoatDong_id[]", "ngayBD[]", "ngayKT[]");
eventBtnRemove();
removeClassIsValid($select1);
removeClassIsValid($input1);
removeClassIsValid($input2);
