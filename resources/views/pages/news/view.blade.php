@extends('layouts/app')

@section('title')
    @parent Просмотр новости
@endsection

@section('content')
    <div class="site-section">
        <div class="container">

            @if(!empty($news))
                <div class="single-content">

                    <p class="mb-5">
                        <img src="{{ asset('images/'. $news['image']) }}" alt="Image" class="img-fluid">
                    </p>
                    <h1 class="mb-4">{{ $news['title'] ?? '' }}</h1>
{{--                    <div class="post-meta d-flex mb-5">--}}
{{--                        <div class="bio-pic mr-3">--}}
{{--                            <img src="images/person_1.jpg" alt="Image" class="img-fluidid">--}}
{{--                        </div>--}}
{{--                        <div class="vcard">--}}
{{--                            <span class="d-block"><a href="#">Dave Rogers</a> in <a href="#">News</a></span>--}}
{{--                            <span class="date-read">Jun 14 <span class="mx-1">•</span> 3 min read <span--}}
{{--                                    class="icon-star2"></span></span>--}}
{{--                        </div>--}}
{{--                    </div>--}}

                    <div class="news-content">
                        {{ $news['text'] ?? '' }}
                    </div>

{{--                    <div class="pt-5">--}}
{{--                        <p>Категория: <a href="#">Design</a>, <a href="#">Events</a></p>--}}
{{--                    </div>--}}

                </div>
            @else
                <div class="alert alert-warning" role="alert">
                    Новость отсутвует
                </div>
            @endif

        </div>
    </div>
@endsection
