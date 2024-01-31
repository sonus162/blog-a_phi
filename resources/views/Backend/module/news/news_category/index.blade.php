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
                            <th>ID</th>
                            <th>Tên Danh Mục</th>
                            <th width="15%">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listItems as $key => $item)
                            <tr>
                                <td width="5%">
                                    <div class="checkbox checkbox-primary">
                                        <input id="checkbox{{ $key+1 }}" type="checkbox" data-id="{{ $item['id'] }}" name="check-item">
                                        <label for="checkbox{{ $key+1 }}"></label>
                                    </div>
                                </td>
                                <td>{{ $item['id'] }}</td>
                                <td>{{ $item['name']}}</td>
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
