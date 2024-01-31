<div class="col-md-12">
    <div class="card-box">
        <h4 class="mb-3 header-title">Quyền truy cập</h4>
        <form role="form" method="post" action="{{route($controllerName.'/change-role')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="task" value="change-role">
            <input type="hidden" name="id" value="{{ @$item['id'] }}">
            <div class="row">
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label for="Name">Nhóm quyền</label>
                        <select class="form-control change-status" name="role_user_id">
                            @foreach ($listRole as $role)
                                <option {{ $role->id == @$item['role_user_id'] ? 'selected' : ''}} value="{{ $role->id }}">{{ $role->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>
            <div class="d-flex align-items-md-center">
                <button type="submit" class="btn btn-primary"> <i class="fe-key"></i> Cập nhật quyền truy cập</button>
            </div>
        </form>
    </div>
</div>
