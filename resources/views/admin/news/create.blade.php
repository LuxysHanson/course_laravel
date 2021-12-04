@extends('layouts/admin')

@section('title')
    @parent {{ __('Создание новости') }}
@endsection

@section('content')

    <div class="card-header">{{ __('Создание новости') }}</div>

    <div class="card-body">
        @include('admin/news/_form', [ 'formLink' => route('admin.news.store') ])
    </div>

@endsection
