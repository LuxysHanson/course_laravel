
@extends('layouts/app')

@section('title')
    @parent Список новостей
@endsection

@section('content')
    <div class="site-section">
        <div class="container">
            <div class="section-title mb-5">
                <h2>Новости</h2>
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
