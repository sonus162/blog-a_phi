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
                <h4 class="mb-3 header-title">Thêm Danh mục</h4>
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
                <form role="form" method="post" action="{{route($controllerName.'/save')}}">
                    @csrf
                    <input type="hidden" name="id" value="{{ @$item['id'] }}">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="name">Tên Danh Mục</label>
                                <input type="text" class="form-control" name="name" id="name" value="{{ @$item['name']}}" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="title">Title Seo</label>
                                <input type="text" class="form-control" name="title" id="title" value="{{ @$item['title']}}" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="description">Description</label>
                                <input type="text" class="form-control" name="description" id="description" value="{{ @$item['description']}}" placeholder="">
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label for="keyword">Key word</label>
                                <input type="text" class="form-control" name="keyword" id="keyword" value="{{ @$item['keyword']}}" placeholder="">
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
