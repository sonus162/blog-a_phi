@php
    use App\Helpers\URL;
@endphp
@push('css')
    <title>{{ @$data['detail']['title'] }}</title>
    <meta name="description" content="{{ @$data['detail']['description'] }}">
    <meta name="keywords" content="{{ @$data['detail']['keyword'] }}">
    <meta property="og:locale" content="vi_VN">
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{@$data['url']}}">
    <meta property="og:title" content="{{ @$data['detail']['title'] }}">
    <meta property="og:description" content="{{ @$data['detail']['description'] }}">
    <meta property="og:image" content="{{ @$data['detail']['thumbnail'] ?  asset(URL::pathUpload(explode('.',@$data['detail']['thumbnail'])[0],'news').@$data['detail']['thumbnail']) : '' }}">
    <meta property="og:image:alt" content="{{ @$data['detail']['thumbnail'] ?  asset(URL::pathUpload(explode('.',@$data['detail']['thumbnail'])[0],'news').@$data['detail']['thumbnail']) : '' }}">
    <link rel="stylesheet" href="{{asset('Frontend/css/detail.css')}}">
@endpush
@extends('Frontend/main')
@section('wrapper')
<!-- main -->
<main>
    <section class="page_content">
        <div class="content">
            <div class="page_main">
                <div class="detail_content">
                    <h1 class="detail-title">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"
                            style="fill: #ffb900; margin-right: 8px">
                            <path d="m16 2.012 3 3L16.713 7.3l-3-3zM4 14v3h3l8.299-8.287-3-3zm0 6h16v2H4z"></path>
                        </svg>
                        {{ @$data['detail']['name']}}
                    </h1>
                    @if (@$data['detail']['desc_short'])
                        <p class="detail-desc">{{ @$data['detail']['desc_short'] }}</p>
                    @endif
                    <div class="format-detail">
                        {!! @$data['detail']['content'] !!}
                    </div>
                </div>
                <div class="detail_sidebar">
                    <div class="heading_featured">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24">
                            <path d="m18.988 2.012 3 3L19.701 7.3l-3-3zM8 16h3l7.287-7.287-3-3L8 13z"></path>
                            <path
                                d="M19 19H8.158c-.026 0-.053.01-.079.01-.033 0-.066-.009-.1-.01H5V5h6.847l2-2H5c-1.103 0-2 .896-2 2v14c0 1.104.897 2 2 2h14a2 2 0 0 0 2-2v-8.668l-2 2V19z">
                            </path>
                        </svg>
                        <h3>Bài viết nổi bật</h3>
                    </div>
                    <div class="news_featured-list">
                        @foreach ($data['list-sidebar'] as $item)
                            <a href="{{ route('news.detail', ['slug' => @$item['slug'], 'id' => @$item['id']]); }}" class="news_featured-item">
                                <img src="{{ @$item['thumbnail'] ?  asset(URL::pathUpload(explode('.',@$item['thumbnail'])[0],'news').@$item['thumbnail']) : '' }}" class="news_item-thumb">
                                <h2 class="news_item-title">{{ @$item['name'] }}</h2>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@endsection
@push('scripts')

@endpush

