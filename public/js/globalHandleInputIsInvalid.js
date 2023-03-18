$('input.is-invalid, select.is-invalid').on("focus", (e) => {
    $(e.currentTarget).removeClass("is-invalid");
    $(e.currentTarget).parent().find(".invalid-feedback").remove();
});
