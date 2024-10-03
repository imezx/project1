$(function () {
    $("tr").on("click", function () {
        location = "/siswa/detail/" + $(this).attr("id");
    });
});
