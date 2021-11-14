@foreach($news as $item)
    <div class="post-entry-2 d-flex">
        <div class="thumbnail order-md-2" style="background-image: url({{ $item['image'] ? asset('images/'. $item['image']) : asset('images/news/default_news.jpg') }})"></div>
        <div class="contents order-md-1 pl-0">
            <h2>
                <a href="{{ route('news.view', [ 'id' => $item['id'] ]) }}">
                    {{ $item['title'] }}
                </a>
            </h2>
            <p class="mb-3">{{ \App\Components\Helpers\StringHelper::getShortText($item['text']) }}</p>
            {{--                                <div class="post-meta">--}}
            {{--                                    <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>--}}
            {{--                                    <span class="date-read">Jun 14 <span class="mx-1">•</span> 3 min read <span class="icon-star2"></span></span>--}}
            {{--                                </div>--}}
        </div>
    </div>
@endforeach
