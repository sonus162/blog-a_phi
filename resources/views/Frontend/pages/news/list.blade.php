@php
    use App\Helpers\URL;
@endphp
@extends('Frontend/main')
@section('wrapper')
<main>
    <!-- Blog -->
    <div class="blog" id="blog">
        <div class="content">
            <div class="body">
                <h2 class="heading">Bài viết</h2>
                <p class="desc">Read our regular travel blog and know the latest update of tour and travel</p>
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
        </div>
    </div>

</main>
@endsection
@push('scripts')

@endpush

