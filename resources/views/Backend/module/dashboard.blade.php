@extends('Backend/main')
@section('wrapper')
    <div class="row">
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="fe-film float-right"></i>
                <h5 class="text-muted text-uppercase mb-3 mt-0">Phim</h5>
                <h3 class="mb-3" data-plugin="counterup">1,587</h3>
                {{-- <span class="badge badge-primary"> +11% </span> <span class="text-muted ml-2 vertical-middle">From previous period</span> --}}
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="fe-tag float-right"></i>
                <h5 class="text-muted text-uppercase mb-3 mt-0">Thể loại</h5>
                <h3 class="mb-3"><span data-plugin="counterup">46,782</span></h3>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="fe-globe float-right"></i>
                <h5 class="text-muted text-uppercase mb-3 mt-0">Quốc gia</h5>
                <h3 class="mb-3"><span data-plugin="counterup">15</span></h3>
            </div>
        </div>

        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="fe-image float-right"></i>
                <h5 class="text-muted text-uppercase mb-3 mt-0">Số tập phim</h5>
                <h3 class="mb-3" data-plugin="counterup">1,890</h3>
            </div>
        </div>
        <div class="col-md-6 col-xl-3">
            <div class="card-box tilebox-one">
                <i class="fe-edit float-right"></i>
                <h5 class="text-muted text-uppercase mb-3 mt-0">Bài viết</h5>
                <h3 class="mb-3" data-plugin="counterup">1,890</h3>
            </div>
        </div>
    </div>
@endsection
