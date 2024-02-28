@php
    use App\Helpers\URL;
@endphp
@extends('Backend/main')
@section('wrapper')
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="javascript:;" class="btn-primary create" id="btn-submitform">Lưu <i class="fe-save"></i></a>
                    <a href="{{ route($controllerName)}}" class="btn-danger create" data-url="">Thoát <i class="fe-x"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box">
                <div class="row">
                    <div class="col-md-12">
                        <div class="">
                            @if ($errors->any())
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                @foreach ($errors->all() as $error)
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                {{$error}}<br/>
                                @endforeach
                            </div>
                            @endif
                            <form role="form" id="form_section" method="post" action="{{route($controllerName.'/save')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="intro">
                                    <input type="hidden" name="id" value="{{ @$item['id'] }}">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name">Tên doanh nghiệp</label>
                                                <input type="text" class="form-control" name="name" id="name_danhmuc" value="{{ @$item['name'] ? @$item['name'] : old('name');}}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name">Địa chỉ</label>
                                                <input type="text" class="form-control" name="address" id="name_danhmuc" value="{{ @$item['address'] ? @$item['address'] : old('address');}}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Logo (82x17)</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="file" id="logo" name="logo" class="filestyle" data-btnClass="btn-primary" onchange="preview_intro.src=window.URL.createObjectURL(this.files[0])">
                                                        <input type="hidden" name="logoHidden" value="{{ @$item['logo'] }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        @php
                                                            $pathUpload = @$item['logo'] ?  URL::pathUpload(explode('-',@$item['logo'])[0],'info'): '';
                                                        @endphp
                                                        <label for="logo">
                                                            <img id="preview_intro" src="{{ asset(@$pathUpload.@$item['logo'] ?  @$pathUpload.@$item['logo'] : 'Backend/assets/images/default.jpg' ) }}" alt="" height="40px" width="90px" style="object-fit: contain">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Favicon (180x180)</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="file" id="favicon" name="favicon" class="filestyle" data-btnClass="btn-primary" onchange="preview_favicon.src=window.URL.createObjectURL(this.files[0])">
                                                        <input type="hidden" name="faviconHidden" value="{{ @$item['favicon'] }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        @php
                                                            $pathUpload = @$item['favicon'] ?  URL::pathUpload(explode('-',@$item['favicon'])[0],'info'): '';
                                                        @endphp
                                                        <label for="favicon">
                                                            <img id="preview_favicon" src="{{ asset(@$pathUpload.@$item['favicon'] ?  @$pathUpload.@$item['favicon'] : 'Backend/assets/images/default.jpg' ) }}" alt="" height="40px">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name">Email</label>
                                                <input type="text" class="form-control" name="email" id="name_danhmuc" value="{{ @$item['email'] ? @$item['email'] : old('email');}}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name">Điện thoại</label>
                                                <input type="text" class="form-control" name="phone" id="name_danhmuc" value="{{ @$item['phone'] ? @$item['phone'] : old('phone');}}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name">Zalo (nhập SĐT)</label>
                                                <input type="text" class="form-control" name="zalo" id="name_danhmuc" value="{{ @$item['zalo'] ? @$item['zalo'] : old('zalo');}}" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="d-flex mt-3 align-items-md-center">
                                    <button type="submit" class="btn btn-primary"> <i class="fe-upload"></i> Lưu</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end row -->
@endsection
@push('scripts')
    <script>
        document.getElementById('btn-submitform').addEventListener('click', function(){
            var form = document.getElementById('form_section');
            form.submit();
        });
    </script>
@endpush
