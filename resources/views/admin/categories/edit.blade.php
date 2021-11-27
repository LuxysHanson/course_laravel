@extends('layouts/admin')

@section('title')
    @parent {{ __('Редактирование категории') }}
@endsection

@section('content')

    <div class="card-header">{{ __('Редактирование категории') }}</div>

    <div class="card-body">

        @include('admin/categories/_form', [
            'model' => $category,
            'formLink' => route('admin.categories.update', $category)
        ])

    </div>

@endsection
