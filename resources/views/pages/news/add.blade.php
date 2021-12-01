@extends('layouts/app')

@section('title')
    @parent Создание новости
@endsection

@section('content')

    <div class="site-section">
        <div class="container">
            <div class="card-header">
                <h4>{{ __('Создание новости') }}</h4>
            </div>

            <div class="card-body">
                @include('pages/news/template/_form', [ 'formLink' => route('news.create') ])
            </div>

        </div>
    </div>

@endsection
