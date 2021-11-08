@extends('layouts/app')

@section('title')
    @parent Список категории новостей
@endsection

@section('content')
    <div class="site-section">
        <h2>Категории новостей</h2>
        @forelse($categories as $item)
            <a href="{{ route('news.category', [ 'id' => $item['id'] ]) }}">
                {{ $item['title'] ?? '' }}
            </a><br>
        @empty
            <p>Список категории пустой</p>
        @endforelse
    </div>
@endsection
