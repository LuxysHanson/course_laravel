@extends('layouts/app')

@section('title')
    @parent Новости по категории "{{ $category['title'] ?? '' }}"
@endsection

@section('content')
    <div class="site-section">
        <h2>Вывод новостей по данной категории</h2>
        @forelse($news as $item)
            <a href="{{ route('news.view', [ 'id' => $item['id'] ]) }}">
                {{ $item['title'] ?? '' }}
            </a><br>
        @empty
            <p>По данной категории отсутвуют новости</p>
        @endforelse
    </div>
@endsection
