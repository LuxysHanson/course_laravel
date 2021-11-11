
@extends('layouts/app')

@section('title')
    @parent Список новостей
@endsection

@section('content')
    <div class="site-section">
        <div class="container">

            <div class="row">
                <div class="col-auto">
                    <div class="section-title mb-5">
                        <h2>Новости</h2>
                    </div>
                </div>
                <div class="col-auto ml-auto">
                    <a href="{{ route('news.add') }}" class="more">Добавить новость</a>
                </div>
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
