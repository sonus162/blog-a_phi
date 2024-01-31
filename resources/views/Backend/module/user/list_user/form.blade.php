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
    @if (@$item['id'])
        <div class="row">
            @include('Backend.module.user.list_user.form_info')
            <div class="col-md-6 col-12">
                @include('Backend.module.user.list_user.form_change_password')
                @include('Backend.module.user.list_user.form_change_role')
            </div>
        </div>
    @else
        @include('Backend.module.user.list_user.form_add')
    @endif
@endsection
