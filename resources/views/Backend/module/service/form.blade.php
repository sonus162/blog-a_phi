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
                <h4 class="mb-3 header-title">Thêm Bài viết</h4>
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
                <form role="form" method="post" action="{{route($controllerName.'/save')}}" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="id" value="{{ @$item['id'] }}">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="Name">Tiêu đề</label>
                                <input type="text" class="form-control" name="name" id="name_danhmuc" value="{{ @$item['name'] ? @$item['name'] : old('name');}}" placeholder="" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="star">Số sao</label>
                                <input type="text" class="form-control" name="star" id="star" value="{{ @$item['star'] ? @$item['star'] : old('star')}}" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="price">Giá</label>
                                <input type="text" class="form-control" name="price" id="price" value="{{ @$item['price'] ? @$item['price'] : old('price')}}" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Ảnh đại diện (370x278)</label>
                                <div class="row">
                                    <div class="col-md-9">
                                        <input type="file" id="thumbnail" name="thumbnail" class="filestyle" data-btnClass="btn-primary" onchange="preview.src=window.URL.createObjectURL(this.files[0])">
                                        <input type="hidden" name="thumbnailHidden" value="{{ @$item['thumbnail'] }}">
                                    </div>
                                    <div class="col-md-3">
                                        @php
                                            $pathUpload = @$item['thumbnail'] ?  URL::pathUpload(explode('.',@$item['thumbnail'])[0],'news'): '';
                                        @endphp
                                        <label for="thumbnail">
                                            <img id="preview" src="{{ asset(@$pathUpload.@$item['thumbnail'] ?  @$pathUpload.@$item['thumbnail'] : 'Backend/assets/images/default.jpg' ) }}" alt="" height="60px">
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="Name" class="select2-btn">Mô tả</label>
                                <textarea name="desc_short" class="form-control" rows="3">{{ @$item['desc_short'] ? @$item['desc_short'] : old('desc_short') }}</textarea>
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
@push('scripts')
    <script>
        editor = CKEDITOR.replace('content');
        CKEDITOR.replace( 'content', {
            filebrowserBrowseUrl: '/ckfinder/ckfinder.html',
            filebrowserUploadUrl: '/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files'
        } );
        CKFinder.setupCKEditor( editor );
    </script>
@endpush
