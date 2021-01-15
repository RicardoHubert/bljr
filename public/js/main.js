$(document).ready(() => {
    $(".btn-approval").on("click", e => {
        let id = e.target.id || $(e.target).parent().find("button").attr("id");
        let status = parseInt($(e.target).data("status"));
        let spiner = $(e.target)
            .parent()
            .find(".spiner");
        $(spiner).removeClass("hidden");

        $.ajax({
            url: `${BASE_URL}/ajax/skpi/approval`,
            type: "PUT",
            data: {
                status: status == 1 ? 0 : 1,
                id: id,
                _token: $('meta[name="csrf-token"]').attr("content")
            },
            success: data => {
                if (data.status == 1) {
                    $(e.target).removeClass("btn-success");
                    $(e.target).addClass("btn-warning");
                    $(e.target)
                        .find("span")
                        .text("Disapprove");
                } else {
                    $(e.target).removeClass("btn-warning");
                    $(e.target).addClass("btn-success");
                    $(e.target)
                        .find("span")
                        .text("Approve");
                }
                $(e.target).data("status", data.status);
                $(spiner).addClass("hidden");
            }
        });
    });
});
