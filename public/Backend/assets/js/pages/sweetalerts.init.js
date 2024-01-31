$('input[name="check-item-all"]').click(function(){
    if(this.checked) {
        $('input[name="check-item"]').each(function() {
            this.checked = true;
        });
    } else {
        $('input[name="check-item"]').each(function() {
            this.checked = false;
        });
    }
});

!(function (t) {
    "use strict";
    var e = function () {};
    (e.prototype.init = function () {
        t(".sa-warning").click(function (e) {
            let url = $(this).data('url');
            Swal.fire({
                title: "Bạn chắc chắn muốn xóa chớ?",
                text: "Sau khi xóa sẽ không khôi phục được =))",
                type: "warning",
                showCancelButton: !0,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!",
            }).then((result) => {
                if (result.value) {
                    $.ajax({
                        type: "get",
                        url: url,
                        dataType: "json",
                        success:function(rep){
                            Swal.fire({title: "Đã xóa", text: "", type:"success"})
                                .then(function(){
                                    location.reload();
                                    }
                            );
                        }
                    })
                } else if (result.dismiss == 'cancel') {

                }
            })
        }),
        t(".btn-delete-items").click(function (e) {
            let url = $(this).data('url');
            let ids = [];
            $('input[name="check-item"]:checked').each(function(){
                ids.push($(this).data('id'));
            });
            if(ids.length > 0){
                Swal.fire({
                    title: "Bạn chắc chắn muốn xóa ?",
                    text: "Sau khi xóa sẽ không khôi phục được =))",
                    type: "warning",
                    showCancelButton: !0,
                    confirmButtonColor: "#3085d6",
                    cancelButtonColor: "#d33",
                    confirmButtonText: "Yes, delete it!",
                }).then((result) => {
                    if (result.value) {
                        $.ajax({
                            type: "get",
                            url: url,
                            dataType: "json",
                            data: {ids:ids},
                            success:function(rep){
                                Swal.fire({title: "Đã xóa", text: "", type:"success"})
                                    .then(function(){
                                        location.reload();
                                        }
                                );
                            }
                        })
                    }
                })
            }else {
                Swal.fire({title: "Vui lòng chọn phần tử !", text: "", type:"error"});
            }
        });
    }),
        (t.SweetAlert = new e()),
        (t.SweetAlert.Constructor = e);
})(window.jQuery),
    (function (t) {
        "use strict";
        window.jQuery.SweetAlert.init();
    })();

