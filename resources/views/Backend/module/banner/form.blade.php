@php
    use App\Helpers\URL;
@endphp
@extends('Backend/main')
@section('wrapper')
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{ route($controllerName)}}" class="btn-danger create">Thoát <i class="fe-x"></i></a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card-box">
                <h4 class="mb-3 header-title">Thêm Slide</h4>
                @if ($errors->any())
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        @foreach ($errors->all() as $error)
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                           {{$error}}
                        @endforeach
                    </div>
                @endif
                <form role="form" method="post" action="{{route($controllerName.'/save')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ @$item['id'] }}">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="Name">Tên Slide</label>
                                <input type="text" class="form-control" name="name" id="name_danhmuc" value="{{ @$item['name']}}" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Ảnh đại diện</label>
                                <div class="row">
                                    <div class="col-md-8">
                                        <input type="file" name="thumbnail" class="filestyle" data-btnClass="btn-primary">
                                        <input type="hidden" name="thumbnailHidden" value="{{ @$item['thumbnail'] }}">
                                    </div>
                                    <div class="col-md-4">
                                        @php
                                            $pathUpload = @$item['thumbnail'] ?  URL::pathUpload(explode('.',@$item['thumbnail'])[0], 'banner'): '';
                                        @endphp
                                        <img src="{{ asset($pathUpload.@$item['thumbnail']) }}" alt="" height="80px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="Name">Mô tả</label>
                                <textarea  class="form-control" name="desc_short" id="" cols="30" rows="5">{{ @$item['desc_short'] }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="Name">Link</label>
                                <input type="text" class="form-control" name="link" id="name_danhmuc" value="{{ @$item['link']}}" placeholder="">
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
    </div> <!-- end row -->
@endsection
