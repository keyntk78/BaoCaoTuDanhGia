$listMinhChung = $(".list-minhchung");
$(".is-minhchung").each((i, el) => {
    $(el).attr("id", `minhchung-${i + 1}`);
    $listMinhChung.append(
        `<li><a class="minhchung" data-id="minhchung-${i + 1}" href="${
            window.location.href.split(/[?#]/)[0]
        }#minhchung-${i + 1}">${$(el).text()}</a></li>`
    );
    updateListMC();
});
$(".is-minhchung").on("click", (e) => {
    if ($(e.currentTarget).attr("href").includes("/minhchung/detailTP/")) {
        e.preventDefault();
        $(".btn-show-modal").attr("data-url", $(e.currentTarget).attr("href"));
        $(".btn-show-modal").click();
    }
});
function updateListMC() {
    $(".minhchung").on("click", (e) => {
        e.preventDefault();
        const id = $(e.currentTarget).data("id");
        const scrollTop = $(`#${id}`).offset().top - 100;
        $("html, body").animate(
            {
                scrollTop: scrollTop,
            },
            200,
            'swing'
        );
        $(`#${id}`).addClass('is-focus');
        setTimeout(()=> {
            $(`#${id}`).removeClass('is-focus');
        }, 3000);
    });
}

$("#deleteCatModal").on("show.bs.modal", (e) => {
    const _token = $('meta[name="csrf-token"]').attr("content");
    const id = $(e.relatedTarget).data("url").split("/").pop();
    $.ajax({
        type: "POST",
        url: "minhchung/gettp",
        data: {
            id,
            _token,
        },
        success: (datas) => {
            $(".modal-body").find(".content").html("");
            for (data of datas) {
                var link = "";
                if(data.isUrl){
                    link = data.link
                } else {
                    link = window.location.origin + '/minhchung/download/' + data.link
                }
                $(".modal-body")
                    .find(".content")
                    .append(
                        `<li>
                                <a href="${link}" target="_blank" rel="noopener nofollower">${data.ten}</a>
                            </li>`
                    );
            }
        },
    });
});
