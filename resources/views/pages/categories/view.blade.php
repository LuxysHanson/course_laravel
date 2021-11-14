@extends('layouts/app')

@section('title')
    @parent Новости по категории "{{ $category['title'] ?? '' }}"
@endsection

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="section-title">
                <span class="caption d-block small">Категория</span>
                <h2>{{ $category['title'] ?? '' }}</h2>
            </div>

            @if(!empty($news))
                @include('pages/news/template/_list', $news)
            @else
                <div class="alert alert-warning" role="alert">
                    Нет добавленных новостей
                </div>
            @endif

        </div>
    </div>
@endsection
