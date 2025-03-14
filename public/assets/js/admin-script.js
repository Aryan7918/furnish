$(document).ready(function () {
    $.ajaxSetup({
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
        },
    });
    $(document).on("click", "a[data-url], button[data-url]", function (e) {
        e.preventDefault();

        let url = $(this).data("url");
        let title = $(this).data("title") || "Loading...";
        let buttonText = $(this).data("btn-text") || "Submit";
        let modal = $("#ajaxModal");

        $("#ajaxModalLabel").text(title);
        $("#modalSubmitButton").text(buttonText);
        $("#modalContent").html('<p class="text-center">Loading...</p>');

        modal.modal("show");

        $.ajax({
            url: url,
            type: "GET",
            success: function (response) {
                $("#modalContent").html(response);
            },
            error: function () {
                $("#modalContent").html(
                    '<p class="text-danger text-center">Failed to load data.</p>'
                );
            },
        });
    });
});
