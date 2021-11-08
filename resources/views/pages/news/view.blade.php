@extends('layouts/app')

@section('title')
    @parent Просмотр новости
@endsection

@section('content')
    <div class="site-section">
        @if(!empty($news))
            <h2>{{ $news['title'] ?? ''  }}</h2>
            <p>{{ $news['text'] ?? '' }}</p>
        @else
            <p>Новость отсутвует</p>
        @endif
    </div>
@endsection
