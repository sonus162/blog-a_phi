$(document).ready(function () {
    $(".select2").select2(),
        $(".select2-1").select2(),
        $(".select2-limiting").select2({ maximumSelectionLength: 10 });

    $(".change-status").change(function (e) {
        e.preventDefault();
        var url = $(this).val();
        $.ajax({
            type: "get",
            url: url,
            dataType: "dataType",
            success: function (response) {},
        });
    });

    $(".change-display").click(function () {
        let url = $(this).data("url");
        console.log(url);
        $.ajax({
            type: "get",
            url: url,
            dataType: "dataType",
            success: function (response) {
                $(this).data("url", response.link);
            },
        });
    });

    $(".change-is_home").click(function () {
        let url = $(this).data("url");
        console.log(url);
        $.ajax({
            type: "get",
            url: url,
            dataType: "dataType",
            success: function (response) {
                $(this).data("url", response.link);
            },
        });
    });
});
