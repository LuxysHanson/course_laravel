@extends('layouts.app')

@section('title')
    @parent Главная страница
@endsection

@section('content')

    @if(!empty($latestNews))
        <div class="site-section">
            <div class="container">
                <div class="section-title">
                    <h2>Свежие новости</h2>
                </div>

                @if($latestNews)
                    @include('pages/news/template/_list', [ 'news' => $latestNews ])
                @endif

                <p>
                    <a href="{{ route('news.index') }}" class="more">
                        Посмотреть все <i class="fas fa-angle-right"></i>
                    </a>
                </p>
            </div>
        </div>
    @endif

@endsection
