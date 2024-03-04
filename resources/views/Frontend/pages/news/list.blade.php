@php
    use App\Helpers\URL;
@endphp
@push('css')
    <title>{{ @$data['menu'][1]['title'] }}</title>
    <meta name="description" content="{{ @$data['menu'][1]['description'] }}">
    <meta name="keywords" content="{{ @$data['menu'][1]['keyword'] }}">
    <meta property="og:url" content="{{@$data['url']}}">
    <meta property="og:title" content="{{ @$data['menu'][1]['title'] }}">
    <meta property="og:description" content="{{ @$data['menu'][1]['description'] }}">
    <link rel="stylesheet" href="{{asset('Frontend/css/list.css')}}">
@endpush
@extends('Frontend/main')
@section('wrapper')
<main>
    <!-- Blog -->
    <div class="blog" id="blog">
        <div class="content">
            <div class="body">
                <h2 class="heading">{{ @$data['menu'][1]['name'] }}</h2>
                <p class="desc">{{ @$data['menu'][1]['desc_short'] }}</p>
            </div>
            <div class="list-blog">
                @foreach ($data['list']['data'] as $item)
                    <div class="item">
                        <a href="{{ route('news.detail', ['slug' => $item['slug'], 'id' => $item['id']]); }}">
                            <img src="{{ @$item['thumbnail'] ?  asset(URL::pathUpload(explode('.',@$item['thumbnail'])[0],'news').@$item['thumbnail']) : '' }}" alt="{{ @$item['name'] }}" class="thumb">
                            <div class="info">
                                <div class="date">{{ date('d M y', strtotime(@$item['created_at'])) }}</div>
                                <h3 class="title">{{ @$item['name'] }}</h3>
                                <div class="btn">Xem thêm</div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <div class="pagination pagination-style-two m-t-20">
                <a href="{{ @$data['list']['first_page_url']}}">First</a>
                @foreach (@$data['list']['links'] as $link)
                    @php
                        $active = !empty(@$link['active']) ? "class=selected" : '';
                    @endphp
                    <a {{ $active }} href="{{ @$link['url']}}">{!! @$link['label'] !!}</a>
                @endforeach
                <a href="{{ @$data['list']['last_page_url']}}">Last</a>
            </div>
        </div>
    </div>

</main>
@endsection
@push('scripts')

@endpush

