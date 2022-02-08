$(document).ready(function () {
    $("#tableCrud").DataTable();
});
$(document).ready(function () {
    $("#ticketCrud").DataTable({
        order: [[0, "desc"]],
    });
});
$(document).ready(function () {
    $("#userCrud").DataTable({
        order: [[3, "desc"]],
    });
});
$(document).ready(function () {
    $("#myInput").on("keyup", function () {
        var value = $(this).val().toLowerCase();
        $("#myDIV .postcard").filter(function () {
            $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1);
        });
    });
});
