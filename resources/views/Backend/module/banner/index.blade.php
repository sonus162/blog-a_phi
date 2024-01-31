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
                            <th width="15%" >Hình ảnh</th>
                            <th>Tiêu đề </th>
                            <th width="5%">Sắp xếp</th>
                            <th width="15%">Chức năng</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($listItems as $key => $item)
                            @php
                                if(isset($item['thumbnail'])){
                                    $time = explode('.',$item['thumbnail'])[0];
                                    $pathUpload = URL::pathUpload($time,'banner');
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
                                <td width="15%" ><img src="{{ asset($pathUpload.$item['thumbnail'])}}" height="50px" alt="{{ $item['name'] }}"></td>
                                <td>{{ $item['name']}}</td>
                                <td width="5%">
                                    <input type="number" data-link="{{ route($controllerName.'/orderBy', ['id' => $item['id']]) }}" data-id="{{ $item['id']; }}" name="order_by" id="" class="form-control" value="{{ $item['order_by'] }}" min="0">
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
@push('scripts')
    <script>
        $(document).ready(function () {
            $('input[name="order_by"]').change(function (e) {
                var url = $(this).data('link');
                var orderby = $(this).val();
                var id = $(this).data('id');
                $.ajax({
                    type: "get",
                    url: url,
                    dataType: "dataType",
                    data: {orderby: orderby, id: id},
                    success: function (response) {
                        console.log(response);
                    }
                });

            });
        });
    </script>
@endpush
