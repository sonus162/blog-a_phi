<div class="row">
    <div class="col-md-12">
        <div class="card-box">
            <h4 class="mb-3 header-title"></h4>
            <form role="form" method="post" action="{{route($controllerName.'/save')}}" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="task" value="add">
                {{-- <input type="hidden" name="id" value="{{ @$item['id'] }}"> --}}
                <div class="row">
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label for="Name">Tài khoản</label>
                            <input type="text" class="form-control" name="username" value="{{ old('username')}}" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Ảnh đại diện</label>
                            <div class="row">
                                <div class="col-md-8">
                                    <input type="file" name="avatar" class="filestyle" data-btnClass="btn-primary">
                                    {{-- <input type="hidden" name="avatarHidden" value="{{ @$item['avatar'] }}"> --}}
                                </div>
                                <div class="col-md-4">
                                    @php
                                        $pathUpload = @$item['avatar'] ?  URL::pathUpload(explode('.',@$item['avatar'])[0],'news'): '';
                                    @endphp
                                    <img src="{{ asset($pathUpload.@$item['avatar']) }}" alt="" height="80px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="Name">Họ tên</label>
                            <input type="text" class="form-control" name="fullname" value="{{ old('fullname')}}" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="Name">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ @$item['email'] ? @$item['email'] : old('email')}}" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="Name">Nhóm quyền</label>
                            <select class="form-control change-status" name="role_user_id">
                                <option></option>
                                <option value="1">Admin</option>
                                <option value="2">Thành viên</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="Name">Mật khẩu</label>
                            <input type="password" class="form-control" name="password" value="" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="Name">Nhập lại mật khẩu</label>
                            <input type="password" class="form-control" name="password_confirmation" value="" placeholder="">
                        </div>
                    </div>
                    <div class="col-md-4 col-12">
                        <div class="form-group">
                            <label for="Name">Trạng thái</label>
                            <select class="form-control" name="status">
                                <option value="active">Kích hoạt</option>
                                <option value="inactive" selected>Chưa kích hoạt</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="d-flex align-items-md-center">
                    <button type="submit" class="btn btn-primary"> <i class="fe-upload"></i> Lưu</button>
                    @if (empty($item['id']))
                        <div class="checkbox checkbox-primary ml-2">
                            <input id="checkbox2" type="checkbox" name="check_new" value="check">
                            <label for="checkbox2">Thêm mới khác</label>
                        </div>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
