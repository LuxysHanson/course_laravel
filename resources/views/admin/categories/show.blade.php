@extends('layouts/admin')

@section('title')
    @parent {{ __('Все новости') }}
@endsection

@section('content')
    <div class="p-2 news-item">
        <div class="d-flex w-100 justify-content-between">
            <h5 class="mb-1">{{ $category->title }}</h5>
{{--            <small>{{ $news->created_at }}</small>--}}
        </div>
        <p class="mt-3">{{ \App\Components\Helpers\StringHelper::getShortText($category->description ?? '') }}</p>
    </div>
@endsection
