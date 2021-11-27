@extends('layouts/admin')

@section('title')
    @parent {{ __('Создание категории') }}
@endsection

@section('content')

    <div class="card-header">{{ __('Создание категории') }}</div>

    <div class="card-body">

        @include('admin/categories/_form', [
            'formLink' => route('admin.categories.store')
        ])

    </div>

@endsection
