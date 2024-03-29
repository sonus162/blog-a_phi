@php
    use App\Helpers\URL;
@endphp
@extends('Backend/main')
@section('wrapper')
    <div class="row">
        <div class="col-md-12 col-12">
            <div class="page-title-box">
                <div class="page-title-right">
                    <a href="{{ route($controllerName.'/form')}}" class="btn-primary create">Thêm mới <i class="fe-plus"></i></a>
                    <a href="#" class="btn-danger create btn-delete-items" data-url="{{ route($controllerName.'/delete')}}">Xóa nhiều <i class="fe-x"></i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-12">
            <div class="card-box table-responsive">
                <table id="datatable" class="table table-bordered  dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                    <thead>
                        <tr>
                            <th width="5%" class="disable">
                                <div class="checkbox checkbox-primary">
                                    <input id="checkbox" type="checkbox" name="check-item-all">
                                    <label for="checkbox"></label>
                                </div>
                            </th>
                            <th width="5%">ID</th>
                            <th width="10%">Ảnh đại diện</th>
                            <th>Tên bài viết</th>
                            <th width="5%">Trang chủ</th>
                            <th width="5%">Sidebar</th>
                            <th width="5%">Hiển thị</th>
                            <th width="15%">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listItems as $key => $item)
                            @php
                                if(isset($item['thumbnail'])){
                                    $time = explode('.',$item['thumbnail'])[0];
                                    $pathUpload = URL::pathUpload($time,'news');
                                }
                            @endphp
                            <tr>
                                <td width="5%">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox{{ $key+1 }}" type="checkbox" data-id="{{ $item['id'] }}" name="check-item">
                                        <label for="checkbox{{ $key+1 }}"></label>
                                    </div>
                                </td>
                                <td width="5%">{{ $item['id'] }}</td>
                                <td width="10%">
                                    <img src="{{ asset(@$pathUpload.@$item['thumbnail'] ? @$pathUpload.@$item['thumbnail'] : 'Backend/assets/images/default.jpg')}}" height="50px" alt="{{ $item['name'] }}">
                                </td>
                                <td><a href="{{ route($controllerName.'/form', ['id' => $item['id']])}}">{{ $item['name']}}</a></td>
                                <td width="5%" style="text-align:center;">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox_ishome{{ $key+1 }}" type="checkbox" data-id="{{ $item['id'] }}" name="check-display" {{ @$item['is_home'] == 1 ? 'checked' : '';}} class="change-is_home" data-url="{{route($controllerName.'/changeIsHome', ['status' => $item['is_home'] ? $item['is_home'] : 0,'id' => $item['id']])}}">
                                        <label for="checkbox_ishome{{ $key+1 }}"></label>
                                    </div>
                                </td>
                                <td width="5%" style="text-align:center;">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox_is-sidebar{{ $key+1 }}" type="checkbox" data-id="{{ $item['id'] }}" name="check-sidebar" {{ @$item['is_sidebar'] == 1 ? 'checked' : '';}} class="change-is_sidebar" data-url="{{route($controllerName.'/changeIsSidebar', ['status' => $item['is_sidebar'] ? $item['is_sidebar'] : 0,'id' => $item['id']])}}">
                                        <label for="checkbox_is-sidebar{{ $key+1 }}"></label>
                                    </div>
                                </td>
                                <td width="5%" style="text-align:center;">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox_display{{ $key+1 }}" type="checkbox" data-id="{{ $item['id'] }}" name="check-display" {{ @$item['display'] == 1 ? 'checked' : '';}} class="change-display" data-url="{{route($controllerName.'/changeDisplay', ['status' => $item['display'],'id' => $item['id']])}}">
                                        <label for="checkbox_display{{ $key+1 }}"></label>
                                    </div>
                                </td>
                                <td width="15%">
                                    <a href="{{ route($controllerName.'/form', ['id' => $item['id']])}}" class="btn-action btn-primary">Sửa</a>
                                    <a href="javascript:;"  data-url="{{ route($controllerName.'/delete', ['id' => $item['id']])}}" class="btn-action btn-danger sa-warning">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div> <!-- end row -->
@endsection
