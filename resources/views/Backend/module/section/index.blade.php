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
                                    <h3 class="mb-3 header-title">Giới thiệu</h3>
                                    <input type="hidden" name="id" value="{{ @$item['id'] }}">
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name">Tiêu đề</label>
                                                <input type="text" class="form-control" name="multi_input[intro][name]" id="name_danhmuc" value="{{ @$item['multi_input']['intro']['name'] ? @$item['multi_input']['intro']['name'] : old('multi_input[intro][name]');}}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Ảnh đại diện (470x685)</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="file" id="thumbnail" name="multi_input[intro][thumbnail]" class="filestyle" data-btnClass="btn-primary" onchange="preview_intro.src=window.URL.createObjectURL(this.files[0])">
                                                        <input type="hidden" name="multi_input[intro][thumbnailHidden]" value="{{ @$item['multi_input']['intro']['thumbnail'] }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        @php
                                                            $pathUpload = @$item['multi_input']['intro']['thumbnail'] ?  URL::pathUpload(explode('-',@$item['multi_input']['intro']['thumbnail'])[0],'section'): '';
                                                        @endphp
                                                        <label for="thumbnail">
                                                            <img id="preview_intro" src="{{ asset(@$pathUpload.@$item['multi_input']['intro']['thumbnail'] ?  @$pathUpload.@$item['multi_input']['intro']['thumbnail'] : 'Backend/assets/images/default.jpg' ) }}" alt="" height="40px">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name" class="select2-btn">Mô tả</label>
                                                <textarea name="multi_input[intro][desc_short]" class="form-control" rows="3">{{ @$item['multi_input']['intro']['desc_short'] ? @$item['multi_input']['intro']['desc_short'] : old('desc_short') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                    <label for="">Số liệu</label>
                                    @foreach ($item['multi_input']['parameter'] as $key => $value)
                                        <div class="row mt-2">
                                            <div class="col-md-6 col-12">
                                                <input type="text" class="form-control" name="multi_input[parameter][{{$key}}][name]" value="{{ @$value['name']}}" placeholder="Tiêu đề">
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <input type="text" class="form-control" name="multi_input[parameter][{{$key}}][desc_short]"  value="{{ @$value['desc_short']}}" placeholder="Mô tả">
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                                <div class="intro">
                                    <h3 class="mb-3 mt-3 header-title">Slogan</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name">Họ tên</label>
                                                <input type="text" class="form-control" name="multi_input[slogan][name]" value="{{ @$item['multi_input']['slogan']['name'] ? @$item['multi_input']['slogan']['name'] : old('multi_input[slogan][name]');}}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Ảnh đại diện (72x72)</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="file" id="thumbnail-2" name="multi_input[slogan][thumbnail]" class="filestyle" data-btnClass="btn-primary" onchange="preview_slogan.src=window.URL.createObjectURL(this.files[0])">
                                                        <input type="hidden" name="multi_input[slogan][thumbnailHidden]" value="{{ @$item['multi_input']['slogan']['thumbnail'] }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        @php
                                                            $pathUpload = @$item['multi_input']['slogan']['thumbnail'] ?  URL::pathUpload(explode('-',@$item['multi_input']['slogan']['thumbnail'])[0],'section'): '';
                                                        @endphp
                                                        <label for="thumbnail">
                                                            <img id="preview_slogan" src="{{ asset(@$pathUpload.@$item['multi_input']['slogan']['thumbnail'] ?  @$pathUpload.@$item['multi_input']['slogan']['thumbnail'] : 'Backend/assets/images/default.jpg' ) }}" alt="" height="40px">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name" class="select2-btn">Slogan</label>
                                                <textarea name="multi_input[slogan][desc_short]" class="form-control" rows="3">{{ @$item['multi_input']['slogan']['desc_short'] ? @$item['multi_input']['slogan']['desc_short'] : old('multi_input[slogan][desc_short]') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="intro">
                                    <h3 class="mb-3 mt-3 header-title">Bài viết tóm tắt 1</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name">Tiêu đề </label>
                                                <input type="text" class="form-control" name="multi_input[post][1][name]" id="name_danhmuc" value="{{  @$item['multi_input']['post'][1]['name'] ?  @$item['multi_input']['post'][1]['name'] : old('multi_input[post][1][name]');}}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Ảnh 1 (270x404)</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="file" id="thumbnail-3" name="multi_input[post][1][thumbnail-1]" class="filestyle" data-btnClass="btn-primary" onchange="preview_thumb1.src=window.URL.createObjectURL(this.files[0])">
                                                        <input type="hidden" name="multi_input[post][1][thumbnailHidden-1]" value="{{ @$item['multi_input']['post'][1]['thumbnail-1'] }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        @php
                                                            $pathUpload = @$item['multi_input']['post'][1]['thumbnail-1'] ?  URL::pathUpload(explode('-',@$item['multi_input']['post'][1]['thumbnail-1'])[0],'section'): '';
                                                        @endphp
                                                        <label for="thumbnail">
                                                            <img id="preview_thumb1" src="{{ asset(@$pathUpload.@$item['multi_input']['post'][1]['thumbnail-1'] ?  @$pathUpload.@$item['multi_input']['post'][1]['thumbnail-1'] : 'Backend/assets/images/default.jpg' ) }}" alt="" height="40px">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name" class="select2-btn">Mô tả ngắn</label>
                                                <textarea name="multi_input[post][1][desc_short]" class="form-control" rows="3">{{ @$item['multi_input']['post'][1]['desc_short'] ? @$item['multi_input']['post'][1]['desc_short'] : old('multi_input[post][1][desc_short]') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Ảnh 2 (270x404)</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="file" id="thumbnail-4" name="multi_input[post][1][thumbnail-2]" class="filestyle" data-btnClass="btn-primary" onchange="preview_thumb2.src=window.URL.createObjectURL(this.files[0])">
                                                        <input type="hidden" name="multi_input[post][1][thumbnailHidden-2]" value="{{ @$item['multi_input']['post'][1]['thumbnail-2'] }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        @php
                                                            $pathUpload = @$item['multi_input']['post'][1]['thumbnail-2'] ?  URL::pathUpload(explode('-',@$item['multi_input']['post'][1]['thumbnail-2'])[0],'section'): '';
                                                        @endphp
                                                        <label for="thumbnail">
                                                            <img id="preview_thumb2" src="{{ asset(@$pathUpload.@$item['multi_input']['post'][1]['thumbnail-2'] ?  @$pathUpload.@$item['multi_input']['post'][1]['thumbnail-2'] : 'Backend/assets/images/default.jpg' ) }}" alt="" height="40px">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="intro">
                                    <h3 class="mb-3 mt-3 header-title">Bài viết tóm tắt 2</h3>
                                    <div class="row">
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name">Tiêu đề </label>
                                                <input type="text" class="form-control" name="multi_input[post][2][name]" id="name_danhmuc" value="{{ @$item['multi_input']['post'][2]['name'] ? @$item['multi_input']['post'][2]['name'] : old('multi_input[post][2][name]');}}" placeholder="">
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label>Ảnh (470x404)</label>
                                                <div class="row">
                                                    <div class="col-md-9">
                                                        <input type="file" id="thumbnail-5" name="multi_input[post][2][thumbnail]" class="filestyle" data-btnClass="btn-primary" onchange="preview_thumb3.src=window.URL.createObjectURL(this.files[0])">
                                                        <input type="hidden" name="multi_input[post][2][thumbnailHidden]" value="{{ @$item['multi_input']['post'][2]['thumbnail'] }}">
                                                    </div>
                                                    <div class="col-md-3">
                                                        @php
                                                            $pathUpload = @$item['multi_input']['post'][2]['thumbnail'] ?  URL::pathUpload(explode('-',@$item['multi_input']['post'][2]['thumbnail'])[0],'section'): '';
                                                        @endphp
                                                        <label for="thumbnail">
                                                            <img id="preview_thumb3" src="{{ asset(@$pathUpload.@$item['multi_input']['post'][2]['thumbnail'] ?  @$pathUpload.@$item['multi_input']['post'][2]['thumbnail'] : 'Backend/assets/images/default.jpg' ) }}" alt="" height="40px">
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-6 col-12">
                                            <div class="form-group">
                                                <label for="Name" class="select2-btn">Mô tả ngắn</label>
                                                <textarea name="multi_input[post][2][desc_short]" class="form-control" rows="3">{{ @$item['multi_input']['post'][2]['desc_short'] ? @$item['multi_input']['post'][2]['desc_short'] : old('multi_input[post][2][desc_short]') }}</textarea>
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
