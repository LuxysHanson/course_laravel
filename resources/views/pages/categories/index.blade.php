@extends('layouts/app')

@section('content')
    <h2>Список категории новостей</h2>
    @forelse($categories as $item)
        <a href="{{ route('news.category', [ 'id' => $item['id'] ]) }}">
            {{ $item['title'] ?? '' }}
        </a><br>
    @empty
        <p>Список категории пустой</p>
    @endforelse
@endsection
