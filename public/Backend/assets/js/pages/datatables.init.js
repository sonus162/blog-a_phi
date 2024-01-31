$(document).ready(function () {
    $("#datatable").DataTable({
        language: {
            url: '//cdn.datatables.net/plug-ins/1.13.6/i18n/vi.json',
        },
        "search": "Tìm kiếm:",
        "pageLength": 25,
        "columnDefs": [
            { "orderable": false, "targets": 0 }
        ],
    });
    // $("#datatable-buttons")
    //     .DataTable({ lengthChange: !1, buttons: ["copy", "excel", "pdf"] })
    //     .buttons()
    //     .container()
    //     .appendTo("#datatable-buttons_wrapper .col-md-6:eq(0)");
});
