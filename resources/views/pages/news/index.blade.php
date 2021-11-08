
@extends('layouts/app')

@section('title')
    @parent Список новостей
@endsection

@section('content')
    <div class="site-section">
        <h2>Новости</h2>
        @forelse($news as $item)
            <a href="{{ route('news.view', [ 'id' => $item['id'] ])  }}">
                {{ $item['title'] ?? ''  }}
            </a><br>
        @empty
            Нет новостей
        @endforelse
    </div>
@endsection
