<div class="col-md-12">
    <div class="card-box">
        <h4 class="mb-3 header-title">Thay đổi mật khẩu</h4>
        <form role="form" method="post" action="{{route($controllerName.'/change-password')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="task" value="change-password">
            <input type="hidden" name="id" value="{{ @$item['id'] }}">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="Name">Mật khẩu</label>
                        <input type="password" class="form-control" name="password" value="" placeholder="">
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="Name">Nhập lại mật khẩu</label>
                        <input type="password" class="form-control" name="password_confirmation" value="" placeholder="">
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-md-center">
                <button type="submit" class="btn btn-primary"> <i class="fe-key"></i> Cập nhật mật khẩu</button>
            </div>
        </form>
    </div>
</div>
