@extends('layouts/app')

@section('content')
    @if(!empty($news))
        <h2>{{ $news['title'] ?? ''  }}</h2>
        <p>{{ $news['text'] ?? '' }}</p>
    @else
        <p>Новость отсутвует</p>
    @endif
@endsection
