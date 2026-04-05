import axios from "axios";
import toastr from "toastr";
import $ from "jquery";
import "toastr/build/toastr.min.css";
import "./bootstrap";

toastr.options = {
    positionClass: "toast-top-left",
    timeOut: 3000,
    progressBar: true,
    closeButton: true,
    rtl: true,
};


$("#search-textarea").on("input", function () {
    const minRows = 4;
    const maxRows = 10;

    $(this).attr("rows", minRows);

    const newRows = Math.floor(
        this.scrollHeight / parseInt($(this).css("line-height")),
    );

    $(this).attr("rows", Math.min(Math.max(newRows, minRows), maxRows));
})
$("#search-textarea").trigger("input");;

$("#search-btn").on("click", function () {
    const categories = $("#search-textarea")
        .val()
        .split("\n")
        .map((c) => c.trim())
        .filter((c) => c !== "");

    if (categories.length === 0) {
        toastr.warning("Please enter at least one category.");
        return;
    }

    axios
        .post("courses/start", { categories })
        .then((response) => {
            toastr.success(response.data.message);
            setTimeout(function() {
                window.location.reload()
            }, 2000)
        })
        .catch((error) => {
            toastr.error(
                error.response?.data?.message ?? "Something went wrong.",
            );
        });
});

$("#stop-btn").on("click", function () {
    axios
        .post("courses/stop")
        .then((response) => {
            toastr.success(response.data.message);
            setTimeout(function() {
                window.location.reload()
            }, 2000)
        })
        .catch((error) => {
            toastr.error(
                error.response?.data?.message ?? "Something went wrong.",
            );
        });
});
