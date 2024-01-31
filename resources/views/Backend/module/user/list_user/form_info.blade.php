@php
    use App\Helpers\URL;
@endphp
<div class="col-md-6 col-12">
    <div class="card-box">
        <h4 class="mb-3 header-title">Thông tin tài khoản</h4>
        <form role="form" method="post" action="{{route($controllerName.'/save')}}" enctype="multipart/form-data">
            @csrf
            <input type="hidden" name="id" value="{{ @$item['id'] }}">
            <input type="hidden" name="task" value="edit-info">
            <div class="row">
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="Name">Tài khoản</label>
                        <input type="text" class="form-control" name="username" value="{{ @$item['username'] ? @$item['username'] : old('username')}}" placeholder="">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="Name">Họ tên</label>
                        <input type="text" class="form-control" name="fullname" value="{{ @$item['fullname'] ? @$item['fullname'] : old('fullname')}}" placeholder="">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="Name">Email</label>
                        <input type="text" class="form-control" name="email" value="{{ @$item['email'] ? @$item['email'] : old('email')}}" placeholder="">
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="form-group">
                        <label for="Name">Trạng thái</label>
                        <select class="form-control" name="status">
                            @foreach ($status as $value)
                                <option value="{{ $value['status']}}" {{ $value['status'] == @$item['status'] ? 'selected' : ''}}>{{ $value['name'] }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="col-md-12 col-12">
                    <div class="form-group">
                        <label>Ảnh đại diện</label>
                        <div class="row">
                            <div class="col-md-8">
                                <input type="file" name="avatar" class="filestyle" data-btnClass="btn-primary">
                                <input type="hidden" name="avatarHidden" value="{{ @$item['avatar'] }}">
                            </div>
                            <div class="col-md-4">
                                @php
                                    $pathUpload = @$item['avatar'] ?  URL::pathUpload(explode('.',@$item['avatar'])[0],'user'): '';
                                @endphp
                                <img src="{{ asset($pathUpload.@$item['avatar']) }}" alt="" height="80px">
                            </div>
                        </div>
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
