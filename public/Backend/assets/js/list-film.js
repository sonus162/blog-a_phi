function removeEpisodes(e) {
    e.parentElement.parentElement.remove();
}
$(document).ready(function () {
    $('.btn-add_episodes').click(function(){
        let id_film = $(this).data('id_film');
        let name_film = $(this).data('name_film');
        $('input[name="id_film"]').val(id_film);
    })

    $('.add-eps').click(function(){
        let number = $(this).data('add')+1;
        let content = `<div class="form-group">
                        <div class="row">
                            <div class="col-md-2">
                                <input type="text" class="form-control" name="eps[`+number+`][name]" value="" placeholder="" required>
                            </div>
                            <div class="col-md-7">
                                <input type="text" class="form-control" name="eps[`+number+`][link]" value="" placeholder="" required>
                            </div>
                            <div class="col-md-2">
                                <input type="number" class="form-control" name="eps[`+number+`][order_by]" value="" placeholder="">
                            </div>
                            <div class="col-md-1">
                                <a href="javascript:;" class="btn btn-danger" onclick="removeEpisodes(this)"><i class="fe-x"></i></a>
                            </div>
                        </div>
                    </div>`;
        $(this).closest('.modal-body').find('.list-eps').append(content);
        $(this).data('add',number);
    });

    let announce = $('#announce').data('announce');
    console.log(announce);
    if(announce){
        $.toast({
            heading: "Cập nhật Tập phim",
            text: announce,
            position: "top-right",
            loaderBg: "#5ba035",
            icon: "success",
            hideAfter: 3e3,
            stack: 1,
        });
    }

    $('.change-display').click(function(){
        let url = $(this).data('url');
        $.ajax({
            type: "get",
            url: url,
            dataType: "dataType",
            success: function (response) {
                $(this).data("url", response.link);
            }
        });
    })
});
