$(".baocao-scrollItem").on("click", (e) => {
    e.preventDefault();
    const id = $(e.currentTarget).attr('href');
    const scrollTop = $(`${id}`).offset().top - 100;
    $("html, body").animate(
        {
            scrollTop: scrollTop,
        },
        300,
        'swing'
    );
    $(`${id}`).addClass('is-focus');
    setTimeout(()=> {
        $(`${id}`).removeClass('is-focus');
    }, 3000);
});

const sidebar = new StickySidebar('#sticky-sidebar', {
});
const sidebarMC = new StickySidebar('#wrap-list-minhchung', {
});

setTimeout(()=> {
    eventTooltip();
}, 1000);
function eventTooltip() {
    $('[data-toggle="tooltip"]').tooltip()
}

$(".is-minhchung").on("click", (e) => {
    if ($(e.currentTarget).attr("href").includes("/minhchung/detailTP/")) {
        e.preventDefault();
        $(".btn-show-modal").attr("data-url", $(e.currentTarget).attr("href"));
        $(".btn-show-modal").click();
    }
});
$(".is-minhchung").each((i, el) => {
    $(el).attr("id", `minhchung-${i + 1}`);
});
updateListMC()
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
                console.log(data);
                $(".modal-body")
                    .find(".content")
                    .append(
                        `<li>
                                <a href="${data.link}" target="_blank" rel="noopener nofollower">${data.ten}</a>
                            </li>`
                    );
            }
        },
    });
});

