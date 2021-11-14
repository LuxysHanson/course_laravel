@foreach($news as $item)
    @if(isset($item['image']) && $item['image'])
        <div class="post-entry-2 d-flex">
            <div class="thumbnail order-md-2" style="background-image: url({{ asset('images/'. $item['image']) }})"></div>
            <div class="contents order-md-1 pl-0">
                <h2>
                    <a href="{{ route('news.view', [ 'id' => $item['id'] ]) }}">
                        {{ $item['title'] }}
                    </a>
                </h2>
                <p class="mb-3">{{ \App\Http\Helpers\StringHelper::getShortText($item['text']) }}</p>
                {{--                                <div class="post-meta">--}}
                {{--                                    <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>--}}
                {{--                                    <span class="date-read">Jun 14 <span class="mx-1">•</span> 3 min read <span class="icon-star2"></span></span>--}}
                {{--                                </div>--}}
            </div>
        </div>
    @endif
@endforeach
