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
                                <label for="Name" class="select2-btn">Danh mục</label>
                                <select class="form-control select2" name="id_news_category">
                                    <option value="">Chọn danh mục</option>
                                    @php
                                        foreach ($news_cate as $key => $value) {
                                            echo ' <option value="'.$value['id'].'" '.(old('id_news_category')==$value['id'] || $value['id'] == @$item['id_news_category'] ? 'selected' : '').'>'.$value['name'].'</option>';
                                        }
                                    @endphp
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="Name">Tên Bài viết</label>
                                <input type="text" class="form-control" name="name" id="name_danhmuc" value="{{ @$item['name']}}" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="title">Title SEO</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ @$item['title']}}" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="Name" class="select2-btn">Mô tả</label>
                                <textarea name="desc_short" class="form-control" rows="3">{{ @$item['desc_short'] }}</textarea>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="description" class="select2-btn">Description</label>
                                <textarea name="description" class="form-control" rows="3">{{ @$item['description'] }}</textarea>
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
                                            $pathUpload = @$item['thumbnail'] ?  URL::pathUpload(explode('.',@$item['thumbnail'])[0],'news'): '';
                                        @endphp
                                        <img src="{{ asset(@$pathUpload.@$item['thumbnail']) }}" alt="" height="80px">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="keyword" class="select2-btn">Key word</label>
                                <input type="text" class="form-control" name="keyword" id="keyword" value="{{ @$item['keyword']}}" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-12 col-12">
                            <div class="form-group">
                                <label for="Name">Nội dung</label>
                                <textarea class="form-control" id="content" name="content">{!! @$item['content'] !!}</textarea>
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
        CKEDITOR.replace('content');
    </script>
@endpush
