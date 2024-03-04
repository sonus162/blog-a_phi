@php
    use App\Helpers\URL;
    $headerController = new \App\Http\Controllers\Frontend\HeaderController();
    $data = $headerController->show();
@endphp
<header class="header">
    <div class="content">
        <div class="body">
            <a href="{{ config('define.PUBLIC_PATH'); }}"><img src="{{ asset(URL::pathUpload(explode('-',@$data['info']['logo'])[0],'info').@$data['info']['logo'])}}" alt="Lesson" class="logo" style="height: 20px;"></a>
            <div class="icon-menu">
                <svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" viewBox="0 0 32 32"
                    style="fill: rgba(0, 0, 0, 1);">
                    <path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"></path>
                </svg>
            </div>
            <ul class="nav">
                @foreach ($data['menu'] as $value)
                    <li><a href="{{ config('define.PUBLIC_PATH').$value['link'] }}">{{ $value['name'] }}</a></li>
                @endforeach
            </ul>
            <div class="action">
                <a href="https://zalo.me/{{ $data['info']['zalo']; }}" target="blank" rel="nofollow" class="btn btn-sign-up">Liên hệ</a>
            </div>
        </div>
    </div>
</header>
