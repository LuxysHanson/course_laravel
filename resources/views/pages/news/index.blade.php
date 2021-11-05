
@extends('layouts/app')

@section('content')
    <h2>Новости</h2>
    @forelse($news as $item)
        <a href="{{ route('news.view', [ 'id' => $item['id'] ])  }}">
            {{ $item['title'] ?? ''  }}
        </a><br>
    @empty
        Нет новостей
    @endforelse
@endsection
