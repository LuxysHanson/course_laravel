@extends('layouts/admin')

@section('title')
    @parent Создание новости
@endsection

@section('content')

    <div class="card-header">{{ __('Создание новости') }}</div>

    <div class="card-body">

        @include('admin/news/_form', [ 'place' => 'backend' ])

    </div>

@endsection
